<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Receipt;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;


class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $options = null;
    function __construct()
    {
        $this->options = ['isJavascriptEnabled' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isPhpEnabled' => true, "dpi" => 96];
    }

    public function generateProformaPdf($id)
    {
        ini_set('max_execution_time', 600);

        if ($id) {
            // Récupération des données de la proforma
            $data = ['data' => 'data'];
            if ($data) {
                //Chemin Publique pour l'enregistrement du fichier
                $file_path = "public/proforma/1/";
                //Chemin de récupération du fichier
                $file_path2 = "proforma/1/";
                // Formatage des paths
                $file_path = perform_links($file_path);
                $file_path2 = perform_links($file_path2);
                // Formatage du nom du fichier
                $pdf_name = perform_links2(perform_links('1'));
                $file_name = $pdf_name . ".pdf";
                // Récupération de la catégorie du cours
                $doc_category = DocumentCategory::where('name', 'pdf')->first();
                // Enregistrement des données du document
                // save_file_in_doc($file_name, $file_path2, $id, 'courses', $doc_category->id);
                // Générer le document
                return $this->PDFGENERETOR('files.facture', $file_name, $data, $file_path, 'Proforma');
            }
        }
    }

    public function generateCoursePdf($id)
    {
        ini_set('max_execution_time', 600);
        if ($id) {
            // Recuperation des données du cours
            $course_data = get_course_data($id);

            if ($course_data != null) {
                // Url Tag
                $url_tag = $course_data['course']->url_tag;
                // Code du cours
                $course_code = $course_data['course']->code;
                // Titre du cours
                $course_title = $course_data['course']->name_en;
                //Chemin Publique pour l'enregistrement du fichier
                $file_path = "public/courses/" . $course_code . "/";
                //Chemin de récupération du fichier
                $file_path2 = "courses/" . $course_code . "/";
                // Formatage des paths
                $file_path = perform_links($file_path);
                $file_path2 = perform_links($file_path2);
                // Formatage du nom du fichier
                $pdf_name = perform_links2(perform_links($url_tag));
                $file_name = $pdf_name . ".pdf";
                // Récupération de la catégorie du cours
                $doc_category = DocumentCategory::where('name', 'pdf')->first();
                // Enregistrement des données du document
                // save_file_in_doc($file_name, $file_path2, $id, 'courses', $doc_category->id);
                // Générer le document
                return $this->PDFGENERETOR('files.course', $file_name, $course_data, $file_path, $course_title);
            }
        }
    }

    public function PDFGENERETOR($view, $file_name, $data = [], $file_path = "", $title = "Titre du Document")
    {
        $data['title'] = $title;
        $pdf = PDF::setOptions($this->options)->loadView($view, $data);

        // Storage::put($file_path . $file_name, $pdf->output());

        return $pdf->download($file_name);
    }

    public function generateInvoicePdf($student_id)
    {
        ini_set('max_execution_time', 600);
        // Récupération de l'étudier
        $student = Student::find($student_id);
        if ($student) {
            // Recuperation des données du cours
            $data = ['orders' => get_cart()];
            if (count($data['orders']) > 0) {
                //
                $total_amount = get_cart_subtotal_euro();
                //Chemin Publique pour l'enregistrement du fichier
                $file_path = "public/invoice/";
                // Formatage des paths
                $file_path = perform_links($file_path);
                // Formatage du nom du fichier
                $file_name = '';
                // Tentative de récupération de la dernière facture de l'étudiant
                $invoice = Invoice::where(['student_id'=> $student->id, 'receipt_number' => null])->get()->last();
                $invoice_number = '';
                if(!$invoice) {
                    $last_invoice = Invoice::get()->last();
                    $invoice_number = $last_invoice ? substr('0000000'.(intval($last_invoice->number) + 1), -8) : '00000001';
                    // Mise à jour du nom de fichier
                    $file_name = perform_links2(perform_links('Invoice-'.$invoice_number)) . ".pdf";
                    // Formation du chemin vers le fichier de la facture
                    $invoice_path = $file_name;
                    // Enregistrement de la facture
                    $invoice = Invoice::create([
                        'number' => $invoice_number,
                        'file_path' => $invoice_path,
                        'receipt_number' => null,
                        'student_id' => $student->id,
                        'total_amount' => $total_amount,
                    ]);                                      
                }else {
                    $invoice_number = $invoice->number;
                    // Mise à jour du nom de fichier
                    $file_name = perform_links2(perform_links('Invoice-'.$invoice_number)) . ".pdf";
                    // Formation du chemin vers le fichier de la facture
                    $invoice_path = $file_name;
                    // Mise à jour de la facture
                    $invoice->file_path = $invoice_path;
                    $invoice->total_amount = $total_amount;
                    $invoice->save();
                }                

                // Mise à jour du panier
                foreach ($data['orders'] as $order) {
                    $order_old = Order::find($order->id);
                    $order_old->invoice_number = $invoice_number;
                    $order_old->save();
                } 

                // Générer le document
                $data['invoice_number'] = $invoice_number;
                $data['date'] = date('F d, Y', strtotime($invoice->updated_at));
                $data['user_name'] = Auth::user()->name;
                $data['user_email'] = Auth::user()->email;
                $data['user_address'] = $student->address_en;
                $data['user_phone'] = $student->phone;
                $data['total_amount'] = format_amount($invoice->total_amount, true);
                // return view("files.invoice",[
                //     'orders' => $data['orders'],
                //     'invoice_number' => $data['invoice_number'],
                //     'date' => $data['date'],
                //     'user_name' => $data['user_name'],
                //     'user_email' => $data['user_email'],
                //     'user_address' => $data['user_address'],
                //     'user_phone' => $data['user_phone'],
                //     'total_amount' => $data['total_amount'],
                // ]);
                return $this->InvoicePdfGenerator('files.invoice', $file_name, $data, $file_path, 'Invoice');
            }
        }
    }

    public function generateReceiptPdf($student_id, $orders, $total_amount)
    {
        ini_set('max_execution_time', 600);
        // Récupération de l'étudier
        $student = Student::find($student_id);
        if ($student) {
            // Recuperation des données du cours
            $data = ['orders' => $orders];
            if (count($data['orders']) > 0) {
                //Chemin Publique pour l'enregistrement du fichier
                $file_path = "public/receipt/";
                // Formatage des paths
                $file_path = perform_links($file_path);
                // Tentative de récupération de la facture
                $invoice = Invoice::where(['student_id'=> $student->id, 'receipt_number' => null])->get()->last();
                $invoice_number = $invoice->number;
                // Tentative de récupération du dernier reçu
                $last_receipt = Receipt::get()->last();
                $receipt_number = $last_receipt ? substr('0000000'.(intval($last_receipt->number) + 1), -8) : '00000001';
                // Formatage du nom du fichier
                $file_name = perform_links2(perform_links('Receipt-'.$receipt_number)) . ".pdf";
                // Formation du chemin vers le fichier de la facture
                // Enregistrement de la facture
                $receipt = Receipt::create([
                    'number' => $receipt_number,
                    'file_path' => $file_name,
                    'invoice_number' => $invoice_number,
                    'student_id' => $student->id,
                    'total_amount' => $total_amount,
                ]);    
                
                // Mise à jour de la facture
                $invoice->receipt_number = $receipt_number;
                $invoice->save();

                // Mise à jour du panier
                foreach ($data['orders'] as $order) {
                    $order_old = Order::find($order->id);
                    $order_old->receipt_number = $receipt_number;
                    $order_old->save();
                } 
                
                // Générer le document
                $data['invoice_number'] = $invoice_number;
                $data['receipt_number'] = $receipt_number;
                $data['date'] = date('F d, Y', strtotime($receipt->updated_at));
                $data['payment_method'] = $data['orders'][0]->mode;
                $data['user_name'] = Auth::user()->name;
                $data['user_email'] = Auth::user()->email;
                $data['user_address'] = $student->address_en;
                $data['user_phone'] = $student->phone;
                $data['total_amount'] = format_amount($invoice->total_amount, true);
                // return view("files.invoice",[
                //     'orders' => $data['orders'],
                //     'invoice_number' => $data['invoice_number'],
                //     'date' => $data['date'],
                //     'user_name' => $data['user_name'],
                //     'user_email' => $data['user_email'],
                //     'user_address' => $data['user_address'],
                //     'user_phone' => $data['user_phone'],
                //     'total_amount' => $data['total_amount'],
                // ]);
                $this->InvoicePdfGenerator('files.receipt', $file_name, $data, $file_path, 'Receipt');
                return $receipt;
            }
        }
    }

    public function InvoicePdfGenerator($view, $file_name, $data = [], $file_path = "", $title = "Titre du Document")
    {
        $data['title'] = $title;
        $pdf = PDF::setOptions($this->options)->loadView($view, $data);

        Storage::put($file_path . $file_name, $pdf->output());

        return $pdf->download($file_name);
    }
}

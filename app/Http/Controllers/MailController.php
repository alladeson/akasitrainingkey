<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $mailData = [
            'subject' => 'Mail test',
            'title' => 'Neck reservation on AkasiLearningKey ',
            'body' => 'You have made a course reservation on ',
            'view' => 'front.emails.share-course-link',
        ];


        $pdfFilePath = storage_path('app/public/courses/14862/secdevops-foundation-sdof-certification-training.pdf');
        // $user = auth()->user();

        $message = new SendMail($mailData);
        $message->attach($pdfFilePath, [
            'as' => 'secdevops-foundation-sdof-certification-training.pdf',
            'mime' => 'application/pdf',
        ]);

        // Envoyez le message
        // Mail::to('alladeson91@gmail.com')->send($message);
        return view($mailData['view'], [
            'user' => $request->user(),
            'profile' => get_user_profile(),
            'orders' => get_completed_orders(),
            'total_amount_euro' => 2000,
            'total_amount_fcfa' => 3000000,
            'course' => Course::find(1),
        ]);
    }

    public function payment_success(Request $request, $orders, $total_amount_euro, $total_amount_fcfa, $receipt){
        $mailData = [
            'subject' => 'Payment confirmation',
            'title' => '',
            'body' => '',
            'view' => 'front.emails.payment-success',
            'user' => $request->user(),
            'profile' => get_user_profile(),
            'orders' => $orders,
            'total_amount_euro' => $total_amount_euro,
            'total_amount_fcfa' => $total_amount_fcfa,
        ];


        $message = new SendMail($mailData);
        // Récupération du fichier du reçu
        $pdfFilePath = storage_path('app/public/receipt/'.$receipt->file_path);
        // Ajout du fichier en pièce jointe
        $message->attach($pdfFilePath, [
            'as' => $receipt->file_path,
            'mime' => 'application/pdf',
        ]);

        // Envoyez le message
        Mail::to($request->user()->email)->send($message);
    }
    public function invoice_reminder($invoice){
        $student = Student::find($invoice->student_id);
        $mailData = [
            'subject' => 'AkasiLearningKey - Invoice ['.$invoice->number.']',
            'title' => '',
            'body' => '',
            'view' => 'front.emails.invoice',
            'student' => $student,
            'orders' => get_cart_by_student_id($invoice->student_id),
            'total_amount_euro' => $invoice->total_amount,
            'invoice' => $invoice,
        ];


        $message = new SendMail($mailData);
        // Récupération du fichier du reçu
        $pdfFilePath = storage_path('app/public/invoice/'.$invoice->file_path);
        // Ajout du fichier en pièce jointe
        $message->attach($pdfFilePath, [
            'as' => $invoice->file_path,
            'mime' => 'application/pdf',
        ]);

        // Envoyez le message
        Mail::to(get_user_by_id($student->user_id)->email)->send($message);
    }

    public function share_course_link(Request $request){
        $mailData = [
            'subject' => 'Sharing a training link',
            'title' => '',
            'body' => '',
            'view' => 'front.emails.share-course-link',
            'user' => $request->user(),
            'profile' => get_user_profile(),
            'course' => Course::find($request->get('course_id')),
        ];

        $message = new SendMail($mailData);

        // Envoyez le message
        Mail::to(explode(",", $request->get('mails')))->send($message);
    }

    public function contact(Request $request){
        $mailData = [
            'subject' => 'ALEK - User Message',
            'title' => '',
            'body' => '',
            'view' => 'front.emails.contact',
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'course' => $request->get('course'),
            'message' => $request->get('message'),
        ];

        $message = new SendMail($mailData);

        // Envoyez le message
        Mail::to([/*'akasi-commercial@akasigroup.com'*/ 'alladeson91@outlook.fr'])->send($message);
    }



    public function payment_mail()
    {
        $mailData = [
            'subject' => 'Mail test',
            'title' => 'Payment on AkasiLearningKey ',
            'body' => 'You made payment on AkasiLearningKey ',
            'view' => 'emails.payment-mail',
        ];

        // $user = auth()->user();

        Mail::to('sewanoudiara@gmail.com')->send(new SendMail($mailData));


    }
}

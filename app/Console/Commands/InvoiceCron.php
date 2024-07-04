<?php

namespace App\Console\Commands;

use App\Http\Controllers\MailController;
use App\Models\Invoice;
use Illuminate\Console\Command;

class InvoiceCron extends Command
{
    private $mail_controller;
    public function __construct(MailController $mail_controller)
    {
        parent::__construct();
        // App::setlocale('fr');
        $this->mail_controller = $mail_controller;
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info("Cron Job running at ". now());
        //
        $invoices = Invoice::where('receipt_number', null)->get();
        if (!empty($invoices)) {
            foreach ($invoices as $invoice) {
                $this->mail_controller->invoice_reminder($invoice);
            }
        }
    }
}

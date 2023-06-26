<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class InvoiceController extends Controller
{
    public function generateInvoice()
    {
        // Generate a unique file name for the invoice
        $fileName = 'invoice_' . uniqid() . '.pdf';

        // Generate the PDF using the dompdf package
        $process = new Process([
            'php',
            'artisan',
            'dompdf:pdf',
            '--output=' . storage_path('app/public/invoices/' . $fileName),
            '--filename=' . $fileName,
            '--paper=letter',
            '--no-ansi',
            'invoice'
        ]);

        $process->run();

        dd($process->isSuccessful());

        // Check if the PDF was generated successfully
        if ($process->isSuccessful()) {
            // Return the file download response
            return response()->download(storage_path('app/public/invoices/' . $fileName))->deleteFileAfterSend(true);
        } else {
            // Handle the error
            return redirect()->back()->with('error', 'Failed to generate the invoice.');
        }
    }
}

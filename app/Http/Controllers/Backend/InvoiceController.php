<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use PDF;

class InvoiceController extends Controller
{
    public function generateInvoice()
    {
        // Fetch necessary data from the database or any other source
        $data = [
            // Invoice data here
        ];

        // Generate the PDF using the DomPDF package
        // $pdf = PDF::loadView('invoice', $data);

        // Generate a unique file name for the invoice
        $fileName = 'invoice_' . uniqid() . '.pdf';

        // Save the PDF to a directory
        // $pdf->save(storage_path('app/public/invoices/' . $fileName));

        // Return the file download response
        return response()->download(storage_path('app/public/invoices/' . $fileName))->deleteFileAfterSend(true);
    }
}

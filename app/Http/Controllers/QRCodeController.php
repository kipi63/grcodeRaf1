<?php

namespace App\Http\Controllers;

use App\Services\QRCodeService;
use Illuminate\Http\Request;
use TCPDF;

class QRCodeController extends Controller
{
    protected QRCodeService $qrCodeService;
    
    public function __construct(QRCodeService $qrCodeService)
    {
        $this->qrCodeService = $qrCodeService;
    }
    
    public function index()
    {
        return view('qrform');
    }
    
    public function generate(Request $request)
    {
        $s = $request->input('s');
        $to = $request->input('to');
        
        $qrCodes = $this->qrCodeService->generateQRCodes($s, $to);
        
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Generated QR Codes');
        $pdf->SetMargins(5, 5, 5);
        $pdf->SetAutoPageBreak(true, 5);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        
        foreach ($qrCodes as $qrCode) {
            $pdf->AddPage();
            $pdf->SetFont('helvetica', '', 30);
            
            $html = '
        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
            <table style="border-collapse: collapse; margin: 0 auto;">
                <tr>
                    <td style="width: 60%; text-align: center;">
                        <img src="'.$qrCode[ 'dataUri' ].'" alt="QR Code" style="width: 500px; height: 500px;" />
                    </td>
                    <td style="width: 40%; text-align: center;">
                        <h1 style="font-size: 98pt; margin: 0;">'.$qrCode[ 'label' ].'</h1>
                    </td>
                </tr>
            </table>
        </div>';
            
            $pdf->writeHTML($html, true, false, true, false, '');
        }
        
        $pdf->Output('Generated-QR-Codes.pdf', 'I');
    }
}

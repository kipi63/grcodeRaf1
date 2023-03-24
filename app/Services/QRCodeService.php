<?php

namespace App\Services;

use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class QRCodeService
{
    public function generateQRCodes($s, $to) : array
    {
        $mappingArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
        
        $qrCodes = [];
        for ($i = $s ; $i <= $to ; $i++) {
            for ($j = 0 ; $j < count($mappingArray) ; $j++) {
                $data = [
                    'sutun' => $i,
                    'raf' => $mappingArray[ $j ]
                ];
                // Wrap data in an array
                $data = [$data];
                $qrCodeContent = json_encode($data);
                
                
                $qrCode = QrCode::create($qrCodeContent)
                    ->setEncoding(new Encoding('UTF-8'))
                    ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                    ->setSize(300)
                    ->setMargin(10);
                
                $writer = new PngWriter();
                $result = $writer->write($qrCode);
                $dataUri = $result->getDataUri();
                
                $qrCodes[] = [
                    'dataUri' => $dataUri,
                    'label' => $i.'-'.$mappingArray[ $j ]
                ];
            }
        }
        
        return $qrCodes;
    }
}

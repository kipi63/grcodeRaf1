<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated QR Codes</title>
</head>
<body>
<div class="container">
    <h1>Generated QR Codes</h1>
    @foreach ($qrCodes as $qrCode)
        <div style="page-break-after: always;">
            <table width="60%" style="border-collapse: collapse; margin: 0 auto;">
                <tr>
                    <td style="text-align: center; border: 1px solid black;">
                        <img src="{{ $qrCode['dataUri'] }}" alt="QR Code" style="width: 150px; height: 150px;" />
                    </td>
                    <td style="text-align: center; border: 1px solid black;">
                        <h1 style="font-size: 24pt; margin: 0;">{{ $qrCode['label'] }}</h1>
                    </td>
                </tr>
            </table>
        </div>
    @endforeach
</div>
</body>
</html>

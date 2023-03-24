<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>qrcode-raf</title>
    <style>
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin: 10px 0;
        }
        input[type="submit"] {
            background: gray;
            padding: 10px;
            border-radius: 6px;
            border: none;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>QR Code Generator</h1>
    <form action="/generate" method="post" target="_blank">
        @csrf
        <label for="s">S:</label>
        <input type="number" id="s" name="s" required min="0" max="999" maxlength="3">
        <br><br>
        <label for="to">TO:</label>
        <input type="number" id="to" name="to" required min="0" max="999" maxlength="3">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>

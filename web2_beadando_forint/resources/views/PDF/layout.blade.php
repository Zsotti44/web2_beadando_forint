<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Érme PDF</title>
    <style>
body { font-family: DejaVu Sans, sans-serif; }
        h2 { color: #4CAF50; }
    </style>
</head>
<body>
    <h2>Érme Információk</h2>
    <p><strong>Címlet:</strong> {{ $erme->cimlet }} forint</p>
<p><strong>Anyag:</strong> {{ $anyag->femnev }}</p>
<p><strong>Tervező:</strong> {{ $tervezo->nev }}</p>
</body>
</html>

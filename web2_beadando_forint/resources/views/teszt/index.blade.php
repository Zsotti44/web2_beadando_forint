<!DOCTYPE html>
<html>
<head>
    <title>Anyagok</title>
</head>
<body>
    <h1>Anyagok Listája</h1>
    <ul>
        @foreach ($ermek as $erme)
            <li>{{ $erme->ermeid }} - {{ $erme->cimlet }} - {{ $erme->tomeg }} - {{ $erme->darab }}</li>
        @endforeach
    </ul>
</body>
</html>

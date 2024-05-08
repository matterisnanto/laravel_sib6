<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello motherfucker</h1>
    @php
        $nama = 'Mamat';
        $nilai = 59.00;
    @endphp
    {{-- struktur kendali if --}}
    @if ($nilai >= 60)
    @php 
        $ket = "lulus"; 
    @endphp
    @else
    @php
        $ket = "tidak lulus";
    @endphp
    @endif

    {{$nama}} <p> Dengan nilai </p> {{$nilai}} <p> Dinyatakan </p> {{$ket}}
</body>
</html>
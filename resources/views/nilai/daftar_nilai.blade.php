<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello motherfucker </h1>
    @php
        $no = 1;
        $s1 = ['nama'=> 'mamat', 'nilai'=>70];
        $s2 = ['nama'=> 'budi', 'nilai'=>80];
        $s3 = ['nama'=> 'kiki', 'nilai'=>50];
        $s4 = ['nama'=> 'wati', 'nilai'=>20];
        $s5 = ['nama'=> 'ronald', 'nilai'=>10];
        $judul = ['no', 'nama', 'nilai', 'keterangan'];

        $siswa = [$s1, $s2, $s3, $s4, $s5];
    @endphp

    <table align="center" border="1" cellpadding="10">
        <thead>
            <tr>
                {{--foreach adalah sebuah perulangan yang dimiliki oleh php didalam laravel --}}
                @foreach ($judul as $jd1)
                <th>{{$jd1}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $s)
            <tr>
                <td>{{$no}}</td>
                <td>{{$s['nama']}}</td>
                <td>{{$s['nilai']}}</td>
                <td>
                    @if ($s['nilai'] >= 70)
                    <span style="color:green">Lulus</span>
                    @elseif ($s['nilai'] >= 50)
                    <span style="color:yellow">Cukup</span>
                    @else
                    <span style="color:red">Tidak Lulus</span>
                    @endif
                </td>
            </tr>
            @php
                $no++;
            @endphp
            @endforeach
        </tbody>
    </table>

</body>
</html>
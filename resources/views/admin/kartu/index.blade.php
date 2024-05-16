@extends('admin.layouts.app')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>kode</th>
                        <th>nama</th>
                        <th>diskon</th>
                        <th>iuran</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>kode</th>
                        <th>nama</th>
                        <th>diskon</th>
                        <th>iuran</th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- @php $no=1 @endphp --}}
                    @foreach ($kartu as $k)


                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$k->kode}} </td>
                        <td>{{$k->nama}} </td>
                        <td>{{$k->diskon}} </td>
                        <td>{{$k->iuran}} </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

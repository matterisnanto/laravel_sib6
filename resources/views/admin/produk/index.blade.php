@extends('admin.layouts.app')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>kode </th>
                        <th>nama</th>
                        <th>harga_beli</th>
                        <th>harga_jual</th>
                        <th>stok</th>
                        <th>min_stok</th>
                        <th>jenis</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>no</th>
                        <th>kode </th>
                        <th>nama</th>
                        <th>harga_beli</th>
                        <th>harga_jual</th>
                        <th>stok</th>
                        <th>min_stok</th>
                        <th>jenis</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $no=1 @endphp
                    @foreach ($produk as $p)


                    <tr>
                        <td>{{$no++}} </td>
                        <th>{{$p->kode }}</th>
                        <th>{{$p->nama}}</th>
                        <th>{{$p->harga_beli}}</th>
                        <th>{{$p->harga_jual}}</th>
                        <th>{{$p->stok}}</th>
                        <th>{{$p->min_stok}}</th>
                        <th>{{$p->jenis}}</th>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

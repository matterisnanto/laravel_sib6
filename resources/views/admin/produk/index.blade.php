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
            <a href="{{route('produk.create')}}" class="btn btn-md btn-primary" >
                <i class="fa-solid fa-square-plus">
                </i>
            </a>
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
                        <th>show</th>
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
                        <th>show</th>
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
                        <th>
                        <a href="{{route('produk.show', $p->id)}}"
                            >detail</a><i class="fa-solid fa-eye">
                        </th>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

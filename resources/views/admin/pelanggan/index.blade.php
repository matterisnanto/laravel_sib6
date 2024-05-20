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
            <a href="{{route('pelanggan.create')}}" class="btn btn-md btn-primary" >Tambah <i class="fa-solid fa-square-plus"></i></a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>kode</th>
                        <th>nama</th>
                        <th>jk</th>
                        <th>tempat lahir</th>
                        <th>tanggal lahir</th>
                        <th>email</th>
                        <th>kartu id</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>kode</th>
                        <th>nama</th>
                        <th>jk</th>
                        <th>tempat lahir</th>
                        <th>tanggal lahir</th>
                        <th>email</th>
                        <th>kartu id</th>
                        <th>action</th>

                    </tr>
                </tfoot>
                <tbody>
                    {{-- @php $no=1 @endphp --}}
                    @foreach ($pelanggan as $p)


                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->kode}} </td>
                        <td>{{$p->nama}} </td>
                        <td>{{$p->jk}} </td>
                        <td>{{$p->tmp_lahir}} </td>
                        <td>{{$p->tgl_lahir}} </td>
                        <td>{{$p->email}} </td>
                        <td>{{$p->kartu->nama}} </td>
                        <a href="{{route('pelanggan.show', $p->id) }}"
                            class="btn btn-sm btn-success">
                            <i class="fa-solid fa-eye"></i></a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

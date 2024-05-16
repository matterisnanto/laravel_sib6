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
            <a href="" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah <i class="fa-solid fa-square-plus"></i></a>
        </div>

        {{-- modal --}}





        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

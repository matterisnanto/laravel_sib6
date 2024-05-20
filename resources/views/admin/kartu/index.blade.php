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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">tambah jenis produk</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="kartuForm" action="{{url('admin/kartu/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" name="kode" id="kode" aria-describedby="emailHelp" placeholder="kode">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" placeholder="nama">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="diskon" id="diskon" aria-describedby="emailHelp" placeholder="diskon">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="iuran" id="iuran" aria-describedby="emailHelp" placeholder="iuran">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="validateForm()">Save changes</button>
                        </div>
                    </form>
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

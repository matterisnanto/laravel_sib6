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
                        <td>
                        <a href="{{route('pelanggan.show', $p->id) }}"
                            class="btn btn-sm btn-success">
                            <i class="fa-solid fa-eye"></i></a>
                            <a href="{{route('pelanggan.edit', $p->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$p->id}}">
                                <i class="fa-solid fa-trash-can "></i>
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="staticBackdrop{{$p->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Anda yakin ingin menghapus data {{$p->nama}}?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('../layouts.main')
@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mahasiswa</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('mahasiswa.create')}}" class="btn btn-primary">+ Tambah Data</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Nama Mahasiswa</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Nama Ibu Kandung</th>
                            <th>Jenis Kelamin</th>
                            <th>Kewarganegaraan</th>  
                            <th>Agama</th>
                            <th>Kabupaten Kota</th>
                            <th>Foto</th>

                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama_mahasiswa}}</td>
                                <td>{{$item->tempat_lahir}}</td>
                                <td>{{$item->tanggal_lahir}}</td>
                                <td>{{$item->nama_ibu_kandung}}</td>
                                <td>{{$item->jenis_kelamin}}</td>
                                <td>{{$item->kewarganegaraan}}</td>
                                <td>{{$item->agama}}</td>
                                <td>{{$item->kabupaten_kota}}</td>
                                <td><img src="{{ asset('storage/' . $item->file_foto) }}" width="42" height="42"></td>
                                <td>
                                    <a href="{{route('mahasiswa.edit', $item->id)}}">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('mahasiswa.destroy', $item->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="text-danger w-4 h-4 mr-1"
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this activity?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                                            <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </form>

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection
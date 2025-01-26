@extends('../layouts.main')
@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tingkat</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('statusmahasiswa.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form id="statusmahasiswaForm"  action="{{ route('statusmahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_ruang_kelas">Nama Status Mahasiswa</label>
                                <input type="text" name="nama_status_mahasiswa" id="nama_status_mahasiswa" class="form-control" 
                                    autocomplete="nama_status_mahasiswa" required>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('statusmahasiswa.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>



@endsection
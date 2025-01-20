@extends('../layouts.main')

@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mahasiswa</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('matakuliah.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form id="editFormData" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Nama Matakuliah</label>
                                <input type="text" name="nama_matakuliah" id="name" class="form-control" placeholder="Name"
                                    value="{{ old('nama_matakuliah', $data->nama_matakuliah) }}" autocomplete="new-name" required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">SKS Teori</label>
                                <input type="text" name="sks_teori" id="sks_teori" class="form-control" placeholder="Email"
                                    value="{{ old('sks_teori', $data->sks_teori) }}" autocomplete="new-email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">SKS Pratik</label>
                                <input type="text" name="sks_praktik" id="sks_praktik" class="form-control" placeholder="Email"
                                    value="{{ old('sks_praktik', $data->sks_praktik) }}" autocomplete="new-email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Email"
                                    value="{{ old('deskripsi', $data->deskripsi) }}" autocomplete="new-email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Status Aktif</label>
                                <input type="text" name="status_aktif" id="status_aktif" class="form-control" placeholder="Email"
                                    value="{{ old('status_aktif', $data->status_aktif) }}" autocomplete="new-email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Jenis Matakuliah</label>
                                <input type="text" name="jenis_matakuliah" id="jenis_matakuliah" class="form-control" placeholder="Email"
                                    value="{{ old('jenis_matakuliah', $data->jenis_matakuliah) }}" autocomplete="new-email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kewarganegaraaan">File Foto</label>
                                <input type="file" name="file_foto" id="file_foto" class="form-control" 
                                    autocomplete="file_foto" >

                               
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('matakuliah.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    $('#editFormData').submit(function(event){
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("matakuliah.update", $data->id) }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response){
                window.location.href = '{{ route('matakuliah.index') }}';
            },
            error: function(jqXHR, exception){
                console.warn('something went wrong');
            }
        });
    });
</script>

@endsection

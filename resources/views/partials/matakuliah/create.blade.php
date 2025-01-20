@extends('../layouts.main')
@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Matakuliah</h1>
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
        <form id="matakuliahFormData"  action="{{ route('matakuliah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_mahasiswa">Nama Matakuliah</label>
                                <input type="text" name="nama_matakuliah" id="nama_matakuliah" class="form-control" 
                                    autocomplete="nama_matakuliah" required>
                            </div>
                        </div>
                        <!-- Tempat Lahir -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tempat_lahir">SKS Teori</label>
                                <input type="text" name="sks_teori" id="sks_teori" class="form-control" 
                                    autocomplete="sks_teori" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_ibu_kandung">SKS Praktik</label>
                                <input type="text" name="sks_praktik" id="sks_praktik" class="form-control" 
                                    autocomplete="sks_praktik" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_ibu_kandung">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" 
                                    autocomplete="deskripsi" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kewarganegaraaan">Status Aktif</label>
                                <input type="text" name="status_aktif" id="status_aktif" class="form-control" 
                                    autocomplete="status_aktif" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kewarganegaraaan">Jenis Matakuliah</label>
                                <input type="text" name="jenis_matakuliah" id="jenis_matakuliah" class="form-control" 
                                    autocomplete="jenis_matakuliah" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kewarganegaraaan">File Foto</label>
                                <input type="file" name="file_foto" id="file_foto" class="form-control" 
                                    autocomplete="file_foto" required>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('matakuliah.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    $('#matakuliahForm').submit(function (event) {
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("matakuliah.store") }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    window.location.href = '{{ route('matakuliah.index') }}';
                } else {
                    console.warn('An error occurred');
                }
            },
            error: function (jqXHR, exception) {
                console.warn('something went wrong');
            }
        });
    });

</script>

@endsection
@extends('../layouts.main')
@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dosen</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('dosen.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form id="dosenFormData"  action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_mahasiswa">Nama Dosen</label>
                                <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" 
                                    autocomplete="nama_mahasiswa" required>
                            </div>
                        </div>
                        <!-- Tempat Lahir -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" 
                                    autocomplete="tempat_lahir" required>
                            </div>
                        </div>
                        <!-- Tanggal Lahir -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" 
                                    autocomplete="tanggal_lahir" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
                                <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" class="form-control" 
                                    autocomplete="nama_ibu_kandung" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control"  name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="Laki-laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kewarganegaraaan">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" 
                                    autocomplete="kewarganegaraaan" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('dosen.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    $('#dosenForm').submit(function (event) {
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("dosen.store") }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    window.location.href = '{{ route('dosen.index') }}';
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
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
        <form id="editFormData" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Nama Dosen</label>
                                <input type="text" name="nama_dosen" id="name" class="form-control" placeholder="Name"
                                    value="{{ old('nama_dosen', $data->nama_dosen) }}" autocomplete="new-name" required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Email"
                                    value="{{ old('tempat_lahir', $data->tempat_lahir) }}" autocomplete="new-email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="Email"
                                    value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" autocomplete="new-email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Nama Ibu Kandung</label>
                                <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" class="form-control" placeholder="Email"
                                    value="{{ old('nama_ibu_kandung', $data->nama_ibu_kandung) }}" autocomplete="new-email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Jenis Kelamin</label>
                                <select class="form-control"  name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="Laki-laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>                            
                                </select> 
                            
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" placeholder="Email"
                                    value="{{ old('kewarganegaraan', $data->kewarganegaraan) }}" autocomplete="new-email" required>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('dosen.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    $('#editFormData').submit(function(event){
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("dosen.update", $data->id) }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response){
                window.location.href = '{{ route('dosen.index') }}';
            },
            error: function(jqXHR, exception){
                console.warn('something went wrong');
            }
        });
    });
</script>

@endsection

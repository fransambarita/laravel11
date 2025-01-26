@extends('../layouts.main')

@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mahasiswa</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Back</a>
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
                                <label for="name">Nama Mahasiswa</label>
                                <input type="text" name="nama_mahasiswa" id="name" class="form-control" placeholder="Name"
                                    value="{{ old('nama_mahasiswa', $data->nama_mahasiswa) }}" autocomplete="new-name" required>
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
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>                           
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
                        
                        

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Kabupaten / Kota</label>
                                <input type="text" name="kabupaten_kota" id="kabupaten_kota" class="form-control" 
                                    value="{{ old('kabupaten_kota', $data->kabupaten_kota) }}" autocomplete="new-email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Agama</label>
                                <select class="form-control"  name="agama" id="agama">
                                <option value="">-- Pilih Agama --</option>
                                    <option value="Krtisten" {{ $data->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Islam" {{ $data->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Katolik" {{ $data->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>  
                                    <option value="Budha" {{ $data->agama == 'Budha' ? 'selected' : '' }}>Budha</option>  
                                    <option value="Hindu" {{ $data->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>  
                                                             
                                </select> 
                            
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    $('#editFormData').submit(function(event){
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("mahasiswa.update", $data->id) }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response){
                window.location.href = '{{ route('mahasiswa.index') }}';
            },
            error: function(jqXHR, exception){
                console.warn('something went wrong');
            }
        });
    });
</script>

@endsection

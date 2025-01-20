@extends('../layouts.main')

@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Program Studi</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('programstudi.index') }}" class="btn btn-primary">Back</a>
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
                                <label for="name">Nama Program Studi</label>
                                <input type="text" name="nama_program_studi" id="name" class="form-control" placeholder="Name"
                                    value="{{ old('nama_program_studi', $data->nama_program_studi) }}" autocomplete="new-name" required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Jenjang</label>
                                <input type="text" name="jenjang" id="sks_teori" class="form-control" placeholder="Email"
                                    value="{{ old('jenjang', $data->jenjang) }}" autocomplete="new-email" required>
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
                                <label for="Foto">Foto</label>
                                <input type="file" name="image" id="image" class="form-control" 
                                    autocomplete="image" >

                               
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('programstudi.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    $('#editFormData').submit(function(event){
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("programstudi.update", $data->id) }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response){
                window.location.href = '{{ route('programstudi.index') }}';
            },
            error: function(jqXHR, exception){
                console.warn('something went wrong');
            }
        });
    });
</script>

@endsection

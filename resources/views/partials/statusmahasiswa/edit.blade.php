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
        <form id="editFormData" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Nama Status Mahasiswa</label>
                                <input type="text" name="nama_status_mahasiswa" id="name" class="form-control" placeholder="Name"
                                    value="{{ old('nama_status_mahasiswa', $data->nama_status_mahasiswa) }}" autocomplete="new-name" required>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('statusmahasiswa.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    
    $('#editFormData').submit(function(event){
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("statusmahasiswa.update", $data->id) }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response){
                window.location.href = '{{ route('statusmahasiswa.index') }}';
            },
            error: function(jqXHR, exception){
                console.warn('something went wrong');
            }
        });
    });
</script>


@endsection

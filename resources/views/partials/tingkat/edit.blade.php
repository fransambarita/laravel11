@extends('../layouts.main')
@section('contents')


<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tingkat</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('ruangkelas.index') }}" class="btn btn-primary">Back</a>
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
                                <label for="name">Nama Tingkat</label>
                                <input type="text" name="nama_tingkat" id="name" class="form-control" placeholder="Name"
                                    value="{{ old('nama_tingkat', $data->nama_tingkat) }}" autocomplete="new-name" required>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('tingkat.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    
    $('#editFormData').submit(function(event){
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("tingkat.update", $data->id) }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response){
                window.location.href = '{{ route('tingkat.index') }}';
            },
            error: function(jqXHR, exception){
                console.warn('something went wrong');
            }
        });
    });
</script>


@endsection

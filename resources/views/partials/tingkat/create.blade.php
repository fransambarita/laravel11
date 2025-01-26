@extends('../layouts.main')
@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tingkat</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('tingkat.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form id="tingkatFormData"  action="{{ route('tingkat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_ruang_kelas">Nama Tingkat</label>
                                <input type="text" name="nama_tingkat" id="nama_tingkat" class="form-control" 
                                    autocomplete="nama_tingkat" required>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('tingkat.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    $('#tingkatForm').submit(function (event) {
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("tingkat.store") }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    window.location.href = '{{ route('tingkat.index') }}';
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
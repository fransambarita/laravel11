@extends('../layouts.main')
@section('contents')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tahun Akademik</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('tahunakademik.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form id="tahunakademikFormData"  action="{{ route('tahunakademik.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_ruang_kelas">Tahun Akademik</label>
                                <input type="text" name="tahun_akademik" id="tahun_akademik" class="form-control" 
                                    autocomplete="tahun_akademik" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_ruang_kelas">Active</label>
                                <input type="text" name="is_active" id="is_active" class="form-control" 
                                    autocomplete="is_active" required>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('tahunakademik.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    $('#tahunakademikForm').submit(function (event) {
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("tahunakademik.store") }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    window.location.href = '{{ route('tahunakademik.index') }}';
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
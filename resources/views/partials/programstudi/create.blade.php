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
        <form id="matakuliahFormData"  action="{{ route('programstudi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_mahasiswa">Nama Program Studi</label>
                                <input type="text" name="nama_program_studi" id="nama_program_studi" class="form-control" 
                                    autocomplete="nama_program_studi" required>
                            </div>
                        </div>
                        <!-- Tempat Lahir -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tempat_lahir">Jenjang</label>
                                <input type="text" name="jenjang" id="jenjang" class="form-control" 
                                    autocomplete="jenjang" required>
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
                                <label for="foto">File Foto</label>
                                <input type="file" name="image" id="image" class="form-control" 
                                    autocomplete="image" required>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('programstudi.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>

<script>
    $('#matakuliahForm').submit(function (event) {
        event.preventDefault();
        var element = $(this);
        $.ajax({
            url: '{{ route("programstudi.store") }}',
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    window.location.href = '{{ route('programstudi.index') }}';
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
@extends('layouts.default')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div class="ml-md-auto py-2 py-md-0">
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Form Artikel</div>
                            <a href="{{ route('artikel.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('artikel.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul Artikel</label>
                                <input type="text" name="judul" class="form-control" id="judul"
                                    placeholder="Masukkan judul artikel">
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" class="form-control" id="body" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select name="kategori_id" class="form-control">
                                    @foreach ($kategori as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="penulis_id">Penulis</label>
                                <select name="penulis_id" class="form-control">
                                    @foreach ($penulis as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_penulis }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gambar_artikel">Gambar Artikel</label>
                                <input type="file" name="gambar_artikel" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="is_active">Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TinyMCE Script -->
    <script src="https://cdn.tiny.cloud/1/6jdasye4n88gih6plksapgsl334fmqa48fzzs0rirp23llra/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#body',
            apiKey: '6jdasye4n88gih6plksapgsl334fmqa48fzzs0rirp23llra',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | bold italic underline strikethrough | bullist numlist | link image',
            images_upload_url: '/upload'
        });
    </script>
@endsection

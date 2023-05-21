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
                            <div class="card-title">Data Tentang Kami</div>
                            <a href="{{ route('tentang-kami.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                    class="fa fa-plus"></i> Tambah Tentang Kami</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-primary">
                                {{ Session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Alamat</th>
                                        <th>Gambar</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tentang as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->judul }}</td>
                                            <td>{{ $row->deskripsi }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>
                                                <img src="{{ $row->gambar }}" alt="Gambar" style="max-width: 200px;">
                                            </td>
                                            <td>{{ $row->telepon }}</td>
                                            <td>
                                                <a href="{{ route('tentang-kami.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Edit</a>
                                                <form action="{{ route('tentang-kami.destroy', $row->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data Masih Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

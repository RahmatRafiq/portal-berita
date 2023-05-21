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
                            <div closs="card-title"> Data Artikel</div>
                            <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                    class="fa fa-plus"></i> Tambah Artikel</a>
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
                                        <th>Nama Artikel</th>
                                        <th>Slug</th>
                                        <th>Kategori</th>
                                        <th>Author</th>
                                        <th>Penulis</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($artikel as  $i=>$row)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $row->judul }}</td>
                                            <td>{{ $row->slug }}</td>
                                            <td>{{ $row->kategori->nama_kategori }}</td>
                                            <td>{{ $row->users->name }}</td>
                                            <td>{{ $row->penulis->nama_penulis }}</td>
                                            <td>
                                                <a href="{{ route('artikel.edit', $row->id) }}"
                                                    class=" btn btn-warning btn-sm"><i class="fas fa-pen"></i>Edit</a>

                                                <form action="{{ route('artikel.destroy', $row->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method ('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Masih Kosong</td>
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

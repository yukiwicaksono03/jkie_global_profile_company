@extends('layouts.dashboard-main')
@section('main')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <a href="/admin/category/add" class="btn btn-primary btn-sm">
                    Tambah Category
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item) 
                            <tr>
                                <th scope="row">{{ $category->firstItem() + $loop->index }}</th>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="/admin/category/update/{{ $item->id }}">
                                        <span class="badge badge-info">Edit</span>
                                    </a>
                                    <form action="{{ route('admin.category.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge badge-warning border-0" style="cursor:pointer">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $category->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.dashboard-main')
@section('main')
<div class="card">
    <div class="card-header">
        <a href="/admin/menu/add" class="btn btn-primary btn-sm">
            Tambah Menu
        </a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Best</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu) 
                    <tr>
                        <th scope="row">{{ $menus->firstItem() + $loop->index }}</th>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->desc }}</td>
                        <td>{{ $menu->category->name }}</td>
                        <td>
                            @if ($menu->is_best)
                                <span class="badge badge-success">Ya</span>
                                @else
                                <span class="badge badge-danger">Tidak</span>
                            @endif
                        </td>
                        <td>
                            <a href="/admin/menu/update/{{ $menu->id }}">
                                <span class="badge badge-info">Edit</span>
                            </a>
                            <form action="{{ route('admin.menu.delete', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus menu ini?');">
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
            {{ $menus->links() }}
        </div>
    </div>
</div>
@endsection
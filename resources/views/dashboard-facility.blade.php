@extends('layouts.dashboard-main')
@section('main')
<div class="card">
    <div class="card-header">
        <a href="/admin/facility/add" class="btn btn-primary btn-sm">
            Tambah Facility
        </a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facility as $item) 
                    <tr>
                        <th scope="row">{{ $facility->firstItem() + $loop->index }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->desc }}</td>
                        <td>
                            <a href="/admin/facility/update/{{ $item->id }}">
                                <span class="badge badge-info">Edit</span>
                            </a>
                            <form action="{{ route('admin.facility.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus facility ini?');">
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
            {{ $facility->links() }}
        </div>
    </div>
</div>
@endsection

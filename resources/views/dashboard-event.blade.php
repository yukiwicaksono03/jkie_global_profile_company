@extends('layouts.dashboard-main')
@section('main')
<div class="card">
    <div class="card-header">
        <a href="/admin/event/add" class="btn btn-primary btn-sm">
            Tambah Event
        </a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Foto</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event as $item) 
                    <tr>
                        <th scope="row">{{ $event->firstItem() + $loop->index }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->desc }}</td>
                        <td>{{ format_date($item->date) }}</td>
                        <td>
                            {{ format_time($item->start_time) }}
                            -
                            {{ $item->end_time ? format_time($item->end_time) : 's/d selesai' }}
                        </td>
                        <td>
                            <div class="mb-2 w-100" id="preview-wrapper">
                                <img src="{{ asset('storage/'.$item->photo) }}" alt="Preview" width="200" class="img-thumbnail" >
                            </div>
                        </td>
                        <td>
                            <a href="/admin/event/update/{{ $item->id }}">
                                <span class="badge badge-info">Edit</span>
                            </a>
                            <form action="{{ route('admin.event.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus event ini?');">
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
            {{ $event->links() }}
        </div>
    </div>
</div>
@endsection

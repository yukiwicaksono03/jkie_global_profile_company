@extends('layouts.dashboard-main')
@push('style')
    <style>
        .modal-transparent .modal-dialog {
            pointer-events: none;
        }

        .modal-transparent .modal-content {
            background: transparent;
            border: none;
            box-shadow: none;
            pointer-events: auto;
        }

        .modal-transparent .modal-body {
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 0 !important;
            position: relative;
            overflow: hidden;
        }

        .modal-transparent .modal-body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            pointer-events: none;
            z-index: 1;
        }

        .modal-transparent img {
            position: relative;
            z-index: 2;
            max-height: 80vh;
            width: auto;
            max-width: 100%;
            display: block;
            margin: 0 auto;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }
    </style>
@endpush
@section('main')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="/admin/entertainment/create" class="btn btn-primary btn-sm">
                    Tambah Wahana
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
                            <th scope="col">Photo</th>
                            <th scope="col">Title</th>
                            <th scope="col">Desc</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entertainments as $item) 
                            <tr>
                                <th  style="width:5%;" scope="row">{{ $entertainments->firstItem() + $loop->index }}</th>
                                <td style="width:30%;">
                                    <div id="carousel-{{ $item->id }}" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('storage/'.$item->path_1) }}" style="width:100%; height:150px; object-fit:cover;" style="cursor:pointer"
                                                    onclick="openPreview('{{ asset('storage/'.$item->path_1) }}')">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/'.$item->path_2) }}" style="width:100%; height:150px; object-fit:cover;" style="cursor:pointer"
                                                    onclick="openPreview('{{ asset('storage/'.$item->path_2) }}')">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/'.$item->path_3) }}" style="width:100%; height:150px; object-fit:cover;" style="cursor:pointer"
                                                    onclick="openPreview('{{ asset('storage/'.$item->path_3) }}')">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-target="#carousel-{{ $item->id }}" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-target="#carousel-{{ $item->id }}" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </td>
                                <td style="width:20%;">{{ $item->title }}</td>
                                <td style="width:35%;">{{ $item->desc }}</td>
                                <td style="width:10%;">
                                    <a href="/admin/entertainment/{{ $item->id }}/edit">
                                        <span class="badge badge-info">Edit</span>
                                    </a>
                                    <form action="/admin/entertainment/{{ $item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus kategori ini?');">
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
                    {{ $entertainments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-transparent" id="previewModal" tabindex="-1" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-body p-3 text-center position-relative">
                <img id="previewImage"
                     src=""
                     class="img-fluid rounded"
                     style="max-height:500px; object-fit:contain;">
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        function openPreview(image) {
            document.getElementById('previewImage').src = image;

            const modal = new bootstrap.Modal(
                document.getElementById('previewModal')
            );
            modal.show();
        }
    </script>

@endpush
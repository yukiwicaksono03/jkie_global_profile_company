@extends('layouts.dashboard-main')
@section('main')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="/admin/slider/create" class="btn btn-primary btn-sm">
                    Tambah Slider
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
                            <th scope="col">desc</th>
                            <th scope="text-end">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $item) 
                             <tr>
                                <th  style="width:5%;" scope="row">{{ $sliders->firstItem() + $loop->index }}</th>
                                <td style="width:30%;">
                                    <img src="{{ asset('storage/'.$item->path) }}" alt="" class="w-100" style="cursor:pointer"
                                    onclick="openPreview('{{ asset('storage/'.$item->path) }}')">
                                </td>
                                <td style="width:55%;">{{ $item->desc }}</td>
                                <td style="width:10%;">
                                    <a href="/admin/slider/{{ $item->id }}/edit">
                                        <span class="badge badge-info">Edit</span>
                                    </a>
                                    <form action="/admin/slider/{{ $item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus kategori ini?');">
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
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="previewModal" tabindex="-1" data-bs-backdrop="false" data-bs-keyboard="false">
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
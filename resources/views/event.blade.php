@extends('layouts.main')
@section('main')
<div class="container" style="margin-top: 100px; margin-bottom: 200px">
    <p class="fw-bold text-center fs-2">
        Event
    </p>
    <p class="text-center fs-6 mb-5">
        {{ $master->desc_event }}
    </p>
    <form action="{{ route('event') }}" method="GET">
        <div class="row mb-5 d-flex justify-content-center">
            <div class="col-lg-5">
                <div class="input-group">
                    <span class="input-group-text fw-semibold">Tahun:</span>
                    <select class="form-select" name="year">
                        <option value="" {{ request('year') == '' ? 'selected' : '' }}>Semua</option>
                        @php
                            $currentYear = date('Y');
                            $startYear = 2023; 
                        @endphp
                        @for ($year = $startYear; $year <= $currentYear; $year++)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endfor
                    </select>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="input-group">
                    <span class="input-group-text fw-semibold">Bulan:</span>
                    <select class="form-select" name="month">
                        <option value="" {{ request('month') == '' ? 'selected' : '' }}>Semua</option>
                        @php
                            $months = [
                                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                            ];
                        @endphp
                        @foreach ($months as $num => $name)
                            <option value="{{ $num }}" {{ request('month') == $num ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-12 col-lg-2">
                <button type="submit" class="btn btn-green-outline w-100">Filter</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Waktu</th>
            <th scope="col">Nama Event</th>
            <th scope="col">Deskripsi</th>
            <th scope="col"></th>
            </tr>
        </thead>
            <tbody>
                @forelse ($events as $item)
                    <tr>
                        <th scope="row">{{ $events->firstItem() + $loop->index }}</th>
                        <td>{{ format_date($item->date) }}</td>
                        <td>
                            {{ format_time($item->start_time) }}
                            -
                            {{ $item->end_time ? format_time($item->end_time) : 's/d selesai' }}
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->desc }}</td>
                        <td class="text-center">
                            <a href="{{ whatsapp_url( $master->whatsapp) }}?text={{ urlencode('Halo, saya ingin daftar event '.$item->name) }}" 
                            class="btn btn-green" target="_blank">
                                Daftar
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada event tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
    </table>
    <div class="mt-3">
        {{ $events->links() }}
    </div>
</div>
@endsection
@extends('Lokasi.template.layout')

@section('content_datatable')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">Daftar Lokasi</h4>
        </div>
        {{-- <a href="{{ route('lokasi.create') }}" class="btn btn-primary">Tambah Lokasi</a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lokasi</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lokasis as $lokasi)
                    <tr>
                        <td>{{ $lokasi->id }}</td>
                        <td>{{ $lokasi->nama_lokasi }}</td>
                        <td>
                            <a href="{{ route('lokasi.edit', $lokasi->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('lokasi.destroy', $lokasi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $lokasis->links() }}
        </div>
    </div>
</div>
@endsection

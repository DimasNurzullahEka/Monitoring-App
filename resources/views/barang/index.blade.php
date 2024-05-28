@extends('barang.template.layout')
@section('title', 'Ruang Azzara|| Rumah Sakit Islam Jemursari')
@section('content_datatable')
    <div class="card">
        {{-- <form method="GET">
            <div class="row mb-3">
                <label for="search" class="col-sm-2 col-form-label">Cari Data</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm"
                        placeholder="Please Input Key For Search Data..." name="search" autofocus
                        value="{{ $search }}">
                </div>
            </div>
        </form> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="barang-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nomer Seri</th>
                            <th>Nama Barang</th>
                            <th>Lokasi</th>
                            <th>Tipe</th>
                            <th>Status Barang</th>
                            <th>Kondisi</th>
                            <th>Tahun</th>
                            <th>Keterangan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->kode->nama_kode }}</td>
                                <td>{{ $barang->nomer_seri }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->lokasi->nama_lokasi }}</td>
                                <td>{{ $barang->type->nama_type }}</td>
                                <td>{{ $barang->status_barang }}</td>
                                <td>{{ $barang->kondisi }}</td>
                                <td>{{ $barang->tahun }}</td>
                                <td>{{ $barang->keterangan }}</td>
                                <td>
                                    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$barangs->links()}}
            </div>
        </div>
    </div>
@endsection

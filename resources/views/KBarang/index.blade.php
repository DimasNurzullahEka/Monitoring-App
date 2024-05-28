@extends('KBarang.template.layout')
@section('content_datatable')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">Daftar Kode Barang</h4>
        </div>
    </div>
    {{-- <form method="GET">
        <div class="row mb-3">
            <label for="search" class="col-sm-2 col-form-label">Cari Data</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm"
                    placeholder="Please Input Key For Search Data..." name="search" autofocus value="{{ $search }}">
            </div>
        </div>
    </form> --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kodeBarangs as $kode)
                        <tr>
                            <td>{{ $kode->nama_kode }}</td>
                            <td>
                                {{-- Uncomment if show and edit functionality is needed --}}
                                {{-- <a href="{{ route('tipes.show', $tipe->id) }}" class="btn btn-info">Show</a> --}}
                                <a href="{{ route('kode.edit', $kode->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('kode.destroy', $kode->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{$kodeBarangs->links()}}
        </div>
    </div>
</div>
@endsection

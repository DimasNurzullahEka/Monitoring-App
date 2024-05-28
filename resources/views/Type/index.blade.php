@extends('Type.template.layout')
@section('content_datatable')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">Daftar Tipe</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tipe ID</th>
                        <th>Nama Type</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipes as $tipe)
                        <tr>
                            <td>{{ $tipe->id }}</td>
                            <td>{{ $tipe->nama_type }}</td>
                            <td>
                                {{-- Uncomment if show and edit functionality is needed --}}
                                {{-- <a href="{{ route('tipes.show', $tipe->id) }}" class="btn btn-info">Show</a> --}}
                                <a href="{{ route('type.edit', $tipe->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('type.destroy', $tipe->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$tipes->links()}}
        </div>
    </div>
</div>
@endsection

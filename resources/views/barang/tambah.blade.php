@extends('barang.template.l_tambah')

@section('conten_formTambahTipe')
<form id="form-wizard1" method="POST" action="{{ route('barang.store') }}" class="mt-3 text-center">
    @csrf
    <ul id="top-tab-list" class="p-0 row list-inline">
        <li class="mb-2 col-lg-3 col-md-6 text-start active" id="account">
            <a href="javascript:void();">
                <div class="iq-icon me-3">
                    <svg class="svg-icon icon-20" xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="dark-wizard">Barang</span>
            </a>
        </li>
        <li id="confirm" class="mb-2 col-lg-3 col-md-6 text-start">
            <a href="javascript:void();">
                <div class="iq-icon me-3">
                    <svg class="svg-icon icon-20" xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <span class="dark-wizard">Finish</span>
            </a>
        </li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <div class="form-card text-start">
            <div class="row">
                <div class="col-7">
                    <h3 class="mb-4">Data Barang Information:</h3>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 1 - 2</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">KodeBarang: *</label>
                        <select class="form-control select2" name="kodeBarang_id" required>
                            <option value="">Pilih Kode</option>
                            @foreach($kodes as $kode)
                                <option value="{{ $kode->id }}" {{ old('kodeBarang_id') == $kode->id ? 'selected' : '' }}>{{ $kode->nama_kode }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('kodeBarang_id'))
                            <span class="text-danger">{{ $errors->first('kodeBarang_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nomor Seri: *</label>
                        <input type="text" class="form-control" name="nomer_seri" placeholder="Nomor Seri" value="{{ old('nomer_seri') }}" required />
                        @if ($errors->has('nomer_seri'))
                            <span class="text-danger">{{ $errors->first('nomer_seri') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nama Barang: *</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="{{ old('nama_barang') }}" required />
                        @if ($errors->has('nama_barang'))
                            <span class="text-danger">{{ $errors->first('nama_barang') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Lokasi: *</label>
                        <select class="form-control select2" name="lokasi_id" required>
                            <option value="">Pilih Lokasi</option>
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}" {{ old('lokasi_id') == $lokasi->id ? 'selected' : '' }}>{{ $lokasi->nama_lokasi }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('lokasi_id'))
                            <span class="text-danger">{{ $errors->first('lokasi_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Type: *</label>
                        <select class="form-control select2" name="type_id" required>
                            <option value="">Pilih Type</option>
                            @foreach($datatypes as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->nama_type }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('type_id'))
                            <span class="text-danger">{{ $errors->first('type_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Status Barang: *</label>
                        <select class="form-control" name="status_barang" required>
                            <option value="ada" {{ old('status_barang') == 'ada' ? 'selected' : '' }}>Ada</option>
                            <option value="tidak" {{ old('status_barang') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                        </select>
                        @if ($errors->has('status_barang'))
                            <span class="text-danger">{{ $errors->first('status_barang') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Kondisi: *</label>
                        <select class="form-control" name="kondisi" required>
                            <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="rusak" {{ old('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                        @if ($errors->has('kondisi'))
                            <span class="text-danger">{{ $errors->first('kondisi') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Tahun: *</label>
                        <input type="text" class="form-control" name="tahun" placeholder="Tahun" value="{{ old('tahun') }}" required />
                        @if ($errors->has('tahun'))
                            <span class="text-danger">{{ $errors->first('tahun') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Keterangan: *</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}" required />
                        @if ($errors->has('keterangan'))
                            <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary action-button float-end">Submit</button>
        </div>
    </fieldset>
</form>

<!-- Include Select2 CSS and JS for search functionality in the dropdowns -->
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css

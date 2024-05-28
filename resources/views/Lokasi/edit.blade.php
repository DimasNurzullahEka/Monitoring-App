@extends('Lokasi.template.tambah_layout')

@section('conten_formTambahLokasi')
    <form id="form-wizard1" method="POST" action="{{ route('lokasi.update', $lokasi->id) }}" class="mt-3 text-center">
        @csrf
        @method('PUT')
        <ul id="top-tab-list" class="p-0 row list-inline">
            <li class="mb-2 col-lg-3 col-md-6 text-start active" id="account">
                <a href="javascript:void();">
                    <div class="iq-icon me-3">
                        <svg class="svg-icon icon-20" xmlns="http://www.w3.org/2000/svg" width="20" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="dark-wizard">Lokasi</span>
                </a>
            </li>
            <li id="confirm" class="mb-2 col-lg-3 col-md-6 text-start">
                <a href="javascript:void();">
                    <div class="iq-icon me-3">
                        <svg class="svg-icon icon-20" xmlns="http://www.w3.org/2000/svg" width="20" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
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
                        <h3 class="mb-4">Lokasi Information:</h3>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 1 - 2</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Lokasi ID: *</label>
                            <input type="text" class="form-control" name="id" value="{{ old('id', $lokasi->id) }}" required />
                            @if ($errors->has('id'))
                                <span class="text-danger">{{ $errors->first('id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi: *</label>
                            <input type="text" class="form-control" name="nama_lokasi" placeholder="Lokasi"
                                value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}" required />
                            @if ($errors->has('nama_lokasi'))
                                <span class="text-danger">{{ $errors->first('nama_lokasi') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary action-button float-end">Submit</button>
        </fieldset>
    </form>
@endsection

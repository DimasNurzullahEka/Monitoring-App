@extends('Type.template.L_Success')
@section('conten_success')
<form id="form-wizard1" class="mt-3 text-center">
    <fieldset>
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h3 class="mb-4 text-left">Finish:</h3>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 2 - 2</h2>
                </div>
            </div>
            <br><br>
            <h2 class="text-center text-success"><strong>SUCCESS !</strong></h2>
            <br>
            <div class="row justify-content-center">
                <div class="col-3">
                    <img src="{{ asset('Admin/images/pages/img-success.png') }}" class="img-fluid" alt="fit-image">
                </div>
            </div>
            <br><br>
            <div class="row justify-content-center">
                <div class="text-center col-7">
                    <h5 class="text-center purple-text">
                        Kamu Telah berhasil Menambahkan data Tipe!!<a href="{{route('type.index')}}" class="text-underline">Kembali Ke halaman Tipe</a>
                    </h5>
                </div>
            </div>
        </div>
    </fieldset>
</form>
@endsection

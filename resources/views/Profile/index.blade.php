@extends('Profile.template.layout')

@section('info-user')
<div class="new-user-info">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <label class="form-label" for="username">User Name:</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" placeholder="User Name" required>
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="pass">Password:</label>
                <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="rpass">Repeat Password:</label>
                <input type="password" class="form-control" id="rpass" name="password_confirmation" placeholder="Repeat Password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection

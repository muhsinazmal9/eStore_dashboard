@extends('layouts.dashboard')

@section('main_content')
    <div class="row">
        {{-- profile picture --}}
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('edit-profile/profile_picture/upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <h6 class="card-title">Update Profile Picture</h6>
                            <label class="form-label" for="formFile">Upload your file</label>
                            <input class="form-control" type="file" id="formFile" name="profile_picture">
                        </div>
                        @error('profile_picture')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </form>
                    <img class="mt-3 wd-100 rounded-circle" src="{{ asset('uploads/profile_pictures') }}/{{ Auth::user()->profile_picture }}" alt="{{ Auth::user()->profile_picture }}">
                </div>
            </div>
        </div>
        {{-- password --}}
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('edit-profile/password/change') }}" method="POST">
                        @csrf
                        <h6 class="card-title">Update Password</h6>
                        <div class="mb-3">
                            <label class="form-label" for="pass">Old Password</label>
                            <input class="form-control" type="password" id="pass" name="old_password" placeholder="●●●●●●●●">
                        </div>
                        @error('old_password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label" for="pass">New Password</label>
                            <input class="form-control" type="password" id="pass" name="password" placeholder="●●●●●●●●">
                        </div>
                        @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label" for="pass">Confirm New Password</label>
                            <input class="form-control" type="password" id="pass" name="password_confirmation" placeholder="●●●●●●●●">
                        </div>
                        @error('password_confirmation')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        @if(session()->has('msg'))
                            <div class="alert alert-success">
                                {{ session()->get('msg') }}
                            </div>
                        @endif
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- cover photo --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('edit-profile/cover_photo/upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h6 class="card-title">Update Cover Photo</h6>
                    <div class="mb-3">
                        <label class="form-label" for="cover_photo_update">Upload your file</label>
                        <input class="form-control" type="file" id="cover_photo_update" name="cover_photo">
                    </div>
                    @error('cover_photo')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <button class="btn btn-primary" type="submit">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.dashboard')

@section('main_content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Upload Profile Picture</h6>
                    <form action="{{ url('edit-profile/profile_picture/upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="formFile">Upload your profile picture here..</label>
                            <input class="form-control" type="file" id="formFile" name="profile_picture">
                        </div>
                        @error('profile_picture')
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
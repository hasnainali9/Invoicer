@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Edit Profile</h4>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('updateProfile.store')}}">
                {{ csrf_field() }}
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Name</label>
                    <div class="col-9">
                            <input type="text" class="form-control" name="name"  value="{{ $user->name }}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Email Address</label>
                    <div class="col-9">
                        <input type="email" class="form-control" name="email"  value="{{ $user->email }}" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Password</label>
                    <div class="col-9">
                        <input type="password" class="form-control" name="password" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Password</label>
                    <div class="col-9">
                        <input type="password" class="form-control" name="password_confirmation" />
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
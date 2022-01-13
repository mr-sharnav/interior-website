@extends('admin.include.app')
@section('admin')

<div class="card card-bordered">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">Update User Informations</h5>
        </div>
        <form action="{{url('user/management/'.$users->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="full-name-1">Full Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="full-name-1" name="name" value="{{ $users->name }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">Email address</label>
                        <div class="form-control-wrap">
                            <input type="email" class="form-control"  name="email" value="{{ $users->email }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="phone-no-1">Phone No</label>
                        <div class="form-control-wrap">
                            <input type="phone" class="form-control" name="phone" value="{{ $users->phone }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="pay-amount-1">Password</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="password" id="pay-amount-1">
                        </div>
                    </div>
                </div>
                
                
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Update Informations</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
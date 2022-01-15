@extends('admin.include.app')
@section('admin')

<div class="card card-bordered">

    <div class="card-inner ">
        <h5 class="card-title float-left mt-1 ">Provide Information</h5>

        <a href="{{route('construction.index')}}" class="btn btn-danger float-right"><em class="icon ni ni-file-docs"></em><span class="ml-1">Manage Service Construction</span></a>

    </div>
</div>
<div class="card card-bordered h-100">
    <div class="card-inner">

        <form action="{{ route('construction.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="full-name">Construction Project Title</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" name="title">
                    @if($errors->has('title'))
                    <span class="text-danger ">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="full-name">Select Image</label>
                <div class="form-control-wrap">
                    <input type="file" class="form-control" name="construction_image">
                    @if($errors->has('construction_image'))
                    <span class="text-danger ">{{ $errors->first('construction_image') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
            </div>
        </form>
    </div>
</div>


@endsection
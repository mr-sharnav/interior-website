@extends('admin.include.app')
@section('admin')

<div class="card card-bordered">

    <div class="card-inner ">
        <h5 class="card-title float-left mt-1 ">Update Information</h5>

        <a href="{{route('interior.index')}}" class="btn btn-primary float-right"><em class="icon ni ni-file-docs"></em><span class="ml-1">Manage Service Interior</span></a>

    </div>
</div>
<div class="card card-bordered h-100">
    <div class="card-inner">

        <form action="{{ route('interior.update',$serviceInteriorEdit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label" for="full-name">Interior Project Title</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" name="title" value="{{$serviceInteriorEdit->title}}">
                    @if($errors->has('title'))
                    <span class="text-danger ">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="full-name">Current Image</label>
                <div class="form-control-wrap">
                <img src="/interior/picture/{{$serviceInteriorEdit->image}}" alt="no image"  class="img-thumbnail" style="height: 150px;width: 250px">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="full-name">Select Image</label>
                <div class="form-control-wrap">
                    <input type="file" class="form-control" name="interior_image">
                    @if($errors->has('interior_image'))
                    <span class="text-danger ">{{ $errors->first('interior_image') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary">Update Informations</button>
            </div>
        </form>
    </div>
</div>


@endsection
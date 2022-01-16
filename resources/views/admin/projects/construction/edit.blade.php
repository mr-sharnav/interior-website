@extends('admin.include.app')
@section('admin')

<div class="card card-bordered">

    <div class="card-inner ">
        <h5 class="card-title float-left mt-1 ">Update Information</h5>

        <a href="{{route('project.index')}}" class="btn btn-primary float-right"><em class="icon ni ni-file-docs"></em><span class="ml-1">Manage Project Construction</span></a>

    </div>
</div>
<div class="card card-bordered h-100">
    <div class="card-inner">
    <form action="{{ route('project.update',$projectList->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label" for="full-name">Project Title</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" name="title" value="{{$projectList->title}}">
                    @if($errors->has('title'))
                    <span class="text-danger ">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="full-name">Select Service</label>
                <div class="form-control-wrap">
                    <select name="sub_category_id" class="form-control">
                        @foreach($serviceList as $list)

                        @if($list->id == $projectList->subcategory_id)
                        <option value="{{$list->id}}"selected="selected">{{$list->title}}</option>
                        @else
                        <option value="{{$list->id}}">{{$list->title}}</option>
                        @endif
                        @endforeach
                    </select>
                    @if($errors->has('title'))
                    <span class="text-danger ">{{ $errors->first('sub_category_id') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="full-name">Short Description</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" name="short_description" value="{{$projectList->short_description}}">
                    @if($errors->has('title'))
                    <span class="text-danger ">{{ $errors->first('short_description') }}</span>
                    @endif
                </div>
            </div>

            
            <div class="form-group">
                <label class="form-label" for="full-name">Long Description</label>
                <div class="form-control-wrap">
                    
                    <textarea id="summernote" name="long_description" class="form-control" >{{$projectList->description}}</textarea>
                    @if($errors->has('title'))
                    <span class="text-danger ">{{ $errors->first('long_description') }}</span>
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

@section('js')
<script>
$(document).ready(function() {
$('#summernote').summernote({
        placeholder: 'Write here a description',
        tabsize: 2,
        height: 200
      });

// var serviceList = @json($serviceList);
// console.log(serviceList);

});
</script>
@endsection
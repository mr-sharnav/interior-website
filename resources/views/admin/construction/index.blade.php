@extends('admin.include.app')
@section('admin')

@if($message = Session::get('success'))
<div class="alert alert-info text-center">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong class="text-center">{{ $message }}</strong>
</div>
@endif
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">

        <div class="card card-bordered">

            <div class="card-inner ">
                <h5 class="card-title float-left mt-1 ">Service Construction List</h5>

                <a href="{{route('construction.create')}}" class="btn btn-success float-right"><em class="icon ni ni-file-docs"></em><span class="ml-1">Add Service Construction</span></a>

            </div>
        </div>


    </div>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Image</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Action</span></th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($constructionDetails as $details)

                    <tr class="nk-tb-item">

                        
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-lead">{{$details->title}} </span>
                        </td>

                        <td class="nk-tb-col tb-col-md">
                            <img src="{{$details->image}}" alt="no image"  class="img-thumbnail" style="height: 90px;width: 150px">
                        </td>

                       

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li>
                                    <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit">

                                        <em class="text-success icon ni ni-scissor"></em>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <em class="text-danger icon ni ni-trash"></em>

                                    </a>
                                </li>


                            </ul>
                        </td>
                    </tr><!-- .nk-tb-item  -->
                    @endforeach


                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div> <!-- nk-block -->

@endsection
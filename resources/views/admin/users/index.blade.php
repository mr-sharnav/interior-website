@extends('admin.include.app')
@section('admin')

<!-- Add user Modal Form Start -->
<div class="modal fade" tabindex="-1" id="userModalForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Provide User Information</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="{{route('management.store')}}" method="POST" class="form-validate is-alter">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="full-name">Full Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Email address</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone-no">Phone No</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone-no">Password</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="password" name="password" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success">Save Informations</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--Add User Modal From End -->



<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">

            <div class="nk-block-des">

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#userModalForm">Add Users</button>

            </div>
        </div>
    </div>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Created At</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Action</span></th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="nk-tb-item">

                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                </div>
                                <div class="user-info">
                                    <span class="tb-lead text-capitalize">{{$user->name}} <span class="dot dot-success d-md-none ml-1"></span></span>

                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-lead">{{$user->email}} </span>
                        </td>

                        <td class="nk-tb-col tb-col-md">
                            <span>{{$user->phone}} </span>
                        </td>

                        <td class="nk-tb-col tb-col-lg">
                            <span> {{Carbon\Carbon::parse($user->created_at)->diffForhumans() }} </span>
                        </td>

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li>
                                    <a href="{{url('user/management/'.$user->id.'/edit')}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit">

                                        <em class="text-success icon ni ni-scissor"></em>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('user/management/delete/'.$user->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete">
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
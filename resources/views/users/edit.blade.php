@extends('layouts.app')

@section('content')

    <main class="wrapper-menu profile_wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel-heading">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h3>Personal info</h3>
                    </div>
                    {{--<form action="" id="userProfile_info_form">--}}
                    {{--<div class="form-group">--}}
                    {{--<label for="formGroupExampleInput"> Name</label>--}}
                    {{--<input type="text" class="form-control" placeholder="" id="first_name"--}}
                    {{--value="{{Auth::user()->name}}">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                    {{--<label for="formGroupExampleInput">Email address</label>--}}
                    {{--<a href="#" class="change_email">Change email address</a>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                    {{--<button type="button" class="btn btn-secondary save_user_info">Save</button>--}}
                    {{--</div>--}}
                    {{--</form>--}}

                    <form method="POST" action="{{route('users.update', $user = Auth::user())}}">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}

                        <div class="form-group mb-3 mainRegInput">
                            <input name="email" type="text"
                                   class="fadeIn second form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   value="{{Auth::user()->email}}"
                                   aria-label="Email"
                                   aria-describedby="basic-addon1" placeholder="E-Mail Address">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group mb-3 mainRegInput">
                            <input name="name" type="text"
                                   class="fadeIn second form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   value="{{$user->name}}"
                                   aria-label="Username"
                                   aria-describedby="basic-addon1">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group mb-3 mainRegInput">
                            <input name="password" type="password"
                                   class="fadeIn second form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   placeholder="Password"
                                   aria-label="Password"
                                   aria-describedby="basic-addon1">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group mb-3 mainRegInput">
                            <input name="newPassword" type="password"
                                   class="fadeIn second form-control{{ $errors->has('newPassword') ? ' is-invalid' : '' }}"
                                   placeholder="New Password" aria-label="NewPassword" aria-describedby="basic-addon1">
                            @if ($errors->has('newPassword'))
                                <span class="invalid-feedback" role="alert">
                                {{ $errors->first('newPassword') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group mb-3 mainRegInput">
                            <input name="newPassword_confirmation" type="password" class="fadeIn second form-control"
                                   placeholder="Confirm New Password" aria-label="confirm newPassword"
                                   aria-describedby="basic-addon1">
                        </div>
                        <div style="text-align: center">
                            <button type="submit" class="btn btnAcc">Edit Account</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    {{--<form action="" id="profile_info_form">--}}
                    <fieldset>
                        <legend class="row-title">Profile photo</legend>
                        <div class="settings-item">
                            <div id="photo">
                                <div class="ProfilePhoto">
                                    <div class="photo-selector two-column">
                                        <div class="photo-preview left">
                                            @if(empty(Auth::user()->user_avatar))
                                                <img id="photo-upload-preview"
                                                     src="{{  asset('img/no-profile-pic.png') }}">
                                            @else
                                                <img id="photo-upload-preview" src="{{$url}}">
                                            @endif
                                        </div>
                                        <div>
                                            <form action="{{ route('profile') }}" method="POST"
                                                  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <div class="upload-image btn">
                                                        <span>Upload your photo</span>
                                                        <input class="upload-image-input form-control-file" type="file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                                    </div>
                                                </div>
                                                <div class="save_upload_files">
                                                    <button type="submit" id="upload_profile_photo"  class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                            <form action="{{ route('profile_remove') }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-secondary remove_img" style="width: 80px">Remove</button>
                                            </form>
                                        </div>
{{--                                        <div >--}}

{{--                                        </div>--}}

                                        {{--<div class="row">--}}
                                        {{--<div class="form-group col-md-6">--}}
                                        {{--<div class="preview">--}}
                                        {{--<label for="upload" >Choose File</label>--}}
                                        {{--<input type="file"  id="upload" class="upload" />--}}

                                        {{--<label for="upload" class="label">Upload New</label>--}}
                                        {{--<input type="file" class="form-control-file upload" id="upload_profile_photo" name="upload">--}}

                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group col-md-6">--}}
                                        {{--<label for="formGroupExampleInput"></label>--}}

                                        {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    {{--</form>--}}
                </div>

            </div>
        </div>
        {{--<div class="panel">--}}
        {{--<div class="page-header">--}}
        {{--<h1>Profile</h1>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
        {{--<form action="" id="profile_info_form">--}}
        {{--<fieldset>--}}
        {{--<legend class="row-title">Profile photo</legend>--}}
        {{--<div class="settings-item">--}}
        {{--<div id="photo">--}}
        {{--<div class="ProfilePhoto">--}}
        {{--<div class="photo-selector two-column">--}}
        {{--<div class="photo-preview left">--}}
        {{--@if(empty(Auth::user()->user_avatar))--}}
        {{--<img id="photo-upload-preview" src="{{'img/no-profile-pic.png'}}">--}}
        {{--@else--}}
        {{--<img id="photo-upload-preview"--}}
        {{--src="{{asset('user/'.Auth::user()->user_avatar)}}">--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<div class="form-group col-md-6">--}}
        {{--<label for="formGroupExampleInput">Upload New</label>--}}
        {{--<input type="file" class="form-control-file" id="upload_profile_photo">--}}
        {{--</div>--}}
        {{--<div class="form-group col-md-6">--}}
        {{--<label for="formGroupExampleInput"></label>--}}
        {{--<button type="button" class="btn btn-secondary remove_img">Remove</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</fieldset>--}}
        {{--<div class="form-group col-md-4">--}}
        {{--<label for="formGroupExampleInput"> Name</label>--}}
        {{--<input type="text" class="form-control" placeholder="" id="first_name"--}}
        {{--value="{{Auth::user()->name}}">--}}
        {{--</div>--}}
        {{--<div class="form-group col-md-9">--}}
        {{--<label for="formGroupExampleInput">Email address</label>--}}
        {{--<a href="#" class="change_email">Change email address</a>--}}
        {{--</div>--}}
        {{--<div class="form-group col-md-9">--}}
        {{--<button type="button" class="btn btn-secondary save_user_info">Save</button>--}}
        {{--</div>--}}
        {{--</form>--}}

        {{--</div>--}}
        {{--<div class="clear"></div>--}}
        {{--</div>--}}
        {{--<div class="clear"></div>--}}
    </main>

    <div class="modal fade" id="change_email_modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Check Password</h4>
                </div>
                <div class="message"></div>
                <div class="modal-body change_email">
                    <input type="password" name="password" id="password">
                    <button type="button" class="btn btn-default check_password">Check</button>
                </div>
            </div>
        </div>
    </div>
@endsection
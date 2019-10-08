@extends('admin/layouts.adminDashboard');
@section('content')
    <?php
    $admin = Cookie::get('admin_info');
    $admin_info = json_decode($admin);
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>

                </div>
                <div class="card-body no-padding height-9">
                    <div class="show_error"></div>
                    <form method="POST" id="edit_admin_form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="" placeholder="" name="admin_name" value="{{$admin->name}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input type="email" class="form-control" id="" placeholder="" name="admin_email" value="{{$admin->email}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Password</label>
                            <input type="password" class="form-control" id="" placeholder="" name="password" value="">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput"> Confirm Password</label>
                            <input type="password" class="form-control" id="" placeholder="" name="confirm_password" value="">
                        </div>
                        <button type="button" class="btn btn-primary edit_admin_info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

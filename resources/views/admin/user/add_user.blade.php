@extends('admin/layouts.adminDashboard');

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a classa="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body no-padding height-9">
                    <form method="POST" id="add_user_form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control"  placeholder="" name="name">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input type="email" class="form-control"  placeholder="" name="email">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput">Password</label>
                            <input type="password" class="form-control"  placeholder="" name="password">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Shcool year</label>
                            <input type="text" class="form-control" placeholder="" name="shcool_year">
                        </div>

                        <button type="button" class="btn btn-primary save_user">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

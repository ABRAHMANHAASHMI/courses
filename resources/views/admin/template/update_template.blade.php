@extends('admin/layouts.adminDashboard');

@section('content')
    <form method="POST" id="add_user_form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="formGroupExampleInput">Url</label>
            <input type="text" class="form-control"  placeholder="" name="name">
        </div>

        <button type="button" class="btn btn-primary find_url">Find</button>
    </form>
@endsection
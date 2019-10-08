@extends('admin/layouts.adminDashboard');

@section('content')
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
                    <form method="POST" id="find_template">
                        {{ csrf_field() }}
                        <div class="form-group col-md-7">
                            <label for="formGroupExampleInput">Choose page</label>
                            <select name="" class="form-control text-center" id="find_url_select">
                                @foreach($templates as $index => $value)
                                    <option value="{{$value['id']}}">{{$value['title']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="button"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary find_url">Find</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="html_builder_main_answer">

    </div>
@endsection

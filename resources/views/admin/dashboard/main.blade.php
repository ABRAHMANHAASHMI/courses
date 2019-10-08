
@extends('admin/layouts.adminDashboard');
@section('content')
    <div class="row">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    {{--<h3 align="center">Make Google Pie Chart in Laravel</h3><br />--}}

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Number of Premium and Free Users</h3>
                        </div>
                        <div class="panel-body" align="center">
                            <div id="pie_chart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-lg-12 p-t-20">

                </div>

                <div class="col-md-12">

                    {{--//    <h3 align="center">Make Google Pie Chart in Laravel</h3><br />--}}
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Number of Vistors on Dates</h3>
                        </div>

                        {{--<div class="w-50">--}}
                        {{--<form action="/admin/searchDate" >--}}
                        {{--<div class="form-control-wrapper">--}}
                        {{--<input type="text" id="date" name="date" class=" text-left bg-dark floating-label mdl-textfield__input chart_date"--}}
                        {{--placeholder="Search by date">--}}
                        {{--</div>--}}

                        {{--<input type="submit" class="btn btn--primary navbar-btn-right" value="Submit">--}}

                        {{--</form>--}}
                        {{--</div>--}}

                        <div class="panel-body" align="center">
                            <div id="bar_chart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-12">

        </div>
    </div>

    <div class="col-sm-12" style="display: none">
        <div class="card card-box">
            <div class="card-head">
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body no-padding height-9">
                <div class="row statistic_answer">

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


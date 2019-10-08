@extends('admin/layouts.adminDashboard');
@section('content')
    <?php
    $Plan = [
        '1' => 'Free',
        '2' => 'Premium',
    ];
    $payment_charge = [
        '1' => 'No',
        '2' => 'Yes',
    ];
    ?>
    {{--<div class="row">--}}
        {{--<div class="col-sm-12">--}}
            {{--<div class="card card-box">--}}
                {{--<div class="card-body no-padding height-9">--}}
                    {{--<div class="buttons">--}}
                        {{--<div class="my-form-group">--}}
                            {{--<button type="button" class="edit_subject btn btn-primary check_coupon">Verify</button>--}}
                            {{--<button type="button" class="edit_subjectbtn btn-primary check_coupon">Edit</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <div class="card-body ">
                    <form action="{{ url('/admin/check/premium/') }}">
{{--                    <form type="form-control" action="{{ route('/admin/check/premium' ) }}">--}}

                    <div style="margin-right: 820px">
{{--                            <form class="search-form-opened"  method="GET">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control" placeholder="Search..." name="find">--}}
{{--                                    <span class="input-group-btn"><a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a></span>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                            <div class="buttons" style="margin-left: 860px">
                                <div class="my-form-group">
                                    {{--<a href="/feestype/{{ $feesType->id }}/edit" class="btn btn-info btn-sm">Edit</a>--}}
                                    <button type="button" class="btn btn-primary" style="overflow: visible">Edit</button>&nbsp;&nbsp;&nbsp;
                                    <input type="submit" class="btn btn-primary" style="overflow: visible" value="Verify">
                                </div>
                            </div>
                        </div>
                        <table id="premium" class="mytable mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>School Year</th>
                                <th>Plan</th>
                                <th>Avatar</th>
                                <th>Charge</th>
                                <th>Check</th>
                                <th>Edit/Delete</th>
                            </tr>
                            </thead>
                            @if(!empty($users))
                                @foreach($users as $index => $single)
                                    <tbody>
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$single['name']}}</td>
                                        <td>{{$single['email']}}</td>
                                        <td>{{$single['shcool_year']}}</td>
                                        <td>
                                            @if(!empty($single['plan_id']))
                                                {{$Plan[$single['plan_id']]}}
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($single['user_avatar']))
                                                <img src="{{asset('user/'.$single['id'].'/'.$single['user_avatar'])}}" alt="" style="width: 50px;height: 50px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($single['payment_charge']))
                                                {{$payment_charge[$single['payment_charge']]}}
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($single['charge_check']))
                                                <img class="check_img" src="{{asset('user/'.$single['id'].'/'.$single['charge_check'])}}" alt="" style="width: 50px;height: 50px;">
                                            @endif
                                        </td>
                                        <td>
                                            <label>

                                                <input type="checkbox"  name="ids[{{$single['id']}}]" value="{{$single['id']}}"
                                                        {{ $single['plan_id'] == 2 ? 'checked:"checked"' :'' }}>
                                                <span class="checkmark"></span>

                                            </label>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            @endif
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="img_zoom_modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="message"></div>
                <div class="modal-body img_zoom">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="check_coupon_modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="message"></div>
                <div class="modal-body check_coupon_answer">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#premium').DataTable();
        });
    </script>
@endsection

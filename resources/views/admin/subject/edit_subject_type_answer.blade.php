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
                <form action="" id="save_edit_subj_form" method="post">

                    @if(!empty($subject_type))
                        @foreach($subject_type as  $index => $single)

                            <div class="my-form-group">
                                <div class="col-md-12 value-info">
                                    <label for="">{{$single->name}}</label>
                                    <input type="text" name="subj_name[{{$single->id}}]" value="{{$single->name}}">
                                </div>
                            </div>
                        @endforeach
                        <div class="my-form-group">
                            <div class="col-md-12 value-info">
                                <button type="button" class="save_edit_subject_type btn btn-primary ">Edit Subject Type</button>
                            </div>
                        </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

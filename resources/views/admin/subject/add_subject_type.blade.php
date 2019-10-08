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
                    <form method="POST" id="subject_type_form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="nameInp" placeholder="" name="nameInp">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Subject</label>
                            <select name="subject_id" id="" class="form-control">
                                <option value="">Select subject</option>
                                <?php
                                if(!empty($subjects)){

                                foreach ($subjects as $index => $val){ ?>
                                <option value="<?php echo $val['id'];?>"><?php echo $val['name']?></option>
                                <?php } } ?>

                            </select>
                        </div>
                        <button type="button" class="btn btn-primary save_subject_type">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

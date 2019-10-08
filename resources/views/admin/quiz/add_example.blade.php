@extends('admin/layouts.adminDashboard');
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Add Example</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>

                </div>
                <div class="card-body no-padding height-9">
                    <form method="POST" class="" id="exam_form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="formGroupExampleInput">Subjects</label>
                            <select name="subject_id" id="subject_id" class="form-control ">
                                <option value="">Select subject type</option>
                                <?php
                                if(!empty($subjects)){
                                foreach ($subjects as $val){ ?>
                                <option value="<?php echo $val['id']?>"><?php echo $val['name']?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" name="exam_name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Description</label>
                            <textarea name="description" class="form-control" style="resize: none;height: 166px;width: 656px;"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary  save_exam">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

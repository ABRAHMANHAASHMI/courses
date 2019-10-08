@extends('admin/layouts.adminDashboard');

@section('content')

   <!-- <div class="row">
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
                        <form method="POST" id="add_lesson_form">
                            <div class="show_error">

                            </div>
                            <input type="hidden" id="image_name" name="image_name" value="" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name</label>
                                <div class="mdl-textfield mdl-js-textfield " style="width: 100%">
                                    <input type="text" name="lesson_name" class="mdl-textfield__input" id="" placeholder="">
                                    <labeal class="mdl-textfield__label" for="text1">Name</labeal>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">title</label>
                                <div class="mdl-textfield mdl-js-textfield" style="width: 100%">
                                    <input type="text" name="title" class="mdl-textfield__input" id="" placeholder="">
                                    <labeal class="mdl-textfield__label" for="text1">Name</labeal>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Lesson Type</label>
                                <select name="lesson_type" id="lesson_type" class="form-control">
                                    <option value="1">Text</option>
                                    <option value="2">video</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Subject branch</label>
                                <select name="subject_type_id" id="" class="form-control">
                                    <?php
                                    if(!empty($subject_type)){

                                    foreach ($subject_type as $index => $val){ ?>
                                    <option value="<?php echo $val->id;?>"><?php echo $val->name; ?></option>
                                    <?php } } ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Lesson Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1">For Free</option>
                                    <option value="2">For Premium</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Lesson Text</label>
                                <textarea name="" id="lesson_text"></textarea>
                            </div>
                            <div class="form-group" >
                                <label for="lesson_video">lesson Video</label>
                                    <input type="text" name="video_name" class="mdl-textfield__input" id="" placeholder="">

                            </div>
                            <div class="form-group upload_progressbar" id="upload_progressbar">
                                <div class="progressbar">
                                    <div class="procent">
                                        <span class="proc_span"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="container drop_upload_pic">
                                <div>
                                    <label>Lesson Image</label>
                                    <div class="drop_upload dz-clickable" id="drop">
                                        <div class="plus_jpg">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </div>

                                        <div class="dz-message needsclick">
                                            <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="button" class="btn btn-primary save_lesson">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->

    <div class="row lesson_row" style="background-color: rgb(244,246,249)">
        <div class="first_box" >
<h2 style="text-align: center;font-family: Georgia, Times, serif">ADD LESSON</h2>
        </div>
        <div class="second_box">
            <div class="card card-box">
                <div class="card-body no-padding height-4 card_lesson">
                    <form method="POST" id="add_lesson_form">
                        <div class="show_error">
                        </div>
                        <input type="hidden" id="image_name" name="image_name" value="" >
                        {{ csrf_field() }}
                        <div class="groups">
                        <div class="form-group group_tittle">
                            <label for="formGroupExampleInput">Add title</label>
                            <div class="mdl-textfield mdl-js-textfield" style="width: 350px">
                                 <input type="text" name="title" class="mdl-textfield__input" id="" placeholder="">
                                {{--<labeal class="mdl-textfield__label" for="text1">Name</labeal>--}}
                            </div>
                        </div>
                        <div class="form-group add_lesson_group">
                            <label for="formGroupExampleInput">select sub-subject</label>
                            <select name="subject_type_id" id="" class="form-control" style="width: 470px">
                                <option value="1">القسم1</option>
                                <option value="5">القسم2</option>
                                <option value="4">القسم3</option>
                            </select>
                        </div>
                        <div class="form-group add_lesson_group">
                            <label for="formGroupExampleInput">Lesson Status</label>
                            <select name="status" id="" class="form-control" style="width: 470px">
                                <option value="1">Free</option>
                                <option value="2">Paid</option>
                            </select>
                        </div>
                        {{--<div class="form-group add_lesson_group">--}}
                            {{--<label for="formGroupExampleInput">Lesson Type</label>--}}
                            {{--<select name="lesson_type" id="lesson_type" class="form-control" style="width: 470px">--}}
                                {{--<option value="1">Text</option>--}}
                                {{--<option value="2">video</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        <div class="form-group add_lesson_group" >
                            <label for="lesson_video">lesson Video</label>
                            <input type="text" name="video_name" class="mdl-textfield__input" id="" placeholder="" style="width: 470px">

                        </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Lesson Text</label>
                            <textarea name="" id="lesson_text"></textarea>
                        </div>

                        <div class="form-group upload_progressbar" id="upload_progressbar">
                            <div class="progressbar">
                                <div class="procent">
                                    <span class="proc_span"></span>
                                </div>
                            </div>
                        </div>
                        <div class="container drop_upload_pic">
                            <div>
                                <label>Lesson Image</label>
                                <div class="drop_upload dz-clickable" id="drop">

                                    <div class="dz-message plus_jpg">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="button_save">
                        <button type="button" class="btn btn-primary save_lesson">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

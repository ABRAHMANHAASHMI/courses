@extends('admin/layouts.adminDashboard');
@section('content')

        <div class="show_error"></div>
        <input type="hidden" id="form_uniq" value="save_quiz_1">
        <div class="admin_main_content">
        <div class="question_main copy_div">

        </div>
        {{--    <div class="new_question"></div>
        <button type="button" class="btn btn-primary add_new_question">Add a new question</button>--}}
            <br>
            <br>
    </div>
      <!--  <div class="row">
            <div class="col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header> Add Quiz</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body no-padding height-9">
                        <form method="POST" class="quiz_form">
                            <input type="hidden" name="name" id="image_name" value="">
                            {{ csrf_field() }}
                            <div class="form-group" style="display: none;">
                                <label for="formGroupExampleInput">Quiz Type</label>
                                <select name="quiz_type" id="quiz_type" class="form-control">
                                    <option value="">Select quiz type</option>
                                    <option <?php if($type == 'lesson'){echo 'selected'; }?> value="1">For lesson</option>
                                    <option <?php if($type == 'exam'){echo 'selected'; }?> value="2">For training room</option>
                                </select>
                            </div>
                            <div class="form-group dis_none subject_main" <?php if($type == 'lesson'){echo 'style="display:none;"'; }?> >
                                <select name="" id="quiz_type" class="form-control ">
                                    <option value="">Select exam type</option>

                                    <?php
                                    if(!empty($example)){
                                    foreach ($example as $val){ ?>
                                    <option value="<?php echo $val['id']?>"><?php echo $val['name']?></option>
                                    <?php } } ?>

                                </select>
                                <label for="formGroupExampleInput">Exam</label>
                            </div>

                            <div class="form-group lesson_main" <?php if($type == 'exam'){echo 'style="display:none;"'; }?>>
                                <label for="formGroupExampleInput">Lesson</label>
                                <select name="lesson" id="" class="form-control">
                                    <option value="">Select Lesson</option>
                                    <?php
                                    if(!empty($lesson)){

                                    foreach ($lesson as $index => $val){ ?>
                                    <option value="<?php echo $val['id'];?>"><?php echo $val['name']; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" id="question_file" placeholder="">
                                <label for="question_file">Question
                                    <p class="lesson_video">UPLOAD</p>
                                </label>


                            </div>
                            <div class="form-group answer_multi">
                                <label for="formGroupExampleInput">Answer</label>
                                <input type="text" class="form-control"  placeholder="" name="answer[]">
                                <input type="radio" name="right_answer" value="1">
                            </div>
                            <div class="form-group answer_multi">
                                <label for="formGroupExampleInput">Answer</label>
                                <input type="text" class="form-control"  placeholder="" name="answer[]">
                                <input type="radio" name="right_answer" value="2">
                            </div>
                            <div class="form-group answer_multi">
                                <label for="formGroupExampleInput">Answer</label>
                                <input type="text" class="form-control"  placeholder="" name="answer[]">
                                <input type="radio" name="right_answer" value="3">
                            </div>
                            <div class="form-group answer_multi">
                                <label for="formGroupExampleInput">Answer</label>
                                <input type="text" class="form-control" placeholder="" name="answer[]">
                                <input type="radio" name="right_answer" value="4">
                            </div>
                            {{-- <div class="append_answer_main">
                             <span class="plus">+</span>
                             </div>--}}
                            <button type="button"  class="btn btn-primary save_quiz">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
         <div class="add_quize_page">
             <h2>QUIZE</h2>
         </div>
    <div class="quize_area">
        <div class="left_quiz_box">
            <div class="form-group add_lesson_group">
                <label for="formGroupExampleInput">select sub-subject</label>
                <select name="subject_type_id" id="" class="form-control">
                    <option value="1">القسم1</option>
                    <option value="5">القسم2</option>
                    <option value="4">القسم3</option>


                </select>
            </div>
        </div>
        <div class="right_quize_box">
            <div class="form-group add_lesson_group">
                <label for="formGroupExampleInput">select lesson</label>
                <select name="subject_type_id" id="" class="form-control">
                    <option value="1">lesson1</option>
                    <option value="5">lesson2</option>
                    <option value="4">lesson3</option>
                </select>
            </div>
        </div>
    </div>
    <div class="upload_image_quize">
            <label for="profile_label" class="profile_input"><img src="../../../img/Component 17 – 2.png" class="arrow_green">ارفع صورة الإيصال</label>
            <input type="file" id="profile_label" style="display: none">
        <label for="profile_label" class="profile_input"><img src="../../../img/Component 17 – 2.png" class="arrow_green">ارفع صورة الجواب</label>
        <input type="file" id="profile_label" style="display: none">
    </div>
        <div class="radio_area">
        <div class="radio_choice">
        <label class="container_radio">الخيار الاول
            <input type="radio" checked="checked" name="radio">
            <span class="checkmark_choice"></span>
        </label>
        </div>
        <div class="radio_choice">
        <label class="container_radio">الخيار الثاني
            <input type="radio" name="radio">
            <span class="checkmark_choice"></span>
        </label>
        </div>
        <div class="radio_choice">
        <label class="container_radio">الخيار الثالث
            <input type="radio" name="radio">
            <span class="checkmark_choice"></span>
        </label>
        </div>
        <div class="radio_choice">
        <label class="container_radio">الخيار الرابع
            <input type="radio" name="radio">
            <span class="checkmark_choice"></span>
        </label>
        </div>
        </div>
        <div class="button_save_quize">
            <button type="button" class="btn btn-primary save_lesson">Save</button>
        </div>
@endsection

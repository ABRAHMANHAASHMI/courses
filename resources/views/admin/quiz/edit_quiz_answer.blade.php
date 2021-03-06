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
                <form action="" id="save_edit_quiz_form" method="post">

                    @if(!empty($quiz))
                        <div class="form-group" id="lesson_video_upload">
                            <label for="quiz_file">Name

                                <p class="quiz_file lesson_video">UPLOAD</p>
                            </label>
                            <input type="file" class="form-control" id="quiz_file" data-id="{{$quiz['id']}}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Right Answer</label>
                            <select name="right_answer" id="" class="my_select_class">
                                <?php
                                if(!empty($quiz['answer'])){
                                foreach ($quiz['answer'] as $index => $val){
                                $k = ($val['id'] == $quiz['right_answer_id'])?'selected' : '';
                                ?>

                                <option {{$k}} value="<?php echo $val['id'];?>"><?php echo $val['answer']; ?> </option>
                                <?php } } ?>

                            </select>
                        </div>
                        <h2 class="text-center">Answer</h2>
                        @foreach($quiz['answer'] as $index => $value)
                            <div class="my-form-group">
                                <div class="col-md-12 value-info">
                                    <label for="">{{$value['answer']}}</label>
                                    <input type="text" name="answer[{{$value['id']}}]" value="{{$value['answer']}}">
                                </div>
                            </div>
                        @endforeach
                        <div class="my-form-group">
                            <div class="col-md-12 value-info">
                                <button type="button" class="save_edit_quiz btn btn-primary ">Save</button>
                            </div>
                        </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

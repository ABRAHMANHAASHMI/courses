@extends('layouts.dashboard')

@section('content')
    <main class="dashboard_main">
        <div class="toolbar">
            <div class="input-group mb-3">
                {{-- <div class="input-group-prepend">--}}
                {{--<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>--}}
                {{--</div>--}}
                {{--<input type="text" class="form-control" placeholder="Username" aria-label="Username"--}}
                {{--aria-describedby="basic-addon1">--}}
            </div>
            <div class="flex_cont_1">
                <div class="go_to">
                    <a href="{{url('training_room')}}" class="training_room">Go to training room <i
                                class="fas fa-long-arrow-alt-right"></i></a>
                </div>
                <div class="logout">
                    <ul>
                        <li>
                            <div class="user_image">
                                @if(!empty(Auth::user()->user_avatar))
                                    <img src="{{$url}}" class="img-circle" alt="Avatar">
                                @else
                                    <div class="user_image">
                                        <img id="photo-upload-preview" src="{{'img/no-profile-pic.png'}}">
                                    </div>
                                @endif
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="dropdown_link"> {{ Auth::user()->name }}<i class="fas fa-sort-down"></i>
                                </button>
                                <div class="dropdown_menu profile_dropdown" onmouseleave="close_drop()">
                                    <a class="dropdown_item"
                                       href="{{route('users.edit', $user_id = Auth::user()->id)}}">Profile</a>
                                    <a class="dropdown_item" href="{{url('change_plan')}}"> Go Premium</a>
                                    <a class="dropdown_item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </div>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="width_100">
                <span class="navbra_toggle">
                    <i class="fas fa-bars"></i>
                </span>
            </div>
        </div>
        <div class="admin__main">

{{--            <h2 class="default_text text-center">Welcome!</h2>--}}
            <?php

            if(!empty($subject_type)){
            foreach ($subject_type as $sub){ ?>

            <div id="{{$sub->name}}" class="tabcontent">
                <div class="row">
                    <div class="col-md-3" style="padding: unset">
                        <div class="lessons">
                            <h2 dir="rtl">{{$sub->name}}</h2>
                            <div class="number_of_lessons">
                                <p dir="rtl">{{--{{count($lesson)}} lessons--}}
                                    <span>
                                    <span data-id="{{$sub->id}}" data-asc="ASC" class="sort_less"><img
                                                src="{{'img/sorting.png'}}" alt=""></span>
                                        {{-- <span><img src="{{'img/tag.png'}}" alt=""></span>
                                         <span><img src="{{'img/more.png'}}" alt=""></span>--}}
                                </span>
                                </p>
                            </div>

                            <div class="lessons_sequence lessons_sequence_answer">
                                <?php

                                if(!empty($lesson)){
                                foreach ($lesson as $index => $value){
                                if ($value['subject_type_id'] != $sub->id) {
                                    continue;
                                }
                                ?>

                                <ul class="tablinks"
                                    onclick="opencourse(event, '{{$value['subject_type'][0]['name']}}', '{{$value['id']}}')">
                                    <li>
                                        <h3 dir="rtl">{{ $value['name']}}</h3>
                                        <p class="course_title">{{ $value['title']}}</p>
                                    </li>
                                </ul>

                                <?php } } ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-9" style="padding: unset">
                        <?php
                        if(!empty($lesson)){

                        foreach ($lesson as $index => $value){
                        if ($value['subject_type_id'] != $sub->id) {
                            continue;
                        }
                        ?>
                        <input type="hidden" id="less_id" value="{{$value['id']}}">
                        <div id="less_{{$value['id']}}" class="tabcontent">

                            <?php if ($value['status'] == 2 && Auth::user()->payment_charge == 1) {
                                echo '<div class="upgrade_accounts">
                                               <p>upgrade their accounts to premium</p>
                                               <div class="go_premium">
                                                    <button>
                                                        <a class="ch_go_pr" href="change_plan">Go Premium</a>
                                                    </button>
                                               </div>
                                            </div>
                                        </div>';
                                continue;
                            }?>


                            <div class="lesson_content audion_and_video_lessons">

                                <div class="lessons_body">
                                    <div class="video_overview">
                                        <ul role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active tablinks"
                                                   onmouseover="opencourse(event, '{{$value['subject_type'][0]['name']}}', '{{$value['id']}}',  'quiz')">
                                                      <span class="svg_icons">
                                                       <svg height="496pt" viewBox="-24 0 496 496" width="496pt"
                                                            xmlns="http://www.w3.org/2000/svg"><path
                                                                   d="m16 48h240v56c0 4.425781 3.574219 8 8 8h56v64h16v-72c0-2.214844-.902344-4.214844-2.351562-5.664062l-63.976563-63.976563c-1.457031-1.457031-3.457031-2.359375-5.671875-2.359375h-216v-16h304v176h16v-184c0-4.425781-3.574219-8-8-8h-320c-4.425781 0-8 3.574219-8 8v24h-24c-4.425781 0-8 3.574219-8 8v448c0 4.425781 3.574219 8 8 8h272v-16h-264zm256 11.3125 36.6875 36.6875h-36.6875zm0 0"/><path
                                                                   d="m440 240h-12.046875c-35.722656 0-69.320313-15.734375-92.183594-43.167969l-1.617187-1.945312c-3.03125-3.65625-9.265625-3.65625-12.296875 0l-1.617188 1.9375c-22.871093 27.441406-56.46875 43.175781-92.191406 43.175781h-12.046875c-4.425781 0-8 3.574219-8 8v129.566406c0 31.503906 16.992188 60.785156 44.34375 76.410156l71.6875 40.96875c1.226562.703126 2.601562 1.054688 3.96875 1.054688s2.742188-.351562 3.96875-1.054688l71.6875-40.96875c27.351562-15.625 44.34375-44.90625 44.34375-76.410156v-129.566406c0-4.425781-3.574219-8-8-8zm-8 137.566406c0 25.777344-13.894531 49.730469-36.28125 62.511719l-67.71875 38.714844-67.71875-38.703125c-22.386719-12.792969-36.28125-36.746094-36.28125-62.523438v-121.566406h4.046875c38.175781 0 74.226563-15.863281 99.953125-43.769531 25.71875 27.90625 61.777344 43.769531 99.953125 43.769531h4.046875zm0 0"/><path
                                                                   d="m328 264c-48.519531 0-88 39.480469-88 88s39.480469 88 88 88 88-39.480469 88-88-39.480469-88-88-88zm0 160c-39.703125 0-72-32.296875-72-72s32.296875-72 72-72 72 32.296875 72 72-32.296875 72-72 72zm0 0"/><path
                                                                   d="m324.183594 376.871094-14.527344-14.527344-11.3125 11.3125 24 24c1.511719 1.519531 3.558594 2.34375 5.65625 2.34375.648438 0 1.304688-.078125 1.953125-.238281 2.734375-.691407 4.894531-2.769531 5.710937-5.464844l24-80-15.328124-4.59375zm0 0"/><path
                                                                   d="m32 128h208v16h-208zm0 0"/><path
                                                                   d="m32 160h208v16h-208zm0 0"/><path
                                                                   d="m32 192h208v16h-208zm0 0"/><path
                                                                   d="m32 224h160v16h-160zm0 0"/><path
                                                                   d="m32 256h160v16h-160zm0 0"/><path
                                                                   d="m32 288h160v16h-160zm0 0"/><path
                                                                   d="m32 384h160v16h-160zm0 0"/><path
                                                                   d="m32 416h160v16h-160zm0 0"/><path
                                                                   d="m32 448h160v16h-160zm0 0"/><path
                                                                   d="m40 64h16v16h-16zm0 0"/><path
                                                                   d="m72 64h16v16h-16zm0 0"/><path
                                                                   d="m104 64h16v16h-16zm0 0"/><path
                                                                   d="m136 64h104v16h-104zm0 0"/></svg>
                                                   </span>
                                                    Quiz
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active tablinks"
                                                   onmouseover="opencourse(event, '{{ $value['subject_type'][0]['name']}}', '{{$value['id']}}', 'video')">
                                                   <span class="svg_icons">
                                                       <!DOCTYPE PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
     y="0px"
     width="511.626px" height="511.627px" viewBox="0 0 511.626 511.627"
     style="enable-background:new 0 0 511.626 511.627;"
     xml:space="preserve">
<g>
	<path d="M511.339,212.987c-0.186-10.277-1-23.271-2.423-38.97c-1.431-15.708-3.478-29.746-6.14-42.115
		c-3.046-13.893-9.661-25.6-19.842-35.117c-10.181-9.519-22.031-15.037-35.549-16.562c-42.258-4.755-106.115-7.135-191.573-7.135
		c-85.459,0-149.317,2.38-191.572,7.135c-13.516,1.524-25.319,7.043-35.404,16.562c-10.089,9.514-16.656,21.221-19.702,35.117
		c-2.852,12.373-4.996,26.41-6.423,42.115c-1.425,15.699-2.235,28.688-2.424,38.97C0.094,223.265,0,237.539,0,255.813
		c0,18.272,0.094,32.55,0.288,42.826c0.189,10.284,0.999,23.271,2.424,38.969c1.427,15.707,3.474,29.745,6.139,42.116
		c3.046,13.897,9.659,25.602,19.842,35.115c10.185,9.517,22.036,15.036,35.548,16.56c42.255,4.76,106.109,7.139,191.572,7.139
		c85.466,0,149.315-2.379,191.573-7.139c13.518-1.523,25.316-7.043,35.405-16.56c10.089-9.514,16.652-21.225,19.698-35.115
		c2.854-12.371,4.996-26.409,6.427-42.116c1.423-15.697,2.231-28.691,2.423-38.969c0.191-10.276,0.287-24.554,0.287-42.826
		C511.626,237.539,511.531,223.265,511.339,212.987z M356.883,271.231L210.706,362.59c-2.666,1.903-5.905,2.854-9.71,2.854
		c-2.853,0-5.803-0.764-8.848-2.286c-6.28-3.422-9.419-8.754-9.419-15.985V164.454c0-7.229,3.14-12.561,9.419-15.986
		c6.473-3.431,12.657-3.239,18.558,0.571l146.178,91.36c5.708,3.23,8.562,8.372,8.562,15.415
		C365.446,262.854,362.591,267.998,356.883,271.231z"/>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>
</span>Video</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active tablinks"
                                                   onmouseover="opencourse(event, '{{ $value['subject_type'][0]['name']}}', '{{$value['id']}}', 'overview' )">
                                                 <span class="svg_icons"><svg version="1.1" id="Capa_1"
                                                                              xmlns="http://www.w3.org/2000/svg"
                                                                              xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                              x="0px"
                                                                              y="0px"
                                                                              viewBox="0 0 60 60"
                                                                              style="enable-background:new 0 0 60 60;"
                                                                              xml:space="preserve">
<g>
	<path d="M42.5,22h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,22,42.5,22z"/>
	<path d="M17.5,16h10c0.552,0,1-0.447,1-1s-0.448-1-1-1h-10c-0.552,0-1,0.447-1,1S16.948,16,17.5,16z"/>
	<path d="M42.5,30h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,30,42.5,30z"/>
	<path d="M42.5,38h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,38,42.5,38z"/>
	<path d="M42.5,46h-25c-0.552,0-1,0.447-1,1s0.448,1,1,1h25c0.552,0,1-0.447,1-1S43.052,46,42.5,46z"/>
	<path d="M38.914,0H6.5v60h47V14.586L38.914,0z M39.5,3.414L50.086,14H39.5V3.414z M8.5,58V2h29v14h14v42H8.5z"/>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg></span>
                                                    Text</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="content_wrapper">
                                        <div class="lessons_header">
                                            <h2 dir="rtl">{{ $value['title']}}</h2>
                                            <h1 dir="rtl">{{ $value['name']}}</h1>
                                        </div>
                                        <div class="tabcontent" id="overview">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    @foreach($value['lesson_img'] as $img_val)

                                                        <img src="{{ asset('images/'.$img_val['image_name'])}}" alt="">
                                                    @endforeach
                                                    <?php
                                                    echo $value['lesson_text'];
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabcontent" id="video">
                                            <div class="video_curses">
                                                @if($value['type'] == 1 && $value['lesson_video'])
                                                    <iframe width="420" height="315"
                                                            src="{{str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/',$value['lesson_video'])}}">
                                                    </iframe>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tabcontent" id="quiz">
                                            <div class="accordion" id="accordionExample">
                                                <div class="answer_info" id="answer_info"></div>
                                                <?php
                                                if(!empty($quiz)){
                                                foreach ($quiz as $quiz_index => $quiz_val){
                                                if($quiz_val->lesson_id == $value['id']){ ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>
                                                            <button class="btn btn-link collapsed"><img
                                                                        src="{{ asset('quiz_images/'.$quiz_val->quiz_name)}}"
                                                                        alt=""></button>
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php
                                                        if(!empty($answer)){
                                                        $answer_key = 1;
                                                        foreach ($answer as $answer_index => $answer_value){
                                                        if($answer_value->quiz_id == $quiz_val->id){ ?>
                                                        <div class="col-md-6">
                                                            <label class="container_radio">{{($answer_key++).' ) '.$answer_value->answer}}
                                                                <input style="display: inline;" class="check_result_radio" type="radio" name="result_{{$quiz_index+1}}" value="{{$quiz_val->id.'->'.$answer_value->id}}">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                        <?php }  } }
                                                        ?>
                                                        <br class="clear">
                                                    </div>
                                                    <br class="clear">
                                                </div>
                                                <br class="clear">
                                                <?php } }
                                                $bool = true;
                                                foreach ($quiz as $quiz_index => $quiz_val){
                                                if($quiz_val->lesson_id == $value['id']){
                                                ?>
                                                <button type="button" class="btn btn-success  check_result">See the
                                                    results
                                                </button>
                                                <?php break; } } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </main>
@endsection
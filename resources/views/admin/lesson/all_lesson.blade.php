@extends('admin/layouts.adminDashboard')

@section('content')
<?php
    $lesson_type = [
        '0' => '',
        '1' => 'Text',
        '2' => 'Video',
    ];

    $status = [
        '0' => '',
        '1' => 'Free',
        '2' => 'Premium',
    ];
?>
    <div class="content well_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-box">

                    <div class="card-body no-padding height-9">
                        <div class="buttons">
                            <div class="my-form-group">
                                <button type="button" class="edit_lesson btn btn-primary ">Edit</button>
                                <button type="button" class="delete_lesson btn btn-primary ">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>All Lesson</header>
                    </div>
                    <div class="card-body ">
                        <table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                            <thead>
                            <tr>
                                <th class="order-number"><small>Edit/Delete</small></th>
                                <th class="order-number"><small>Name</small></th>
                                <th class="order-number"><small>Title</small></th>
                                <th class="order-number"><small>Lesson Text</small></th>
                                <th class="order-number"><small>Subject Type</small></th>
                                <th class="order-number"><small>Lesson Type</small></th>
                                <th class="order-number"><small>Status</small></th>
                                <th class=""><small>#</small></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($all_lesson)){
                            foreach ($all_lesson as $index => $single){ ?>
                            <tr>
                                <td><label><input type="checkbox" class="edit_delete_lesson" value="<?php echo $single['id']; ?>">
                                        <span class="checkmark"></span></label></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $single['name']; ?></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $single['title']; ?></td>
                                <td class="mdl-data-table__cell--non-numeric"><button type="button" class="show_lesson" data-attr="{{$single['id']}}" >Show text</button> <div style="display:none;" id="lesson_text_{{$single['id']}}"  class="lesson_text_p"><?php echo $single['lesson_text']; ?></div></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo (!empty( $single['subject_type']))? $single['subject_type'][0]['name']:''; ?></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $lesson_type[$single['type']]; ?></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $status[$single['status']]; ?></td>
                                <td><?php echo $index+1; ?></td>
                            </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_lesson_modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="message"></div>
                <div class="modal-body edit_lesson_answer">
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="show_lesson" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body show_lesson_text_answer">
            </div>
        </div>
    </div>
</div>

@endsection

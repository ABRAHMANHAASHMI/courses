@extends('admin/layouts.adminDashboard')

@section('content')
    <div class="content well_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-box">

                    <div class="card-body no-padding height-9">
                        <div class="buttons">
                            <div class="my-form-group">
                                <button type="button" class="edit_subject_type btn btn-primary ">Edit</button>
                                <button type="button" class="delete_subject_type btn btn-primary ">Delete</button>
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
                        <header>All Subject</header>
                    </div>
                    <div class="card-body ">
                        <table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                            <thead>
                            <tr>
                                <th class="order-number"><small>Edit/Delete</small></th>
                                <th class="order-number"><small>Name</small></th>
                                <th class=""><small>#</small></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($subject_type)){

                            foreach ($subject_type as $index => $single){ ?>
                            <tr>
                                <td><label><input type="checkbox" class="edit_delete_subject_type" value="<?php echo $single->id; ?>">
                                        <span class="checkmark"></span></label></td>
                                <td><?php echo $single->name; ?></td>
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

    <div class="modal fade" id="edit_subject_type_modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="message"></div>
                <div class="modal-body edit_subjects_answer">
                </div>
            </div>
        </div>
    </div>
@endsection

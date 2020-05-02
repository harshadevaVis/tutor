@extends('layouts.main')
@section('customLinks')
<style>


</style>
@endsection

@section('pageSpecificContent')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5 mb-2">

                <div class="row mb-3">
                    <div class="card m-b-20 col-md-12">
                        <div class="card-body ">
                            <!-- Courses Main Content -->
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                         <h4>Add new category</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <input id="category" class="form-control mapControls" type="text" placeholder="Enter category name">
                                                <span class="text-danger" id="cat_cat_error"></span>

                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group" style="margin-top: -4px;">
                                                <button onclick="saveCategory(this)" class="btn btn-success">Add category</button>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card m-b-20 col-md-12">
                        <div class="card-body">
                            <!-- Courses Main Content -->
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <h4>Add new Subject</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input id="subject-sub" class="form-control mapControls" type="text" placeholder="Enter subject name">
                                        <span class="text-danger" id="sub_sub_error"></span>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group" style="margin-top: -4px;">
                                        <button onclick="saveSubject(this)" class="btn btn-success">Add subject</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="card m-b-20 col-md-12">
                        <div class="card-body">
                            <!-- Courses Main Content -->
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <h4>Map Category-Subjects</h4>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control"  id="map_cat">
                                        </select>
                                        <span class="text-danger" id="map_cat_error"></span>
                                    </div>
                                </div>

                                <div class="col-lg-4 ">
                                    <div class="form-group">
                                        <select class="select2  form-control select2-multiple" multiple="multiple" id="map_subjects" multiple data-placeholder="Choose subjects..." >
                                        </select>
                                        <span class="text-danger" id="map_subjects_error"></span>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group" style="margin-top: -4px;">
                                        <button onclick="saveMapping(this)" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
@section('customScript')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        loadCatAndSub();
    });
    function loadCatAndSub() {
        $.ajax({
            type: 'POST',
            url: "{{ route('loadCatAndSub') }}",
            success: function (data) {
                $('#map_cat').html(data.cat);
                $('#map_subjects').html(data.sub);
            }

        });
    }

    function saveCategory(el) {
        $(el).attr('disabled',true);
        $('#cat_cat_error').html('');
//        $('#cat_subjects_error').html('');


        let cat = $('#category').val();
//        let subjects = $('#subjects').val();
        $.ajax({
            type: 'POST',
            data: {cat:cat},
            url: "{{ route('saveCategory') }}",
            success: function (data) {
                $(el).attr('disabled',false);

                if(data.errors != null){
                    if(data.errors['cat'] != null) {
                        $('#cat_cat_error').html(data.errors['cat']);
                    }
                    if(data.errors['exist'] != null) {
                        $('#cat_cat_error').html(data.errors['exist']);
                    }

                }
                else if(data.success != null){
                Swal.fire({
                    title: "Saved!",
                    text: "New category saved successfully!",
                    icon: "success",
                    button: "OK",
                });
                $('#category').val('');
                loadCatAndSub();

                }
            else{
                    $('#cat_cat_error').html("Something went wrong.Please contact system administrator.");

                }
            }

        });
    }

    function saveSubject(el) {
        $(el).attr('disabled',true);
        $('#sub_sub_error').html('');

        let subject = $('#subject-sub').val();
        $.ajax({
            type: 'POST',
            data: {subject:subject},
            url: "{{ route('saveSubject') }}",
            success: function (data) {
                $(el).attr('disabled',false);

                if(data.errors != null){
                    $('#sub_sub_error').html(data.errors['subject']);
                    $('#sub_sub_error').html(data.errors['exist']);
                }
                else if(data.success != null){
                    Swal.fire({
                        title: "Saved!",
                        text: "New subject saved successfully!",
                        icon: "success",
                        button: "OK",
                    });
                    $('#subject-sub').val('');
                    loadCatAndSub();
                }
                else{
                    $('#sub_sub_error').html("Something went wrong.Please contact system administrator.");

                }

            }
        });
    }

    function saveMapping(el) {
        $(el).attr('disabled',true);
        $('#map_subjects_error').html('');
        $('#map_cat_error').html('');

        let subjects = $('#map_subjects').val();
        let cat = $('#map_cat').val();
        $.ajax({
            type: 'POST',
            data: {subjects:subjects,cat:cat},
            url: "{{ route('saveMapping') }}",
            success: function (data) {
                $(el).attr('disabled',false);

                if(data.errors != null){
                    $('#map_cat_error').html(data.errors['cat']);
                    $('#map_subjects_error').html(data.errors['error']);
                }
                else if(data.success != null){
                    $('#map_cat').val('');
                    $('#map_subjects').val('');
                    Swal.fire({
                        title: "Saved!",
                        text: "Subject mapped with category successfully!",
                        icon: "success",
                        button: "OK",
                    });
                    $('#map_cat').val('').trigger('change');
                    $('#map_subjects').val('').trigger('change');
                }
                else{
                    $('#map_subjects_error').html("Something went wrong.Please contact system administrator.");

                }

            }
        });
    }
</script>
@endsection

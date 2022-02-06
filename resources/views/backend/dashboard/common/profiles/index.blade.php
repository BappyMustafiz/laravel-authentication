@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.common.profiles.partials.title')
@endsection
@section('styles')
    <style>
        .btn-sm-custom{
            padding: 5px 5px;
            line-height: 16px;
            font-size: 16px;
        }
        .btn-sm-custom i {
            margin-right: 0px !important;
        }
        .social-widget-card-custom{
            cursor: pointer;
        }
        .create_images {
            display: block;
        }
        .create_images_inner {
            display: inline-block;
        }
        .block__list_tags {
            text-align: left;
        }
        .width_full {
            width: 100% !important;
        }
        .block__list_tags li {
            display: inline-block;
            width: 9%;
            vertical-align: top;
            position: relative;
        }
        .image-item {
            margin-right: 10px;
        }
        .image-item .img-thumbnail {
            cursor: pointer;
        }
        .block__list_tags li img {
            width: 100%;
        }
        .block__list_tags li span {
            display: none;
            position: absolute;
            top: -7px;
            right: -7px;
            width: 25px;
            height: 25px;
            padding: 5px;
            background: #ff0000bf;
            border-radius: 50%;
            cursor: pointer;
            z-index: 101;
            text-align: center;
            color: #fff;
            font-size: 11px;
        }
        .block__list_tags li:hover span {
            display: block;
        }
    </style>
@endsection
@section('admin-content')
    @include('backend.dashboard.common.profiles.partials.header-breadcrumbs')
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12">
                <!-- tab header start -->
                <div class="tab-header">
                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#userPassword" role="tab">Password</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#userProfile" role="tab">Profile Image</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                </div>
                <!-- tab header end -->
                <!-- tab content start -->
                <div class="tab-content">
                    <!-- tab panel personal start -->
                    <div class="tab-pane active" id="personal" role="tabpanel">
                        <!-- personal card start -->
                        @include('backend.layouts.partials.messages')
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">About Me</h5>
                            </div>
                            <div class="card-block">
                                <form action="{{ route('update_admin_details') }}" method="POST" data-parsley-validate data-parsley-focus="first">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="first_name">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $userData->first_name }}" placeholder="Enter First Name" required=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="last_name">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $userData->last_name }}" placeholder="Enter Last Name" required=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $userData->email }}" placeholder="Enter Email" required=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $userData->phone }}" placeholder="Enter Phone" required=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="address">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="address" name="address" value="{{ $userData->address }}" placeholder="Enter Address" required=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="city">City <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="city" name="city" value="{{ $userData->city }}" placeholder="Enter City" required=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="country_id">Country <span class="text-danger">*</span></label>
                                                <select class="form-control" name="country_id" id="country_id">
                                                    <option>Country</option>
                                                    @if($countries)
                                                        @foreach($countries as $key => $country)
                                                            <option value="{{ $country->id }}" data-index="{{ $key }}" {{ $userData->country_id == $country->id ? 'selected' : '' }}>{{ $country->sortname }} - {{ $country->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="state_id">State <span class="text-danger">*</span></label>
                                                <select class="form-control" name="state_id" id="state_id">
                                                    <option>State</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="zipcode">Zip Code <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $userData->zipcode }}" placeholder="Enter Zipcode" required=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Update</button>
                                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="userPassword" role="tabpanel">
                        <!-- info card start -->
                        <div class="card">
                            <div class="card-block">
                                <form id="passwordForm" name="passwordForm" method="POST" data-parsley-validate data-parsley-focus="first">
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="old_password">Old Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password" required=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="password">New Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" required=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password" required=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success" id="updateBtn"> <i class="icofont icofont-check"></i> Update</button>
                                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="userProfile" role="tabpanel">
                        <!-- info card start -->
                        <div class="card">
                            <div class="card-block">
                                <form name="profileForm" method="POST" data-parsley-validate data-parsley-focus="first">
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="inputProfile">Profile</label>
                                                <div class="create_images">
                                                    <div class="create_images_inner">
                                                        <label class="btn btn-info" for="upload_image" id="btnUploadProfile"> <i class="icofont icofont-upload-alt"></i> Avatar</label>
                                                        <input type="file" class="d-none" id="inputProfile">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <ul id="image-container" class="block__list block__list_tags width_full ">
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success" id="updateProfile"> <i class="icofont icofont-check"></i> Update</button>
                                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <template id="imageTemplate">
            <li>
                <div class="image-item">
                    <div class="custom_list_img">
                        <img class="img-thumbnail img dog_image">
                    </div>
                    <a class="btnRemoveProfile"><span class="remove"> <i class="icofont icofont-trash"></i> </span></a>
                </div>
            </li>
        </template>
    </div>
@endsection
@section('scripts')
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let countries = <?php echo json_encode($countries); ?>;
        let userData = <?php echo json_encode($userData); ?>;
        let state_id = userData.state_id
        $('#country_id').change(function () {
            $('#state_id').html('<option value="">State</option>');
            let parent_id = $(this).val();
            if ($(this).val() != '' && $(this).val() != 'Country') {
                let index = $(this).find(':selected').data('index');
                let states = countries[index].states;
                $.each(states, function (index, value) {
                    if (value.id == state_id)
                        $('#state_id').append('<option value="' + value.id + '" selected>' + value.name + '</option>');
                    else
                        $('#state_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
        $('#country_id').trigger('change');
        //update password
        $('#updateBtn').click(function (e) {
            e.preventDefault();
            let formData = {
                old_password: $('#passwordForm input[name="old_password"').val(),
                password: $('#passwordForm input[name="password"').val(),
                password_confirmation: $('#passwordForm input[name="password_confirmation"').val(),
            };

            $.ajax({
                data: formData,
                url: "{{ route('update_admin_password') }}",
                type: "POST",
                dataType: 'json',
                success: function (response) {
                    if(response.success){
                       toastr.success(response.message); 
                    }else{
                        toastr.error(response.message); 
                    }
                    
                },
                error: function (error) {
                    $.each(error.responseJSON.errors, function(index, value){
                        toastr.error(value);
                    })
                }
            });
        });
        
        //update profile picture
        let existImage = <?php echo json_encode($userData->avatar); ?>;
        var profileImage = [];

        if(existImage){
            var html = $('#imageTemplate').html();
            var item = $(html);
            item.find('.img').attr('src', existImage);
            item.find('.btnRemoveProfile').data('imageurl', existImage);
            let newImage = {};
            newImage.image = existImage;
            profileImage.push(newImage)
            $('#image-container').append(item);
        }

        
        
        $('#btnUploadProfile').click(function (e) {
            e.preventDefault();

            $('#inputProfile').click();
        });
        
        $('#inputProfile').change(function (e) {
            let files = e.target.files;
            var formData = new FormData;
            for (let index = 0; index < files.length; index++) {
                formData.append('images[]', files[index]);       
            }
            $.ajax({
                url: "{{ route('upload_admin_profile_media_temporary') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data:formData,
                success: function (response) {
                    if (response.success) {
                        response.urls.forEach(function (element) {
                            var html = $('#imageTemplate').html();
                            var item = $(html);
                            item.find('.img').attr('src', element);
                            item.find('.btnRemoveProfile').data('imageurl', element);
                            let newImage = {};
                            newImage.image = element;
                            profileImage.push(newImage)
                            $('#image-container').html(item);
                        })
                    } 
                },
                error: function (error) {
                    $.each(error.responseJSON.errors, function(index, value){
                        toastr.error(value);
                    })
                }
            });
        });

        $('body').on('click', '.btnRemoveProfile', function () {
            var imageUrl = $(this).data('imageurl');
            var formData = new FormData;
            let fromStorage = true;
            formData.append('image', imageUrl); 
            formData.append('fromStorage', fromStorage);
            let that = this;
            $.ajax({
                url: "{{ route('remove_admin_profile_media_temporary') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data:formData,
                success: function (response) {
                    const index = profileImage.findIndex((element) => element.image == imageUrl);
                    if (index > -1) {
                        profileImage.splice(index, 1);
                    }
                    profileImage = [];
                    $(that).closest('li').remove();
                },
                error: function (error) {
                    $.each(error.responseJSON.errors, function(index, value){
                        toastr.error(value);
                    })
                }
            });
        });

        $('#updateProfile').on('click', function(e){
            e.preventDefault();
            var formData = new FormData;
            formData.append('profileImage', JSON.stringify(profileImage)); 

            $.ajax({
                url: "{{ route('admin_profile_media_upload') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data:formData,
                success: function (response) {
                    toastr.success(response.message);
                },
                error: function (error) {
                    $.each(error.responseJSON.errors, function(index, value){
                        toastr.error(value);
                    })
                }
            });
        });
        
    });
</script>
@endsection
@extends('frontend.layouts.master')
@section('styles')
    <style>
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
            width: 50%;
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
@section('main-content')
<section class="my_setting_top common_margin">
    <div class="container custom_container">
        <div class="row">
            <div class="col-12">
                <div class="product_wrap_title mt_20">
                    <h2><span>My Dashboard</span></h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my_setting_area">
        <div class="container custom_container">
            <div class="row product_custom_margin">
                <div class="col-12">
                    <div class="order_history_filter">
                        <div class="row">
                            <div class="col-md-2 ">
                                <div class="left_cat d_none">
                                    <ul>
                                        <li @if(request()->routeIs('customer-dashboard')) class="active" @endif>
                                            <a href="{{ route('customer-dashboard') }}">Profile Setting</a>
                                        </li>
                                        <li @if(request()->routeIs('queries.index') || request()->routeIs('queries.create') || request()->routeIs('queries.edit')) class="active" @endif>
                                            <a href="{{ route('queries.index') }}">Query</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <!-- <b>6 Orders </b> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 m_none">
                    <div class="left_cat">
                        <ul>
                            <li @if(request()->routeIs('customer-dashboard')) class="active" @endif>
                                <a href="{{ route('customer-dashboard') }}">Profile Setting</a>
                            </li>
                            <li @if(request()->routeIs('queries.index') || request()->routeIs('queries.create') || request()->routeIs('queries.edit')) class="active" @endif>
                                <a href="{{ route('queries.index') }}">Query</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="my_setting_wrap">
                        <h2>PROFILE INFO</h2>
                        <form action="{{ route('update_user_details') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 @error('first_name') has_error @enderror">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $user->first_name }}">
                                    @error('first_name')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 @error('last_name') has_error @enderror">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}">
                                    @error('last_name')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 @error('email') has_error @enderror">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}">
                                    @error('email')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 @error('phone') has_error @enderror">
                                    <label>Phone</label>
                                    <input id="phone" name="phone" type="text" class="form-control" placeholder="Phone" value="{{ $user->phone }}">
                                    @error('phone')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 @error('address') has_error @enderror">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $user->address }}">
                                    @error('address')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 @error('city') has_error @enderror">
                                    <label>City</label>
                                    <input type="text" class="form-control" placeholder="City" name="city" value="{{ $user->city }}">
                                    @error('city')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 @error('country_id') has_error @enderror">
                                    <label>Country</label>
                                    <select class="form-control" name="country_id" id="country_id">
                                        <option>Country</option>
                                        @if($countries)
                                            @foreach($countries as $key => $country)
                                                <option value="{{ $country->id }}" data-index="{{ $key }}" {{ $user->country_id == $country->id ? 'selected' : '' }}>{{ $country->sortname }} - {{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('country_id')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 @error('state_id') has_error @enderror">
                                    <label>State</label>
                                    <select class="form-control" name="state_id" id="state_id">
                                        <option>State</option>
                                    </select>
                                    @error('state_id')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 @error('zipcode') has_error @enderror">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" placeholder="Zip Code" name="zipcode" value="{{ $user->zipcode }}">
                                    @error('zipcode')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn_common" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                        <h2>PASSWORD</h2>
                        <form id="passwordForm" name="passwordForm" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-4 @error('old_password') has_error @enderror">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" placeholder="Old Password" name="old_password" id="old_password">
                                    @error('old_password')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 @error('password') has_error @enderror">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" placeholder="New Password" name="password" id="password">
                                    @error('password')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 @error('password_confirmation') has_error @enderror">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
                                    @error('password_confirmation')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn_common" type="submit" id="updateBtn">Update</button>
                                </div>
                            </div>
                        </form>
                        <h2>PROFILE IMAGE</h2>
                        <form name="profileForm" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="create_images">
                                        <div class="create_images_inner">
                                            <label class="btn btn-info" for="upload_image" id="btnUploadProfile"> 
                                                <i class="icofont icofont-upload-alt"></i> Avatar
                                            </label>
                                            <input type="file" class="d-none" id="inputProfile">
                                        </div>
                                    </div>
                                    <ul id="image-container" class="block__list block__list_tags width_full ">
                                                
                                    </ul>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <button class="btn_common" type="submit" id="updateProfile">Update</button>
                                </div>
                            </div>
                        </form>
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
                    <a class="btnRemoveProfile"><span class="remove"> <i class="fas fa-trash"></i> </span></a>
                </div>
            </li>
        </template>
    </div>
</section>
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
        let userData = <?php echo json_encode($user); ?>;
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
                url: "{{ route('update_password') }}",
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
        let existImage = userData.avatar
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
                url: "{{ route('upload_profile_media_temporary') }}",
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
                url: "{{ route('remove_profile_media_temporary') }}",
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
                url: "{{ route('profile_media_upload') }}",
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


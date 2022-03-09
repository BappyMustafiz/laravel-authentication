@extends('backend.layouts.master')
@section('title')
Settings | Admin Panel - 
{{ config('app.name') }}
@endsection
@section('styles')
@endsection
@section('admin-content')
    <div class="page-header">
        <div class="page-header-title">
            <h4>Settings</h4>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Settings</li>
            </ul>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <form name="profileForm" method="POST" data-parsley-validate data-parsley-focus="first">
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="inputProfile">Site Logo</label>
                                        <div class="create_images">
                                            <div class="create_images_inner">
                                                <label class="btn btn-info" for="upload_image" id="btnUploadProfile"> <i class="icofont icofont-upload-alt"></i> Logo</label>
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
        
        //update profile picture
        let existImage = <?php echo json_encode($settingData ? $settingData->site_logo : ''); ?>;
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
                url: "{{ route('upload_logo_media_temporary') }}",
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
                url: "{{ route('remove_logo_media_temporary') }}",
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
                url: "{{ route('logo_media_upload') }}",
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
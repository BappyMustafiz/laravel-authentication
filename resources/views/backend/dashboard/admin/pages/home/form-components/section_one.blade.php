<div class="card">
    <div class="card-header">
        <h5>Top Section</h5>
    </div>
    <div class="card-block">
        <form action="{{ route('home_page_post') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
            @csrf
            <input type="hidden" name="section_title" value="top_section">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="main_title">Main Tilte <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="main_title" name="main_title" value="{{ $top_section ? $top_section->main_title : old('main_title') }}" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="sub_title">Sub Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ $top_section ? $top_section->sub_title : old('sub_title') }}" required/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="section_image">Section Image <span class="text-danger">*</span> <span class="text-info">( Recommended Size: 642px X 374px )</span></label>
                        <input type="file" class="form-control dropify" data-height="150" id="section_image" name="section_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $top_section && $top_section->section_image != null ? asset('uploaded_files/images/pages/home_page/'.$top_section->section_image) : null }}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="section_video">Section Video </label>
                        <input type="file" class="form-control dropify" data-height="150" id="section_video" name="section_video" data-allowed-file-extensions="mp4 mov ogg qt mkv" 
                        data-default-file="{{ $top_section && $top_section->section_video != null ? asset('uploaded_files/videos/pages/home_page/'.$top_section->section_video) : null }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="avatar_one_title">Avatar one Title</label>
                        <input type="text" class="form-control" id="avatar_one_title" name="avatar_one_title" value="{{ $top_section ? $top_section->avatar_one_title : old('avatar_one_title') }}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="avatar_image_one">Avatar one Image <span class="text-info">( Recommended Size: 64px X 64px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="avatar_one_image" name="avatar_one_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $top_section && $top_section->avatar_one_image != null ? asset('uploaded_files/images/pages/home_page/'.$top_section->avatar_one_image) : null }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="avatar_two_title">Avatar Two Title</label>
                        <input type="text" class="form-control" id="avatar_two_title" name="avatar_two_title" value="{{ $top_section ? $top_section->avatar_two_title : old('avatar_two_title') }}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="avatar_two_image">Avatar Two Image <span class="text-info">( Recommended Size: 64px X 64px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="avatar_two_image" name="avatar_two_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $top_section && $top_section->avatar_two_image != null ? asset('uploaded_files/images/pages/home_page/'.$top_section->avatar_two_image) : null }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="avatar_three_title">Avatar Three Title </label>
                        <input type="text" class="form-control" id="avatar_three_title" name="avatar_three_title" value="{{ $top_section ? $top_section->avatar_three_title : old('avatar_three_title') }}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="avatar_three_image">Avatar Three Image <span class="text-info">( Recommended Size: 64px X 64px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="avatar_three_image" name="avatar_three_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $top_section && $top_section->avatar_three_image != null ? asset('uploaded_files/images/pages/home_page/'.$top_section->avatar_three_image) : null }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="decoration_one_image">Decoration One Image <span class="text-info">( Recommended Size: 183px X 183px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="decoration_one_image" name="decoration_one_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $top_section && $top_section->decoration_one_image != null ? asset('uploaded_files/images/pages/home_page/'.$top_section->decoration_one_image) : null }}"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="decoration_two_image">Decoration Two Image <span class="text-info">( Recommended Size: 183px X 183px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="decoration_two_image" name="decoration_two_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $top_section && $top_section->decoration_two_image != null ? asset('uploaded_files/images/pages/home_page/'.$top_section->decoration_two_image) : null }}"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="decoration_three_image">Decoration Three Image <span class="text-info">( Recommended Size: 183px X 183px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="decoration_three_image" name="decoration_three_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $top_section && $top_section->decoration_three_image != null ? asset('uploaded_files/images/pages/home_page/'.$top_section->decoration_three_image) : null }}"/>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="home_video_url">Video Url</label>
                        <input type="text" class="form-control" id="home_video_url" name="home_video_url" value="{{ $top_section ? $top_section->home_video_url : old('home_video_url') }}"/>
                    </div>
                </div>
            </div> --}}
            <div class="row ">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
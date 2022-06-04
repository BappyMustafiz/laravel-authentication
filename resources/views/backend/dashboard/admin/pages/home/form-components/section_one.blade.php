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
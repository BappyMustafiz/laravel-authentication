<div class="card">
    <div class="card-header">
        <h5>Section Two</h5>
    </div>
    <div class="card-block">
        <form action="{{ route('how_it_work_page_post') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
            @csrf
            <input type="hidden" name="section_title" value="section_two">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="main_title">Main Tilte 1<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="main_title" name="main_title" value="{{ $section_two ? $section_two->main_title : old('main_title') }}" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="content">Content 1<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="content" name="content" value="{{ $section_two ? $section_two->content : old('content') }}" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="section_image">Section Image 1<span class="text-info">( Recommended Size: 85px X 51px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="section_image" name="section_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $section_two && $section_two->section_image != null ? asset('uploaded_files/images/pages/how_it_work_page/'.$section_two->section_image) : null }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="main_title_2">Main Tilte 2<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="main_title_2" name="main_title_2" value="{{ $section_two ? $section_two->main_title_2 : old('main_title_2') }}" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="content_2">Content 2<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="content_2" name="content_2" value="{{ $section_two ? $section_two->content_2 : old('content_2') }}" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="section_image_2">Section Image 2 <span class="text-info">( Recommended Size: 85px X 51px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="section_image_2" name="section_image_2" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $section_two && $section_two->section_image_2 != null ? asset('uploaded_files/images/pages/how_it_work_page/'.$section_two->section_image_2) : null }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="main_title_3">Main Tilte 3<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="main_title_3" name="main_title_3" value="{{ $section_two ? $section_two->main_title_3 : old('main_title_3') }}" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="content_3">Content 3<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="content_3" name="content_3" value="{{ $section_two ? $section_two->content_3 : old('content_3') }}" required/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="section_image_3">Section Image 3 <span class="text-info">( Recommended Size: 85px X 51px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="section_image_3" name="section_image_3" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $section_two && $section_two->section_image_3 != null ? asset('uploaded_files/images/pages/how_it_work_page/'.$section_two->section_image_3) : null }}"/>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
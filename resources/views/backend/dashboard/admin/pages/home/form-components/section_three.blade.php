<div class="card">
    <div class="card-header">
        <h5>Section Three</h5>
    </div>
    <div class="card-block">
        <form action="{{ route('home_page_post') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
            @csrf
            <input type="hidden" name="section_title" value="section_three">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="main_title">Main Tilte <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="main_title" name="main_title" value="{{ $section_three ? $section_three->main_title : old('main_title') }}" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="sub_title">Sub Title <span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control" id="sub_title" name="sub_title" required >{{ $section_three ? $section_three->sub_title : old('sub_title') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="section_image">Section Image <span class="text-danger">*</span> <span class="text-info">( Recommended Size: 600px X 304px )</span></label>
                        <input type="file" class="form-control dropify" data-height="150" id="section_image" name="section_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $section_three && $section_three->section_image != null ? asset('uploaded_files/images/pages/home_page/'.$section_three->section_image) : null }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="decoration_one_image">Decoration One Image <span class="text-info">( Recommended Size: 183px X 183px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="decoration_one_image" name="decoration_one_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $section_three && $section_three->decoration_one_image != null ? asset('uploaded_files/images/pages/home_page/'.$section_three->decoration_one_image) : null }}"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="decoration_two_image">Decoration Two Image <span class="text-info">( Recommended Size: 183px X 183px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="decoration_two_image" name="decoration_two_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $section_three && $section_three->decoration_two_image != null ? asset('uploaded_files/images/pages/home_page/'.$section_three->decoration_two_image) : null }}"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="decoration_three_image">Decoration Three Image <span class="text-info">( Recommended Size: 183px X 183px )</span></label>
                        <input type="file" class="form-control dropify" data-height="64" id="decoration_three_image" name="decoration_three_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $section_three && $section_three->decoration_three_image != null ? asset('uploaded_files/images/pages/home_page/'.$section_three->decoration_three_image) : null }}"/>
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
<div class="card">
    <div class="card-header">
        <h5>Bottom Section</h5>
    </div>
    <div class="card-block">
        <form action="{{ route('how_it_work_page_post') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
            @csrf
            <input type="hidden" name="section_title" value="bottom_section">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="main_title">Main Tilte <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="main_title" name="main_title" value="{{ $bottom_section ? $bottom_section->main_title : old('main_title') }}" required/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="section_image">Section Image <span class="text-danger">*</span><span class="text-info">( Recommended Size: 883px X 368px )</span></label>
                        <input type="file" class="form-control dropify" data-height="150" id="section_image" name="section_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $bottom_section && $bottom_section->section_image != null ? asset('uploaded_files/images/pages/how_it_work_page/'.$bottom_section->section_image) : null }}"/>
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
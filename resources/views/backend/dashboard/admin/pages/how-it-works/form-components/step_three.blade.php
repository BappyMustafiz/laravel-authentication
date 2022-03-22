<div class="card">
    <div class="card-header">
        <h5>Step Three</h5>
    </div>
    <div class="card-block">
        <form action="{{ route('how_it_work_page_post') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
            @csrf
            <input type="hidden" name="section_title" value="step_three">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="step_title">Step Tilte <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="step_title" name="step_title" value="{{ $step_three ? $step_three->step_title : old('step_title') }}" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="main_title">Main Tilte <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="main_title" name="main_title" value="{{ $step_three ? $step_three->main_title : old('main_title') }}" required/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="content">Content <span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control" rows="8" id="content" name="content" required >{{ $step_three ? $step_three->content : old('content') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="section_image">Section Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control dropify" data-height="150" id="section_image" name="section_image" data-allowed-file-extensions="png jpg jpeg webp svg" 
                        data-default-file="{{ $step_three && $step_three->section_image != null ? asset('uploaded_files/images/pages/how_it_work_page/'.$step_three->section_image) : null }}"/>
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
<div class="card">
    <div class="card-header">
        <h5>Brand Section</h5>
    </div>
    <div class="card-block">
        <form action="{{ route('home_page_post') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
            @csrf
            <input type="hidden" name="section_title" value="brand_section">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="main_title">Section Tilte <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="main_title" name="main_title" value="{{ $brand_section ? $brand_section->main_title : old('main_title') }}" required/>
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
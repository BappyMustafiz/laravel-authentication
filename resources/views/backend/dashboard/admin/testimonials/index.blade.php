@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.testimonials.partials.title')
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
    </style>
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.testimonials.partials.header-breadcrumbs')
    <div class="page-body">
        <div class="row">
            @include('backend.layouts.partials.messages')
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('testimonials.create') }}" class="btn btn-info"> <i class="icofont icofont-plus-circle"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap" id="testimonials_table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Testimonial Title</th>
                                        <th>User Name</th>
                                        <th>Designation</th>
                                        <th>Image</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('table#testimonials_table').DataTable({
            language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
            processing: true,
            serverSide: true,
            ajax: {url: "{{ route('testimonials.index') }}"},
            aLengthMenu: [[10, 20, 50, 100, 1000, -1], [10, 20, 50, 100, 1000, "All"]],
            buttons: [],
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'user_name', name: 'user_name'},
                {data: 'designation', name: 'designation'},
                {data: 'user_image', name: 'user_image'},
                {data: 'action', name: 'action'}
            ]
        });
    });
</script>
@endsection
@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.training_exams.partials.title')
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
    @include('backend.dashboard.admin.training_exams.partials.header-breadcrumbs')
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
                                <a href="{{ route('training-exams.create') }}" class="btn btn-info"> <i class="icofont icofont-plus-circle"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap" id="training_exams_table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Training</th>
                                        <th>Exam Title</th>
                                        <th>Time Limit</th>
                                        <th>Number of Question</th>
                                        <th>Marks per Question</th>
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
        $('table#training_exams_table').DataTable({
            language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
            processing: true,
            serverSide: true,
            ajax: {url: "{{ route('training-exams.index') }}"},
            aLengthMenu: [[10, 20, 50, 100, 1000, -1], [10, 20, 50, 100, 1000, "All"]],
            buttons: [],
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'training_id', name: 'training_id'},
                {data: 'test_title', name: 'test_title'},
                {data: 'time_limit', name: 'time_limit'},
                {data: 'number_of_question', name: 'number_of_question'},
                {data: 'marks_per_question', name: 'marks_per_question'},
                {data: 'action', name: 'action'}
            ]
        });
    });
</script>
@endsection
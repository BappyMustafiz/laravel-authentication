@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.users.partials.title')
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
        .active{
            background: rgba(0, 0, 0, .1);
            border-left: 2px solid #2ed8b6;
        }
    </style>
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.users.partials.header-breadcrumbs')
    <div class="page-body">
        <div class="row">
            @include('backend.dashboard.admin.users.partials.top-show')
            @include('backend.layouts.partials.messages')
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap" id="users_table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>First Name</th>
                                        <th>last Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
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
        $('table#users_table').DataTable({
            language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
            processing: true,
            serverSide: true,
            ajax: {url: "{{ route('users.index') }}"},
            aLengthMenu: [[10, 20, 50, 100, 1000, -1], [10, 20, 50, 100, 1000, "All"]],
            buttons: [],
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
                {data: 'email_verified_at', name: 'email_verified_at'},
                {data: 'action', name: 'action'}
            ]
        });
    });
</script>
@endsection
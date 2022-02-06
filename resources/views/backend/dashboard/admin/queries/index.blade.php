@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.queries.partials.title')
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.users.partials.header-breadcrumbs')
    <div class="page-body">
        <div class="row">
            @include('backend.layouts.partials.messages')
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap" id="queries_table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Submitted by</th>
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
        $('table#queries_table').DataTable({
            language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
            processing: true,
            serverSide: true,
            aLengthMenu: [[10, 20, 50, 100, 1000, -1], [10, 20, 50, 100, 1000, "All"]],
            buttons: [],
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'content', name: 'content'},
                {data: 'created_by', name: 'created_by'}
            ]
        });
    });
</script>
@endsection
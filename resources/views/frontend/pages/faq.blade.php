@extends('frontend.layouts.master')
@section('main-content')
    
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.close', function(){
                location.reload()
            });
            $(document).on('click', '.fade', function(){
                location.reload()
            });
        });
    </script>
@endsection
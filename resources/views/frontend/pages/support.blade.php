@extends('frontend.layouts.master')
@section('main-content')
    <section class="site-section">
        <div class="site-section__holder">
        <div class="site-section__container container">
            <div class="row justify-content-center pt-5 pt-md-5_5 pt-lg-5">
            <div class="col-xl-8">
                <h1>Support</h1>
                <p>If you have any problems or need assistance, please do not hesitate to get in touch with our friendly support team who will be happy to help you. You can reach them at <a href="mailto:support@overflow.io">support@overflow.io</a>. </p>
            </div>
            </div>
        </div>
        </div>
    </section>
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
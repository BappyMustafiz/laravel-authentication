@extends('frontend.layouts.master')
@section('styles')
    <style>
        .create_images {
            display: block;
        }
        .create_images_inner {
            display: inline-block;
        }
        .block__list_tags {
            text-align: left;
        }
        .width_full {
            width: 100% !important;
        }
        .block__list_tags li {
            display: inline-block;
            width: 50%;
            vertical-align: top;
            position: relative;
        }
        .image-item {
            margin-right: 10px;
        }
        .image-item .img-thumbnail {
            cursor: pointer;
        }
        .block__list_tags li img {
            width: 100%;
        }
        .block__list_tags li span {
            display: none;
            position: absolute;
            top: -7px;
            right: -7px;
            width: 25px;
            height: 25px;
            padding: 5px;
            background: #ff0000bf;
            border-radius: 50%;
            cursor: pointer;
            z-index: 101;
            text-align: center;
            color: #fff;
            font-size: 11px;
        }
        .block__list_tags li:hover span {
            display: block;
        }
    </style>
@endsection
@section('main-content')
<section class="my_setting_top common_margin">
    <div class="container custom_container">
        <div class="row">
            <div class="col-12">
                <div class="product_wrap_title mt_20">
                    <h2><span>My Dashboard</span></h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my_setting_area">
        <div class="container custom_container">
            <div class="row product_custom_margin">
                <div class="col-12">
                    <div class="order_history_filter">
                        <div class="row">
                            <div class="col-md-2 ">
                                <div class="left_cat d_none">
                                    <ul>
                                        <li  class="active">
                                            <a href="{{ route('customer-dashboard') }}">Profile Setting</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('queries.index') }}">Query</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <!-- <b>6 Orders </b> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 m_none">
                    <div class="left_cat">
                        <ul>
                            <li @if(request()->routeIs('customer-dashboard')) class="active" @endif>
                                <a href="{{ route('customer-dashboard') }}">Profile Setting</a>
                            </li>
                            <li  @if(request()->routeIs('queries.index')) class="active" @endif>
                                <a href="{{ route('queries.index') }}">Query</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="my_setting_wrap">
                        <h2>My Query</h2>
                        <div class="order_history_table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Date</th>
                                            <th>Total </th>
                                            <th>Status </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1234567890</td>
                                            <td>02/12/2021</td>
                                            <td>$1200.00</td>
                                            <td>Delivered</td>
                                            <td><button class="btn_transparent">View Order</button></td>
                                        </tr>
                                        <tr>
                                            <td>1234567890</td>
                                            <td>02/12/2021</td>
                                            <td>$1200.00</td>
                                            <td>Delivered</td>
                                            <td><button class="btn_transparent">View Order</button></td>
                                        </tr>
                                        <tr>
                                            <td>1234567890</td>
                                            <td>02/12/2021</td>
                                            <td>$1200.00</td>
                                            <td>Delivered</td>
                                            <td><button class="btn_transparent">View Order</button></td>
                                        </tr>
                                        <tr>
                                            <td>1234567890</td>
                                            <td>02/12/2021</td>
                                            <td>$1200.00</td>
                                            <td>Delivered</td>
                                            <td><button class="btn_transparent">View Order</button></td>
                                        </tr>
                                        <tr>
                                            <td>1234567890</td>
                                            <td>02/12/2021</td>
                                            <td>$1200.00</td>
                                            <td>Delivered</td>
                                            <td><button class="btn_transparent">View Order</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


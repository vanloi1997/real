@extends('frontend.master')
@section('title')
    <title>Trang Chủ</title>
@endsection
@section('content')
<!-- Slider -->
<div class="main__slice">
            <div class="slider">
                <div class="slide active" style="background-image:url({{asset('frontend/img/slider/slide-6.jpg')}})">
                    <div class="container">
                        <div class="caption">
                            <h1>Giảm giá 30%</h1>
                            <p>Giảm giá cực sốc trong tháng 6!</p>
                            <a href="listProduct.html" class="btn btn--default">Xem ngay</a>

                        </div>
                    </div>
                </div>
                <div class="slide active" style="background-image:url({{asset('frontend/img/slider/slide-4.jpg')}})">
                    <div class="container">
                        <div class="caption">
                            <h1>Giảm giá 30%</h1>
                            <p>Giảm giá cực sốc trong tháng 6!</p>
                            <a href="listProduct.html" class="btn btn--default">Xem ngay</a>

                        </div>
                    </div>
                </div>
                <div class="slide active" style="background-image:url({{asset('frontend/img/slider/slide-5.jpg')}})">
                    <div class="container">
                        <div class="caption">
                            <h1>Giảm giá 30%</h1>
                            <p>Giảm giá cực sốc trong tháng 6!</p>
                            <a href="listProduct.html" class="btn btn--default">Xem ngay</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- controls  -->
            <div class="controls">
                <div class="prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <!-- indicators -->
            <div class="indicator">
            </div>
        </div>
        <!--Product Category -->
        <div class="main__tabnine">
            <div class="grid wide">
                <!-- Tab items -->
                <div class="tabs">
                    <div class="tab-item active">
                        Sản Phẩm Mới
                    </div>
                    <div class="tab-item">
                        Sản Phẩm Đang Giảm Giá
                    </div>
                    <div class="line"></div>
                </div>
                <!-- Tab content -->
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col l-2 m-4 s-6">
                                <div class="product">
                                    <div class="product__avt" style="background-image: url(./assets/img/product/product1.jpg);">
                                    </div>
                                    <div class="product__info">
                                        <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                        <div class="product__price">
                                            <div class="price__old">
                                                300.000 đ
                                            </div>
                                            <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                        </div>
                                        <div class="product__sale">
                                            <span class="product__sale-percent">24%%</span>
                                            <span class="product__sale-text">Giảm</span>
                                        </div>
                                    </div>
                                    <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                    <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane">
                        <div class="row">
                            <div class="col l-2 m-4 s-6">
                                <div class="product">
                                    <div class="product__avt" style="background-image: url(./assets/img/product/product4.jpg);">
                                    </div>
                                    <div class="product__info">
                                        <h3 class="product__name">Kem dưỡng da NestPlae</h3>
                                        <div class="product__price">
                                            <div class="price__old">
                                                300.000 đ
                                            </div>
                                            <div class="price__new">200.000 <span class="price__unit">đ</span></div>
                                        </div>
                                        <div class="product__sale">
                                            <span class="product__sale-percent">24%%</span>
                                            <span class="product__sale-text">Giảm</span>
                                        </div>
                                    </div>
                                    <a href="product.html" class="viewDetail">Xem chi tiết</a>
                                    <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- HightLight  -->
        <div class="main__frame">
            <div class="grid wide">
                <h3 class="category__heading">SẢN PHẨM BÁN CHẠY</h3>
                <div class="owl-carousel hight owl-theme">
                    <div class="product">
                        <div class="product__avt" style="background-image: url(./assets/img/product/product1.jpg);">
                        </div>
                        <div class="product__info">
                            <h3 class="product__name">Son môi cao cấp</h3>
                            <div class="product__price">
                                <div class="price__old">
                                    100.000 đ
                                </div>
                                <div class="price__new"> 70.000<span class="price__unit">đ</span></div>
                            </div>
                            <div class="product__sale">
                                <span class="product__sale-percent">23</span>
                                <span class="product__sale-text">Giảm</span>
                            </div>
                        </div>
                        <a href="product.html" class="viewDetail">Xem chi tiết</a>
                        <a href="cart.html" class="addToCart">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script1')
    <link rel="stylesheet" href="{{asset('frontend/css/library.css')}}">
    <link href="{{asset('frontend/owlCarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
    <!-- Layout -->
    <link rel="stylesheet" href="{{asset('frontend/css/common.css')}}">
    <!-- index -->
    <link href="{{asset('frontend/css/home.css')}}" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl caroucel Js-->
    <script src="{{asset('frontend/owlCarousel/owl.carousel.min.js')}}"></script>
    <script>
        $('.owl-carousel.hight').owlCarousel({
            loop: false,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
        $('.owl-carousel.news').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        })
        $('.owl-carousel.bands').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        })
    </script>
@endsection
@section('script2')
<!-- Script common -->
<script src="{{asset('frontend/js/homeScript.js')}}"></script>
<script src="{{asset('frontend/js/commonscript.js')}}"></script>
@endsection
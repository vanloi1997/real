@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    @foreach($cate_name as $cate_names)
    <h2 class="title text-center">{{$cate_names->name}}</h2>
    @endforeach
    @foreach($cate_by_id as $cates)
    <a href="{{url('/chi-tiet-san-pham/'. $cates->id)}}">
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{asset('uploads/product/'.$cates->image)}}" height="230px"/>
                        <h2>{{number_format($cates->price).''.'VND'}}</h2>
                        <h4>{{$cates->name}}</h4>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                    </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
    </a>
    @endforeach
</div><!--features_items-->
@endsection
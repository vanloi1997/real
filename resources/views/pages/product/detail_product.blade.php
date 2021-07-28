@extends('layout')
@section('content')
                    @foreach($data as $pro)
                    <div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{url('/uploads/product/'.$pro->image)}}" alt="" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item">
										  <a href=""><img src="{{url('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{url('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{url('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{url('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{url('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{url('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										<div class="item active">
										  <a href=""><img src="{{url('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{url('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{url('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{$pro->name}}</h2>
								<p>Mã Sản Phẩm: {{$pro->id}}</p>
                                <form action="{{url('/save-cart/')}}" method= "post">
                                    {{ csrf_field() }}
								<span>
									<span>{{number_format($pro->price).''.'VND'}}</span>
									<label>Só lượng:</label>
									<input name="qty" type="number" value="1" min="1" />
                                    <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
									</button>
								</span>
                                </form>
								<p><b>Tình Trạng: </b> In Stock</p>
								<p><b>Điều Kiện: </b> New</p>
								<p><b>Thương Hiệu: </b>{{$pro->brand_name}}</p>
                                <p><b>Danh Mục: </b>{{$pro->category_name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
                    @endforeach
                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#desc" data-toggle="tab">Mô tả sản phẩm</a></li>
								<li><a href="#content" data-toggle="tab">Chi tiết sản phẩm</a></li>
								<li><a href="#reviews" data-toggle="tab">Đánh giá sản phẩm</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="desc" >
								<p>{{$pro->desc}}</p>
							</div>
							
							<div class="tab-pane fade" id="content" >
                                <p>{{$pro->content}}</p>
							</div>
							
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
                    <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản Phẩm Gợi Ý</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
                                    @foreach($related as $data)
                                    <a href="{{url('/chi-tiet-san-pham/'.$data->id)}}">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{url('uploads/product/'.$data->image)}}" height="255px"/>
													<h2>{{number_format($pro->price).''.'VND'}}</h2>
													<p>{{$data->name}}</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
                                    </a>
                                    @endforeach
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
@endsection
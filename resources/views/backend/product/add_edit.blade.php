@extends('backend.master')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            {{(request()->is('admin-page/product/add')?'Thêm':'Sửa')}} sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh mục</label>
                                    <select name="product_category" class="form-control input-sm m-bot15">
                                        @foreach($cate as $cates)
                                            <option value="{{$cates->id}}">{{$cates->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand as $brands)
                                            <option value="{{$brands->id}}">{{$brands->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía sản phẩm</label>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía ưu đãi</label>
                                    <input type="number" name="product_promotion" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5" name = "product_desc" class="form-control" id="exampleInputPassword1" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập Số Lượng</label>
                                    <input type="number" name="product_amount" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Trạng Thái</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <button type="submit"  class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection        
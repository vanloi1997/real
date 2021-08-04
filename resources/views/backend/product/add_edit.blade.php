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
                                    <input type="number" name="product_price" class="form-control"  placeholder="Nhập giá"  min="0" required step="1000">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía ưu đãi</label>
                                    <input type="number" name="product_promotion" class="form-control" placeholder="Nhập giá khuyến mãi(nếu có)" min="0" required step="1000">
                                </div>
                                @if($errors->has('product_promotion'))
                                    <div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('product_promotion') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5" name = "product_desc" class="form-control" id="exampleInputPassword1" ></textarea>
                                </div>
                                @if($errors->has('product_desc'))
                                    <div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('product_desc') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập Số Lượng</label>
                                    <input type="number" name="product_amount" class="form-control" min="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Trạng Thái</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="1" checked>Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <div class="alert-img alert1 alert-info text-center mt-1">Tải lên tối đa 4 ảnh 
				                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
                                    <input class="product_image" type="file" name="product_image[]" class="form-control" accept="image/png, image/jpeg, image/jpg" multiple {{(!isset($product->images)) ?'required':'' }}>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    @for($i=0;$i<=3;$i++)
                                    <div class="col-sm-2 mr-1">
                                        <img class="image{{$i}} card card-img-top" style="display: none;width: 150px;height: 150px;object-fit: cover;">
                                    </div>	
                                    @endfor
                                </div>	
                                <button type="submit"  class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection        
@section('js')
<script type="text/javascript">
	 /*product*/
        $('.product_image').change(function(){
            if(this.files.length>4){
                $('.alert-img').removeClass('alert-info').addClass('alert-danger');
                $(this).val('');
            }
            for ( var i = 0; i < this.files.length; i++) {
                $('.image'+i).css('display','block');
                $('.image'+i).attr('src',URL.createObjectURL(event.target.files[i]));
            }
            for( var i = 3;i>=this.files.length;i--){
                $('.image'+i).css('display','none');
            }   
        });
        /*textarea product*/
        CKEDITOR.replace("stringDescription");
</script>
@endsection
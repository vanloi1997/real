@extends('backend.master')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            {{(request()->is('admin-page/category/add')?'Thêm':'Sửa')}} danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                        
                            <div class="position-center">
                                <form role="form" action="" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="name_category" value="{{isset($category->name)?$category->name:''}}" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                @if($errors->has('name_category'))
                                    <div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('name_category') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                @endif
                                <button type="submit"  class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection        
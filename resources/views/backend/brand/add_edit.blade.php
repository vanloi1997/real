@extends('backend.master')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            {{(request()->is('admin-page/brand/add')?'Thêm':'Sửa')}} thương hiệu sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="name_brand" value="{{isset($category->name)?$category->name:''}}" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                                </div>
                                @if($errors->has('name_brand'))
                                    <div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('name_brand') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-info">Thêm</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
@endsection        
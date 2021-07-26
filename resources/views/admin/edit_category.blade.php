@extends('admin_layout')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sửa danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            @foreach($data as $cate)
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-success">'.$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                            <div class="position-center">
                                <form role="form" action="{{url('/update-category/'.$cate->id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$cate -> name}}" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" name = "category_desc"  type="password" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$cate -> desc}}</textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị</label>
                                    <select name="category_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div> -->
                                <button type="submit" name="update_category" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
@endsection        
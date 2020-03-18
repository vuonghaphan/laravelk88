@extends('admin.layouts.app',['title'=>'Add cate'])
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh mục</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý danh mục</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            @if ($errors->any())
                            @component('admin.layouts.components.alert')
                            @slot('type', 'danger')
                            @slot('stroke', 'cancel')
                            {{ $errors->first() }}
                            @endcomponent
                            @endif
                            <form action="/admin/category" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Danh mục cha:</label>
                                    <select class="form-control" name="" id="parent_id">
                                        <option>----ROOT----</option>
                                        <option>Nam</option>
                                        <option>---|Áo khoác nam</option>
                                        <option>---|---|Áo khoác nam</option>
                                        <option>Nữ</option>
                                        <option>---|Áo khoác nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên Danh mục</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Tên danh mục mới">
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col-->


    </div>
    <!--/.row-->
</div>
@endsection

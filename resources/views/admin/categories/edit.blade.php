@extends('admin.layouts.app',['title'=>'Edit cate'])
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Icons</li>
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
                            @slot('stroke', 'checkmark')
                            {{ $errors->first() }}
                            @endcomponent
                            @endif
                            <form action="/admin/category/{{ $category->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Danh mục cha:</label>
                                    <select class="form-control" name="parent_id" >
                                        <option value="0" selected>----ROOT----</option>
                                        @include('admin.categories.option', ['level' => 0])
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên Danh mục</label>
                                    <input type="text" class="form-control" name="name"  placeholder="Tên danh mục mới" value="{{$category->name}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Sửa danh mục</button>
                            </form>
                            {{-- @foreach ($category->products()->get() as $item)
                                {{ $item->name }}
                            @endforeach --}}
                            {{-- {{$category->products()->first()->name}} --}}
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

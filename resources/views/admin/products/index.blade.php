@extends('admin.layouts.app',['title'=>'Product'])
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">

                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div class="alert bg-success" role="alert">
                                <svg class="glyph stroked checkmark">
                                    <use xlink:href="#stroked-checkmark"></use>
                                </svg>Đã thêm thành công<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            <a href="/admin/products/create" class="btn btn-primary">Thêm sản phẩm</a>
                            <table class="table table-bordered" style="margin-top:20px;">

                                <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th>Thông tin sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Tình trạng</th>
                                        <th>Danh mục</th>
                                        <th width='18%'>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($prd as $row)
                                    <tr>
                                    <td>{{ $row->id}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3"><img src="{{ $row->avatar }}" alt="{{ $row->name }}" width="100px" class="thumbnail"></div>
                                                <div class="col-md-9">
                                                    <p><strong>Mã sản phẩm : {{ $row->sku}}</strong></p>
                                                    <p>{{ $row->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($row->price)}} VND</td>
                                        <td>
                                            <a class="btn btn-{{ $row->quantity>0?'success':'danger' }}" href="#" role="button">{{$row->quantity>0? 'Còn hàng':'Hết hàng'}}</a>
                                        </td>
                                        <td>{{ optional($row->category)->name }}</td>
                                        <td>
                                            <a href="/admin/products/{{$row->id}}/edit" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
                                            <a href="/admin/products/{{$row->id}}" class="btn btn-danger btn-destroy"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6"> khong co ban ghi</td>
                                        </tr>
                                    @endforelse

                                    {{-- <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3"><img src="/assets/admin/img/ao-khoac.jpg" alt="Áo đẹp" width="100px" class="thumbnail"></div>
                                                <div class="col-md-9">
                                                    <p><strong>Mã sản phẩm : SP01</strong></p>
                                                    <p>Tên sản phẩm :Áo Khoác Bomber Nỉ Xanh Lá Cây AK179</p>


                                                </div>
                                            </div>
                                        </td>
                                        <td>500.000 VND</td>
                                        <td>
                                            <a class="btn btn-danger" href="#" role="button">hết hàng</a>
                                        </td>
                                        <td>Áo Khoác Nam</td>
                                        <td >
                                            <a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
                                            <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                        </td>
                                    </tr> --}}
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <!--/.row-->

        </div>
    </div>
</div>
@endsection
@push('adminjs')
<script>
    $(document).ready(function(){
        // console.log('im in')
        $(".btn-destroy").on("click", function(e){
            e.preventDefault()
            if(confirm("Bạn có muốn xóa?")){
                $.ajax({
                    url:$(this).attr('href'),
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE"
                    },
                    success: function(){
                        window.location.reload()
                    }
                })
            }
        })
    })
</script>
@endpush

@extends('client.layouts.app')
@section('content')
<div id="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="contact-wrap">
                    <h3>Liên hệ</h3>
                    <form action="" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 padding-bottom">
                                <label for="fname">Email</label>
                                <input type="text" id="fname" name="email" class="form-control" placeholder="Họ và tên">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Password</label>
                                <input type="text" id="email" name="password" class="form-control"
                                    placeholder="Email của bạn">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Đăng nhập" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

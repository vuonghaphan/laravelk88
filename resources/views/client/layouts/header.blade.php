<div class="colorlib-loader"></div>
<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo"><a href="index.html"><img src="/assets/client/images/logo.png" alt="" style="width: 300px;height: 50px;"></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li><a href="/" class="menu-home">Trang chủ</a></li>
                            <li><a href="/product" class="menu-product">Sản phẩm</a></li>
                            <li><a href="/about" class="menu-about">Giới thiệu</a></li>
                            <li><a href="/contact" class="menu-contact">Liên hệ</a></li>
                            <li><a href="/cart" class="menu-cart">
                                <i class="icon-shopping-cart"></i>
                                    Giỏ hàng [<span class="cart-total-quantity">{{ \Cart::getTotalQuantity() }}</span>]</a></li>
                            @guest('client')
                            <li><a href="/login"><i class="menu-login"></i> Login</a></li>
                            @endguest
                            @auth('client')
                            <li><a href="/login"><i class="menu-login"></i>{{ Auth()->guard('client')->user()->name }}</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

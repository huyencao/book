<header>
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo"><a href="/"><img src="{{ asset('frontend/images/logo.png') }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="right">
                        {!! $menus !!}
                        <div class="shopping_cart">
                            <div class="phone"><a href="javascript:0"><i class="fa fa-phone"></i>{{ $setting[0]->phone }}</a>
                            </div>
                            <div class="cart">
                                        <a href="cart.html"><img src="{{ asset('frontend/images/cart.png') }}" class="img-fluid"
                                                alt=""><span>1</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu-mobile -->
    <div class="menu-mobile" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-3 col-sm-3">
                    <div class="cart">
                        <a href="cart.html"><img src="{{ asset('frontend/images/cart.png') }}" class="img-fluid" alt=""><span>1</span></a>
                    </div>
                </div>
                <div class="col-md-6 col-6 col-sm-6">
                    <div class="logo">
                        <a href="/"><img src="{{ asset('frontend/images/logo.png') }}" class="img-fluid avarta-logo" alt=""></a>
                    </div>
                </div>
                <div class="col-md-3 col-3 col-sm-3">
                    <div class="header">
                        <a href="/"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <nav id="menu">
        {!! $menus !!}
        </nav>
    </div>
    <!-- end menu-mobile -->
</header>
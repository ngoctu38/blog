<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!--js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class=" col-12 row align-items-center"  >
    <div class="row  d-block align-items-start" >
        <div class="col-12 text-center tx">
            Hotline Mua Hàng: 0973 285 886 | Hotline CSKH: 1900 886 803 - Ext 1 | Email CSKH: web@360boutique.vn
        </div>
        <div class="col-12 row align-items-center">
            <div class="col-4">
                <a href="#"><img style=" margin-left: 10px; width: 30%; " src="https://360boutique.vn/wp-content/uploads/2020/12/logo-co-moi-360-den-e1607590785505.png" alt=""></a>
            </div>
            <div class="col-4">
                <div class="wpo-search-inner">
                    <form method="POST" action=" " name="search" >
                    <div class="input-group">
                        <input style="border:  0px none ;width:80%;outline:none; background-color: #EEEEEE" type="search"   placeholder="Tìm kiếm sản phẩm..."
                               aria-describedby="search-addon" />
                        <button style="border: 5px none ;width:20%;height: 50px ; background-color: #EEEEEE" type="button" class="  ">search</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div id="app">
                        <div class="container">
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <div class="btn btn-default menu "   >
                <div class="dropdown">
                    <div class="menu-item "><a href="">Giới thiệu</a></div>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="menu-item "><a href="">Bộ sưu tập</a></div>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
                <div class="dropdown " >
                    <div class="menu-item "><a href="">sản phẩm</a></div>
                    <div class="dropdown-content sp" >
                        <div class="dropdown">
                            <div class="menu-item "><a href=""><b>Áo Nam</b></a><br><hr class="hr_type"></div>
                            <div class="">
                                @foreach($type_product as $type)
                                    @if($type->id_type_detail == 1)
                                <a class="product_type" href="{{route('type',$type->id)}}">{{$type->name}}</a>
                                    @endif
                                @endforeach

                            </div></div>
                        <div class="dropdown">
                            <div class="menu-item "><a href=""><b>Quần Nam</b></a></div>
                            <div class="product_type">
                                @foreach($type_product as $type)
                                    @if($type->id_type_detail == 2)
                                        <a href="{{route('type',$type->id)}}">{{$type->name}}</a>
                                    @endif
                                @endforeach
                            </div></div>
                        <div class="dropdown">
                            <div class="menu-item "><a href=""><b>Phụ Kiện Nam</b></a></div>
                            <div class="product_type">
                                @foreach($type_product as $type)
                                    @if($type->id_type_detail == 3)
                                        <a href="{{route('type',$type->id)}}">{{$type->name}}</a>
                                    @endif
                                @endforeach
                            </div></div>
                        <div class="dropdown">
                            <div class="menu-item "><a href=""><b>Dày Dép Nam</b></a></div>
                            <div class="product_type" >
                                @foreach($type_product as $type)
                                    @if($type->id_type_detail == 4)
                                        <a href="{{route('type',$type->id)}}">{{$type->name}}</a>
                                    @endif
                                @endforeach
                            </div></div>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="menu-item "><a href="">khuyến mãi</a></div>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="menu-item "><a href="">tin tức</a></div>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="menu-item "><a href="">tuyển dụng</a></div>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="menu-item "><a href="">hệ thống cửa hàng</a></div>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="menu-item "><a href="">Giới thiệu</a></div>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
            </div>
    </div>
        <hr>
    </div>
</div>
<div>@yield('content')</div>
<div class="footer ">
    <div  class="d-flex justify-content-center">
        <div class="col-2">
            <h5>HỆ THỐNG CỬA HÀNG</h5>
            <a href="#">đường dẫn link.......</a><br>
            <a href="#">đường dẫn link......</a><br>
            <a href="#">đường dẫn link.....</a><br>
            <a href="#">đường dẫn link....</a><br>
            <a href="#">đường dẫn link.......</a><br>
            <a href="#">đường dẫn link.........</a><br>
            <a href="#">đường dẫn link.......</a><br>
        </div>
        <div class="col-2">
            <h5>CHÍNH SÁCH VÀ QUY ĐỊNH CHUNG</h5>
            <a href="#">đường dẫn link.......</a><br>
            <a href="#">đường dẫn link......</a><br>
            <a href="#">đường dẫn link.....</a><br>
            <a href="#">đường dẫn link....</a><br>
            <a href="#">đường dẫn link.......</a><br>
            <a href="#">đường dẫn link.........</a><br>
            <a href="#">đường dẫn link.......</a><br>
        </div>
        <div class="col-2">
            <h5>ĐỊA CHỈ</h5>
            <a href="#">đường dẫn link.......</a><br>
            <a href="#">đường dẫn link......</a><br>
            <a href="#">đường dẫn link.....</a><br>
            <a href="#">đường dẫn link....</a><br>
            <a href="#">đường dẫn link.......</a><br>
            <a href="#">đường dẫn link.........</a><br>
            <a href="#">đường dẫn link.......</a><br>
        </div>
        <div class="col-2">
            <h5>Fanpage</h5>
            <a href="#">đường dẫn link.......</a><br>
            <a href="#">đường dẫn link......</a><br>
            <a href="#">đường dẫn link.....</a><br>
            <a href="#">đường dẫn link....</a><br>
            <a href="#">đường dẫn link.......</a><br>
            <a href="#">đường dẫn link.........</a><br>
            <a href="#">đường dẫn link.......</a><br>
        </div>
    </div>
</div>
</body>
</html>

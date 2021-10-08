<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- Css Styles -->
    <link rel="stylesheet" href="Template/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Template/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="Template/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="Template/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="Template/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="Template/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="Template/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="Template/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="Template/css/style.css" type="text/css">
    <link rel="stylesheet" href="css/layout.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="col-12 text-center tx">
        Hotline Mua Hàng: 0969647473 | Hotline CSKH: 1900 100có - Ext 1 | Email CSKH: web@tunguyen.vn
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-3 col-md-3"  >
                    <div class="logo">
                        <a href="{{route('home')}}"><img style=" margin-left: 10px; width: 30%; " src="https://360boutique.vn/wp-content/uploads/2020/12/logo-co-moi-360-den-e1607590785505.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="advanced-search">
                        <form method="post" action="{{route('home')}}" name="search">
                            @csrf
                            <input type="text" name="name" placeholder="Tìm kiếm sản phẩm theo tên... ">
                            <button type="submit" value="search"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon"><a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon"><a href="{{route("shopping-cart")}}">
                                <i class="icon_bag_alt"></i>
                                <span id="total-quantity-show">0</span>
                            </a>
                            <div class="cart-hover">
                                <div id="change-item-cart">

                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>{{number_format(session('cart')->totalPrice)}}</h5>
                                        </div>

                                </div>
                                <div class="select-button">
                                    <a href="{{route("shopping-cart")}}" class="primary-btn view-card">VIEW CART</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center" id="item-menu"  >
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
</header>
<!-- Header End -->
<div>
    @yield('content')
</div>
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <ul>
                        <li>Address: Nam Từ Liêm - Hà Nội</li>
                        <li>Phone: 0969647473</li>
                        <li style="position: absolute;">Email: ngoctu12.10.2000@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/tu.nuyen.96/"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Serivius</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>My Account</h5>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="#">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Join Our Newsletter Now</h5>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter Your Mail">
                        <button type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/tu.nuyen.96/" target="_blank">Nguyễn Ngọc Tú</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="payment-pic">
                        <img src="../../public/Template/img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="Template/js/jquery-3.3.1.min.js"></script>
<script src="Template/js/bootstrap.min.js"></script>
<script src="Template/js/jquery-ui.min.js"></script>
<script src="Template/js/jquery.countdown.min.js"></script>
<script src="Template/js/jquery.nice-select.min.js"></script>
<script src="Template/js/jquery.zoom.min.js"></script>
<script src="Template/js/jquery.dd.min.js"></script>
<script src="Template/js/jquery.slicknav.js"></script>
<script src="Template/js/owl.carousel.min.js"></script>
<script src="Template/js/main.js"></script>

<script>
    function AddCart(id) {
        $.ajax({
            url : 'add-cart/'+ id,
            type : 'GET',
        }).done(function (response) {
            RenderCart(response);
            alertify.success('Thêm sản phẩm thành công !');
        });
    }
    function DeleteCart(id) {
        $.ajax({
            url : 'delete-cart/'+ id,
            type : 'GET',
        }).done(function (response) {
            RenderCart(response);
            alertify.success('Xóa thành công !');
        });
    }
    function RenderCart(response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quantity-show").text($("#total-quantity").val())
    }
    // tạo biến xác định vị trí hiện tại của menu so với top
    pos = $("#item-menu").position();
    // cuộn menu
    $(window).scroll(function() {
        var posScroll = $(document).scrollTop();
        if (parseInt(posScroll) > parseInt(pos.top)){
            $("#item-menu").addClass('fixed');
        }  else
            $("#item-menu").removeClass('fixed');
    });

</script>

</body>

</html>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <title>Document</title>
</head>
<body>
<div class="row" style="background-color: #1b1e21; color: #1d68a7">admin</div>
<div class="row">
<div class="col-2" style=" height: 1000px">
        <div><a class="dropdown-item" href="{{route('product.index')}}">Sản phẩm</a></div>
        <div><a class="dropdown-item  " href="{{route('order.index')}}" >Đơn hàng</a></div>
        <div><a class="dropdown-item  " href="{{route('product-type.index')}}" >Loại sản phẩm</a></div>
</div>
<div class="col-10">
    <div class="container" >
        @if(session()->has('error'))
            <div class="alert alert-success" style="background-color: #e9605c; color: #4c110f"> {{ session()->get('error') }}</div>
        @endif
    </div>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success"> {{ session()->get('success') }}</div>
        @endif
    </div>
@yield('content')
</div>
</div>
</body>
</html>

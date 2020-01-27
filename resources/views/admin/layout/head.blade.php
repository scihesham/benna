<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>بناء كويك</title>    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

    <!-- CSRF Token -->
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <link rel="stylesheet" href="{{asset('public/design/adminlte/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/design/adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/design/adminlte/dist/css/AdminLTE-rtl.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('public/design/adminlte/plugins/Ionicons/css/ionicons.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('public/design/adminlte/dist/css/skins/_all-skins.min.css')}}">

    {{--    <link rel="stylesheet" href="{{asset('public/design/adminlte/plugins/iCheck/flat/blue.css')}}">--}}

    <link rel="stylesheet" href="{{asset('public/design/adminlte/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/design/adminlte/datatable.css')}}">
    <link rel="stylesheet" href="{{asset('public/design/adminlte/rtl.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{url('public/design/adminlte')}}/dist/css/jquery.selectBoxIt.css" />
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('header')
    <script>
         var url = "{{url('/')}}";
         var csrf_token = "{{ csrf_token() }}";
    </script>
</head>
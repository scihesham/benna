@if(auth()->check())

@include('admin.layout.head')
@include('admin.layout.body-start')
@include('admin.layout.wrapper-start')
@include('admin.layout.overlay')
@include('admin.layout.loader')
@include('admin.layout.header')
@include('admin.layout.aside')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('page_title')
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>لوحة التحكم</a></li>
            <li class="active">@yield('active_title')</li>
        </ol>
        @include('admin.layout.message') 
    </section> 
    @yield('content')

</div>
<!-- /.content-wrapper -->

@include('admin.layout.footer')
{{--    @include('admin.layout.aside-control')--}}
@include('admin.layout.wrapper-end')
@include('admin.layout.js')
@include('admin.layout.body-end')

@endif
@include('front.layout.header')
@if(!isset($no_navbar))
  @include('front.layout.navbar')
@endif
  <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->      
      
        @include('front.layout.message') 

        @yield('content')

  
@if(!isset($no_footer))
  @include('front.layout.footer')
@endif
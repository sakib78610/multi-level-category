<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Assessment | Dashboard</title>
 <!---css start here---->
    @include('admin.layouts.css')
    @yield('style')
 <!---css End here---->
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
     @include('admin.layouts.header')
     <div class="app-main">
      @include('admin.layouts.sidebar')
      <div class="app-main__outer">
      @yield('body')
      @include('admin.layouts.footer')
      </div>
     </div>
     @include('admin.layouts.script')
     @yield('js')
     @include('admin.layouts.message')
</div>
</body>
</html


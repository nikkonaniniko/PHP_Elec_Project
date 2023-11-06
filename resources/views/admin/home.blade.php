<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.components.css')
  </head>
  <body>
    <div class="container-scroller">

      @include('admin.components.sidebar')
      @include('admin.components.header')

      @include('admin.components.body')
      
      @include('admin.components.script')  
    
  </body>
</html>
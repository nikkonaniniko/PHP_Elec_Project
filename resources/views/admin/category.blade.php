<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/favicon.png" type="">

    @include('admin.components.css')
    
    <style type="text/css">
    .div_center {
        text-align: center;
        padding-top: 40px;
    }
    .div_center h2{
        font-size: 40px;
        padding-bottom: 40px;  
    }
    .input_color {
        color: black;
        padding: 5px;
    }
    .center {
      margin: auto;
      width: 50%;
      text-align: center;
      margin-top: 30px;
      border: 3px solid white;
    }
    .center th, td{
      border: 3px solid white;
      padding: 5px;
    }
    .center th{
      background: darkslategray;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">

      @include('admin.components.sidebar')
      @include('admin.components.header')

      <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif

           <div class="div_center">
            <h2>Add Category</h2>
            <form action="{{url('/add_category')}}" method="POST">
                @csrf
                <input class="input_color" type="text" name="category_name" placeholder="Category...">
                <input type="submit" class="btn btn-success" name="submit" value="Add Category">
            </form>
            </div> 

            <table class="center">
              <tr>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
              @foreach ($data as $data)
              <tr>
                <td>{{$data->category_name}}</td>
                <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{url('delete_category', $data->id)}}">Delete</a></td>
              </tr>  
              @endforeach
              
            </table>

        </div>
      </div>
      
      @include('admin.components.script')  
    

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
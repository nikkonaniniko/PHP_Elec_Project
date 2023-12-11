<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    labelName{
      display: inline-flex;
      width: 200px;
    }
    labelImage{
      display: inline-flex;
      width: 200px;
      margin-left: 135px;
    }
    labelDescription{
      display: inline-flex;
      width: 200px;
    }
    labelDesignation{
      display: inline-flex;
      width: 200px;
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
    .img_size {
            width: 120px;
    }

    .btn{
      margin-top: 10px;
      margin-bottom: 10px;
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
            <h2>Add Developer</h2>
            <form action="{{url('/add_developer')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <labelName for="name">Name</labelName>
                <input class="input_color" type="text" name="name" placeholder="Write Developer's Name"> <br>
                <labelDescription for="name">Description</labelDescription>
                <input class="input_color" type="text" name="description" placeholder="Write Description"> <br>
                <labelDesignation for="name">Designation</labelDesignation>
                <input class="input_color" type="text" name="designation" placeholder="Write Designation"> <br>
                <labelImage for="name">Image</labelImage>
                <input type="file" name="image" required> <br>
                <input type="submit" class="btn btn-success" name="submit" value="Add Developer">
            </form>
            </div> 

            <table class="center">
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Designation</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              @forelse ($data as $data)
              <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->description}}</td>
                <td>{{$data->designation}}</td>
                <td><img class="img_size" src="/storage/developer/{{ $data->image }}" alt=""></td>
                <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{url('delete_developer', $data->id)}}">Delete</a></td>
              </tr>
              
              @empty
                    <td colspan="5">No Developers</td>

              @endforelse
              
            </table>

        </div>
      </div>
      
      @include('admin.components.script')  
    

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
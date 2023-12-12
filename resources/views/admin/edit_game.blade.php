<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="/images/favicon.png" type="">

    @include('admin.components.css')

    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .div_center h2 {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
            padding: 5px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        labelCategory1 {
            display: inline-flex;
            width: 200px;
            margin-left: -90px;
            gap: 200px;
        }

        labelCurrentI {
            display: inline-flex;
            width: 200px;
            margin-left: -100px;
            gap: 200px;
        }
        
        labelNewIm {
            display: inline-flex;
            width: 200px;
            margin-left: 140px;
            gap: 190px;
        }

        .div_design label {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        @include('admin.components.sidebar')
        @include('admin.components.header')

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
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
                    <h2>Edit {{$game->name}}</h2>

                    <form action="{{url('/edit_game_confirm', $game->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="name">Name</label>
                            <input class="input_color" type="text" name="name" placeholder="Game Name" value="{{$game->name}}" required>
                        </div>

                        <div class="div_design">
                            <label for="description">Description</label>
                            <input class="input_color" type="text" name="description" placeholder="Description" value="{{$game->description}}" required>
                        </div>

                        <div class="div_design">
                            <label for="price">Price</label>
                            <input class="input_color" type="number" name="price" placeholder="$" value="{{$game->price}}" required>
                        </div>

                        <div class="div_design">
                            <label for="quantity">Quantity</label>
                            <input class="input_color" type="number" min="0" name="quantity" placeholder="Quantity" value="{{$game->quantity}}" required>
                        </div>

                        <div class="div_design">
                            <labelCategory1 for="category">Category</labelCategory1>
                            <select class="input_color" name="category" id="" required>
                                <option value="{{$game->category}}" selected="">{{$game->category}}</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="div_design">
                            <labelCurrentI for="image">Current Image</labelCurrentI>
                            <img style="margin:auto" width="170px" height="170px" src="/storage/game/{{$game->image}}" alt="Game Image">
                        </div>

                        <div class="div_design">
                            <labelNewIm for="image">New Image</labelNewIm>
                            <input type="file" name="image">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Edit Game" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>

        @include('admin.components.script')

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
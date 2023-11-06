<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                            <label for="category">Category</label>
                            <select class="input_color" name="category" id="" required>
                                <option value="{{$game->category}}" selected="">{{$game->category}}</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="div_design">
                            <label for="image">Current Image</label>
                            <img style="margin:auto" width="170px" height="170px" src="/game/{{$game->image}}" alt="Game Image">
                        </div>

                        <div class="div_design">
                            <label for="image">New Image</label>
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

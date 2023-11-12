<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @include('admin.components.css')

    <style type="text/css">
        .center {
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
            color: white;
        }

        .center th, td {
            border: 3px solid white;
            padding: 5px;
        }

        .center th {
            background: darkslategray;
        }

        .title {
            text-align: center;
            font-size: 40px;
            padding: 10px;
            color: white;
        }

        .img_size {
            width: 150px;
            height: 150px;
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

                <h2 class="title">All Games</h2>

                <table class="center">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th colspan="2">Actions</th>

                    </tr>

                    @foreach ($game as $game)
                        <tr>
                            <td>{{ $game->name }}</td>
                            <td>{{ $game->description }}</td>
                            <td>{{ $game->category }}</td>
                            <td><img class="img_size" src="/game/{{ $game->image }}"></td>
                            <td>{{ $game->quantity }}</td>
                            <td>{{ $game->price }}</td>
                            <td><a class="btn btn-info" href="{{url('edit_game', $game->id)}}">Edit</a></td>
                            <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger"
                                    href="{{url('delete_game', $game->id)}}">Delete</a></td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>

        @include('admin.components.script')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>

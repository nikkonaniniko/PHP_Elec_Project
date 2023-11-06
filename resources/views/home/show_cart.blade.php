<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />

    <style type="text/css">
        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }

        table {
            border: 3px solid black;
        }

        table th {
            border: 3px solid black;
        }

        table td {
            border: 3px solid black;
        }

        .th_design {
            font-size: 20px;
            padding: 5px;
            background-color: red;
            color: white;
        }

        .img_design {
            width: 120px;
            height: 120px;
            padding: 5px;
        }

        .total_design {
            padding: 40px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.components.header')

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="center">
            <table>
                <tr>
                    <th class="th_design">Game</th>
                    <th class="th_design">Quantity</th>
                    <th class="th_design">Price</th>
                    <th class="th_design">Image</th>
                    <th class="th_design">Action</th>
                </tr>

                <?php $totalprice = 0; ?>
                @foreach ($cart as $cart)
                    <tr>
                        <td>{{ $cart->game_name }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>${{ $cart->price }}</td>
                        <td><img class="img_design" src="/game/{{ $cart->image }}" alt="Game Image"></td>
                        <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger"
                                href="{{ url('remove_cart', $cart->id) }}">Remove</a></td>
                    </tr>
                    <?php $totalprice = $totalprice + $cart->price; ?>
                @endforeach
            </table>

            <div>
                <h1 class="total_design">Total Price: ${{ $totalprice }}</h1>
            </div>

            <div>
                <h1 style="font-size: 30px; padding-bottom: 10px;">Proceed to Order</h1>
                <a class="btn btn-info" href="{{ url('cash_order') }}">Cash on Delivery</a>
                <a class="btn btn-info" href="">Pay using Card</a>
            </div>

        </div>

        @include('home.components.footer')


        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>


        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js" defer></script>
        <!-- popper js -->
        <script src="js/popper.min.js" defer></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.js" defer></script>
        <!-- custom js -->
        <script src="js/custom.js" defer></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

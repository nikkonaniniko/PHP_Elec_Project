<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Lootbox | My Cart</title>
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
            display: flex;
            flex-direction: column;
        }

        table {
            border: 3px solid white;
            color: white;
        }

        table th {
            border: 3px solid white;
        }

        table td {
            border: 3px solid white;
        }

        .th_design {
            font-size: 20px;
            padding: 5px;
            background-color: rgb(51, 176, 226);
            color: white;
        }

        .img_design {
            width: 120px;
            height: 120px;
            padding: 5px;
        }

        .total_design {
            padding: 40px;
            color: white;
        }

        .cart-section {
            padding: 30px;
            text-align: center;
            background-color: #525252;
            color: white;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }

        .order-section {
        }

        .order-section a:link {
            background-color: #1bbda7d8;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .order-section a:visited {
            background-color: #1bbda7d8;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .order-section a:hover {
            background-color: #118864;
            color: white;
            padding: 12px 17px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .order-section a:active {
            background-color: #118864;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: underline;
            display: inline-block;
        }
        .orderbox {
            margin: auto;
            background-color: white;
            height: 200px;
            width: 300px;
            color: black;
            padding: 35px;
            border: solid 8px rgb(51, 176, 226);
            border-radius: 40px;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        @include('home.components.header')
        <div class="bg">
            <img src="images/bg.jpg">
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="cart-section">
            <div class="heading_container heading_center">
                <h2>
                    My <span>Cart</span>
                </h2>
            </div>
        </div>

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
                @forelse ($cart as $cart)
                    <tr>
                        <td>{{ $cart->game_name }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>₱{{ $cart->price }}</td>
                        <td><img class="img_design" src="/storage/game/{{ $cart->image }}" alt="Game Image"></td>
                        <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger"
                                href="{{ url('remove_cart', $cart->id) }}">Remove</a></td>
                    </tr>
                    <?php $totalprice = $totalprice + $cart->price; ?>

                @empty
                    <td colspan="5">No Items on the Cart</td>
                @endforelse
            </table>

            @if ($totalprice != 0)
            <div>
                <h1 class="total_design">Total Price: ₱ {{ $totalprice }}</h1>
            </div>

            <div class="order-section">
                <div class="orderbox">
                <h1 style="font-size: 30px; padding-bottom: 10px;">Proceed to Order</h1>
                <a onclick="return confirm('Are you sure with this order?')" href="{{ url('cash_order') }}">Cash on
                    Delivery</a>
                </div>
            </div> 
            @else
                
            @endif
            

        </div>

        @include('home.components.footer')

        <script>
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal({
                        title: "Remove Product Confirmation",
                        text: "Are you sure?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willCancel) => {
                        if (willCancel) {
                            window.location.href = urlToRedirect;
                        }
                    });
            }
        </script>

        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
</body>

</html>

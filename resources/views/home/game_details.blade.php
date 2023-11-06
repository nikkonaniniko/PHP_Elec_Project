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
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        @include('home.components.header')
        {{-- </div> --}}

        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px;">

            <div class="img-box" style="padding: 30px;">
                <img style="width: 400px; height: 400px;" src="game/{{ $game->image }}" alt="">
            </div>
            <div class="detail-box">
                <h5>
                    {{ $game->name }}
                </h5>
                <h6>
                    Description: {{ $game->description }}
                </h6>
                <h6>
                    Category: {{ $game->category }}
                </h6>
                <h6>
                    Price
                    <br>
                    <p style="color: blue;">${{ $game->price }}</p>
                </h6>
                <h6>
                    Available stock: {{ $game->quantity }}
                </h6>

                <form action="{{ url('add_cart', $game->id) }}" method="POST">
                    @csrf
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min="1"
                                style="width: 80px;">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Add to Cart">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- </div> --}}

        @include('home.components.footer')


        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>


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

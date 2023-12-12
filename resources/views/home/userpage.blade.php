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
    <title>Lootbox - Game Store</title>
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
    @include('sweetalert::alert')

    {{-- <div class="hero_area"> --}}
    @include('home.components.header')
    @include('home.components.slider')
    <video src="images/trailers.mp4" width="100%" style="margin: auto;" autoplay muted loop></video>
    </div>

    {{-- @include('home.components.game') --}}
    <!-- product section -->
    <div class="parallax2">
        <section class="product_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Our Latest <span>Games</span>
                        <div>
                            <form action="{{ url('search_game') }}" method="GET">
                                @csrf
                                <input style="width:300px;" type="text" name="search" placeholder="Search Game...">
                                <input type="submit" value="search">
                            </form>
                        </div>
                    </h2>
                </div>

                <div class="row">

                    @foreach ($games as $game)
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="box">
                                <div class="option_container">
                                    <div class="options">
                                        <a href="{{ url('game_details', $game->id) }}" class="option1">
                                            View Details
                                        </a>
                                        @if ($game->quantity > 0)
                                            <form action="{{ url('add_cart', $game->id) }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="number" name="quantity" value="1"
                                                            min="1" style="width: 80px;">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="submit" value="Add to Cart">
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <label class="bg bg-danger" style="padding: 5px;">Out of Stock</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="img-box">
                                    <img src="/storage/game/{{ $game->image }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $game->name }}
                                    </h5>
                                    <h6>
                                        ₱{{ $game->price }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="btn-box">
                    <a href="{{ url('games') }}">
                        View All Games
                    </a>
                </div>
        </section>
    </div>
    <!-- end product section -->

    @include('home.components.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
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

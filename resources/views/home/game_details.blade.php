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
    <title>Lootbox | Game Details</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<style type="text/css">
.detail-box {
    padding: 5px;
    color: white;
    background-image: linear-gradient(163deg, #a2b1a9 0%, rgb(51, 176, 226) 100%);
    border-radius: 10px;
    transition: all .3s;
}
.detail-box:hover {
    box-shadow: 0px 0px 70px 30px rgba(47, 169, 250, 0.514)
}
.detail-box2 {
    background-color: #2b2b2bd0;
    border-radius: 10px;
    transition: all .2s;
}
.detail-box2:hover {
    transform: scale(0.98);
    border-radius: 50px;
}

.detail-text {
    padding: 10px;
    color: azure;
    gap: 1rem;
    display: grid;
    text-align: center;
}
.img-box:hover {
    transform: scale(1.05);
}
.img-box {
    padding: 30px;
    margin-left: 55px;
}
</style>

<body>
        @include('sweetalert::alert')
        @include('home.components.header')
        <div class="bg">
            <img src="images/bg.jpg">
        </div>

        <div class="hero_area">
        
        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px;">

            <div class="img-box">
                <img style="width: 400px; height: 400px;" src="/storage/game/{{ $game->image }}" alt="">
            </div>
            <div class="detail-box">
                <div class="detail-box2">
                    <div class="detail-text">
                <h4>
                    {{ $game->name }}
                </h4>
                <h6>
                    Description: {{ $game->description }}
                </h6>
                <h6>
                    Category: {{ $game->category }}
                </h6>
                <h6>
                    Price: ₱{{ $game->price }}
                </h6>
                @if($game->quantity > 0)
                <h6>
                    Available stock: {{ $game->quantity }}
                </h6>
                @else
                <label class="bg bg-danger">
                    <strong>Out of Stock</strong>
                </label>
                @endif

                @if($game->quantity > 0)
                <form action="{{ url('add_cart', $game->id) }}" method="POST">
                    @csrf
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min="1" max="{{$game->quantity}}" style="width: 80px;">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Add to Cart">
                        </div>
                    </div>
                </form>  
                @else
                @endif
                
            </div>
        </div>
        </div>
        </div>
        @include('home.components.footer')

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

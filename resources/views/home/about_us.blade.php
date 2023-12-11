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
    <title>Lootbox | About Us</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    
    <style type="text/css">
        .about-section {
        padding: 20px;
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
    </style>
</head>

<body>

    @include('home.components.header')
    <div class="bg">
        <img src="images/bg.jpg">
    </div>

<div class="about-section">
    <div class="heading_container heading_center">
        <h2>
            About <span>Us</span>
        </h2>
  <h6 style="padding-top: 5px;">Dedicated to delivering unparalleled gaming experiences, our passionate team of individuals is committed to providing you with a curated selection of the finest games at prices that won't break the bank.</h6>
</div>
</div>

<h2 style="text-align:center; margin-top: 15px; color: white;">Our Team</h2>

<div class="hero_area">

<section class="about_us_section">
    <div class="container">
        <div class="row">
        @foreach ($developers as $developers)
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
                <div class="option_container">
            
                </div>
                <div class="img-box">
                    <img style="width: 120px" src="/storage/developer/{{ $developers->image }}" alt="">
                </div>
                <div class="detail-box">
                    <h5>
                        {{ $developers->name }}
                    </h5>
                    <h6>
                        {{ $developers->designation }}
                    </h6>
                    <p>
                        {{ $developers->description }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach

    </div>

</section>

@include('home.components.footer')

</body>
</html>

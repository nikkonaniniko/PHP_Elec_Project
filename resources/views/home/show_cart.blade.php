<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    @include('sweetalert::alert')
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
                @forelse ($cart as $cart)
                    <tr>
                        <td>{{ $cart->game_name }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>${{ $cart->price }}</td>
                        <td><img class="img_design" src="/game/{{ $cart->image }}" alt="Game Image"></td>
                        {{-- <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{ url('remove_cart', $cart->id) }}">Remove</a></td> --}}
                        <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('remove_cart', $cart->id) }}">Remove</a></td>
                    </tr>
                    <?php $totalprice = $totalprice + $cart->price; ?>

                    @empty
                    <td colspan="5">No Items on the Cart</td>

                @endforelse
            </table>

            <div>
                <h1 class="total_design">Total Price: ${{ $totalprice }}</h1>
            </div>

            <div>
                <h1 style="font-size: 30px; padding-bottom: 10px;">Proceed to Order</h1>
                <a class="btn btn-info" href="{{ url('cash_order') }}">Cash on Delivery</a>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

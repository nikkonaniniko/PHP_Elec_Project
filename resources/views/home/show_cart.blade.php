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
     <title>Lootbox | My Orders</title>
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

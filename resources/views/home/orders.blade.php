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
            width: 100%;
            padding: 30px;
            text-align: center;
            display: flex;
            justify-content: center
        }
        table {
            border: 3px solid white;
            color: white;
        }

        table th {
            border: 3px solid white;
            padding: 10px;
            background: white;
        }

        table td {
            border: 3px solid white;
            padding: 10px;
            background: rgba(73, 73, 73, 0.76);
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
        .cart-section {
        padding: 10px;
        text-align: center;
        background-color: #525252;
        color: white;
        }
    </style>

   </head>
   <body>
      <div class="hero_area">
         @include('home.components.header')
         <div class="bg">
            <img src="images/bg.jpg">
        </div>

        <div class="cart-section">
            <div class="heading_container heading_center">
                <h2>
                    My <span>Orders</span>
                </h2>
        </div> 
        </div>

        <div class="center">
            <table>
                <tr>
                    <th class="th_design">Order Date</th>
                    <th class="th_design">Game Name</th>
                    <th class="th_design">Quantity</th>
                    <th class="th_design">Price</th>
                    <th class="th_design">Payment Status</th>
                    <th class="th_design">Delivery Status</th>
                    <th class="th_design">Image</th>
                    <th class="th_design">Action</th>
                </tr>
                @forelse ($orders as $order)
                <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->game_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td><img src="/storage/game/{{$order->image}}" alt="Game Image" class="img_design"></td>
                    <td>
                        @if($order->delivery_status=='processing')
                        
                        <a href="{{url('cancel_order', $order->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Cancel</a>

                        @elseif($order->delivery_status=='delivered')
                        <p>Thank You!</p>

                        @else
                        <p>Canceled</p>

                        @endif
                    </td>
                </tr>

                @empty
                <td colspan="7">No Orders Found</td>

                @endforelse
                
            </table>
            <br><br>
            {{ $orders->links('vendor.pagination.bootstrap-5') }}
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
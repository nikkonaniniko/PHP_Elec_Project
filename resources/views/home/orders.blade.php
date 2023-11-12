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
      <title>Famms - Fashion HTML Template</title>
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
            width: 80%;
            padding: 30px;
            text-align: center;
        }
        table {
            border: 3px solid black;
        }

        table th {
            border: 3px solid black;
            padding: 10px;
        }

        table td {
            border: 3px solid black;
            padding: 10px;
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
    </style>

   </head>
   <body>
      <div class="hero_area">
         @include('home.components.header')

        <div class="center">
            <table>
                <tr>
                    <th class="th_design">Game Name</th>
                    <th class="th_design">Quantity</th>
                    <th class="th_design">Price</th>
                    <th class="th_design">Payment Status</th>
                    <th class="th_design">Delivery Status</th>
                    <th class="th_design">Image</th>
                    <th class="th_design">Action</th>
                </tr>
                @forelse ($order as $order)
                <tr>
                    <td>{{$order->game_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td><img src="/game/{{$order->image}}" alt="Game Image" class="img_design"></td>
                    <td>
                        @if($order->delivery_status=='processing')
                        
                        <a href="{{url('cancel_order', $order->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Cancel</a>

                        @elseif($order->delivery_status=='delivered')
                        <p>Thank You!</p>

                        @else
                        <p>Sorry</p>

                        @endif
                    </td>
                </tr>

                @empty
                <td colspan="7">No Orders Found</td>

                @endforelse
                
            </table>
        </div>
      </div>

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
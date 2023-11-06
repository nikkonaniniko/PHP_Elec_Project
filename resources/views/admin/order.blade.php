<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.components.css')

    <style>
        .title_design {
            text-align: center;
            padding-bottom: 30px;
        }
        .table_design {
            border: 3px solid white;
            margin: auto;
            width: 100%;
            text-align: center;
        }
        .table_design th {
            background: darkslategray;
        }
        .table_design th, td{
            border: 3px solid white;
            padding: 5px;
        }
        .del_design {
            background: white;
            color: green;
            padding: 5px;
            font-weight: bold;
        }
        .search {
            padding-bottom: 20px;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">

      @include('admin.components.sidebar')
      @include('admin.components.header')

      <div class="main-panel">
        <div class="content-wrapper">

            <h1 class="title_design">All Orders</h1>
 
            <div class="search">

            <form action="{{url('search')}}" method="GET">
                @csrf
                <input type="text" name="search" placeholder="search...">
                <input type="submit" value="Search" class="btn btn-secondary">
            </form>

            </div>

            <table class="table_design">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Game Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Delivered</th>
                </tr>
                @forelse ($order as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->game_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td><img style="width: 100px; height: 100px;" src="/game/{{$order->image}}" alt="Game Image"></td>
                    <td>
                    @if($order->delivery_status=='processing')
                        <a onclick="return confirm('Are you sure?')" href="{{url('delivered', $order->id)}}" class="btn btn-success">Delivered</a>
                    @else 
                        <p class="del_design">Delivered</p>
                    @endif
                    </td>
                </tr>

                @empty
                
                <tr>
                    <td colspan="11">No Order Found</td>
                </tr>

                @endforelse
            </table>

        </div>
      </div>
      
      @include('admin.components.script')  
    
  </body>
</html>
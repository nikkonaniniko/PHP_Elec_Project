<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>Games</span>
                <div>
                    <form action="{{url('search_games')}}" method="GET">
                        @csrf
                        <input style="width:300px;" type="text" name="search" placeholder="Search Game...">
                        <input type="submit" value="search">
                    </form>
                </div>
            </h2>
        </div>

        <div class="row">

            @foreach ($game as $game)
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
                                            <input type="number" name="quantity" value="1" min="1"
                                                style="width: 80px;">
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

            {{-- <span style="padding-top: 20px;">
          {!!$game->withQueryString()->links('pagination::bootstrap-5')!!}
         </span> kodigo for pagination tas dat $game as $games then change variables to $games --}}

            {{-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div> --}}

        </div>
</section>
<!-- end product section -->

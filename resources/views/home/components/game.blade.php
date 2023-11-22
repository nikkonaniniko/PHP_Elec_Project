<!-- product section -->
<div class="parallax2">
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>Games</span>
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

            @foreach ($game as $games)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('game_details', $games->id) }}" class="option1">
                                    View Details
                                </a>
                                <form action="{{ url('add_cart', $games->id) }}" method="POST">
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
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="game/{{ $games->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $games->name }}
                            </h5>
                            <h6>
                                ₱{{ $games->price }}
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
</div>
<!-- end product section -->

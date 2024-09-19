@extends('layouts.app2')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Left Section: Product Images -->
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($auctionItem->images as $key => $image)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($auctionItem->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image->url) }}" class="d-block w-100" alt="{{ $auctionItem->title }}">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Right Section: Product Details -->
        <div class="col-md-6">
            <h2>{{ $auctionItem->title }}</h2>
            <div class="d-flex align-items-center">
                <h4 class="me-3 text-danger">{{ number_format($auctionItem->starting_price, 2) }}৳</h4>
                <h5 class="me-3 text-muted">Current Bid: {{ number_format($auctionItem->current_bid, 2) }}৳</h5>
            </div>

            <!-- Seller Info -->
            <p><strong>Seller:</strong> {{ $auctionItem->seller->name }}</p>

            <!-- Categories -->
            <div class="mb-3">
                @foreach($auctionItem->categories as $category)
                    <span class="badge bg-primary">{{ $category->name }}</span>
                @endforeach
            </div>

            <!-- Description with Line Spacing 2 -->
            <div class="mb-3" style="line-height: 2;">
                <h5>Description</h5>
                <p>{{ $auctionItem->description }}</p>
            </div>

            <!-- Remaining Time -->
            @php
                $currentDate = now();
                $endDate = \Carbon\Carbon::parse($auctionItem->end_time); // Assuming 'end_time' is in your model
                $diff = $endDate->diff($currentDate);
            @endphp
            <p><strong>Time Left:</strong> {{ $diff->d }} days, {{ $diff->h }} hours</p>

            <!-- Quantity Selector -->
            <div class="d-flex mb-4">
                <button class="btn btn-outline-secondary" type="button" id="decreaseQuantity">-</button>
                <input type="text" id="quantity" value="1" class="form-control text-center mx-2" style="width: 50px;">
                <button class="btn btn-outline-secondary" type="button" id="increaseQuantity">+</button>
            </div>

            <!-- Buy Now and Add to Cart Buttons -->
            <div class="d-flex">
                <button class="btn btn-primary me-2">Buy Now</button>
                <button class="btn btn-warning">Add to Cart</button>
            </div>
        </div>
    </div>

    <!-- Stylish Horizontal Line -->
    <hr class="my-5" style="border-top: 3px solid #333;">

    <!-- Display 5 Most Recent Auction Items -->
    <div class="container mt-5">
        <h3 class="text-center mb-4">Recent Auction Items</h3>
        <div class="row">
            @foreach($recentItems as $item)
            <div class="col-md-2 mb-4">
                <div class="card">
                    @if($item->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $item->images->first()->url) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 150px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Placeholder" style="height: 150px; object-fit: cover;">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">Starting Price: {{ number_format($item->starting_price, 2) }}৳</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    // Simple quantity selector functionality
    document.getElementById('increaseQuantity').addEventListener('click', function () {
        let quantity = parseInt(document.getElementById('quantity').value);
        document.getElementById('quantity').value = quantity + 1;
    });

    document.getElementById('decreaseQuantity').addEventListener('click', function () {
        let quantity = parseInt(document.getElementById('quantity').value);
        if (quantity > 1) {
            document.getElementById('quantity').value = quantity - 1;
        }
    });
</script>
@endsection

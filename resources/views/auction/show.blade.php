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
        <div class="col-md-6" style="line-height: 2;">
            <h2 style="font-weight: bold; font-style: italic;">{{ $auctionItem->title }}</h2>
            <div class="d-flex align-items-center">
                <h4 class="me-3 text-danger" style="line-height: 2;">Starting Price: {{ number_format($auctionItem->starting_price, 2) }}৳</h4>
            </div>
            <div class="d-flex align-items-center">
                <h5 class="me-3 text-muted" style="line-height: 2;">Current Bid: {{ number_format($auctionItem->current_bid, 2) }}৳</h5>
            </div>

            <!-- Seller Info -->
            <p><strong>Seller:</strong> {{ $auctionItem->seller->name }}</p>

            <!-- Categories -->
            <div class="mb-3">
                @foreach($auctionItem->categories as $category)
                <span class="badge bg-primary">{{ $category->name }}</span>
                @endforeach
            </div>

            <!-- Description -->
            <div class="mb-3" style="line-height: 2;">
                <h5>Description</h5>
                <p>{{ $auctionItem->description }}</p>
            </div>

            <!-- Time Left -->
            @php
            date_default_timezone_set('Asia/Dhaka'); // Set to Dhaka timezone (GMT +6)
            $currentDate = \Carbon\Carbon::now();
            $endDate = \Carbon\Carbon::parse($auctionItem->end_time);
            $diff = $endDate->diff($currentDate);
            @endphp

            @if($auctionItem->isAuctionEnded())
                <p class="text-danger"><strong>Time Left:</strong> The auction has ended.</p>
                @if($isHighestBidder)
                    <p class="text-success">You won the auction! You can now buy the item.</p>
                    <button class="btn btn-primary">Buy Now</button>
                @else
                    <p class="text-danger">The auction has ended. You are not the highest bidder.</p>
                @endif
            @else
                <p><strong>Time Left:</strong> {{ $diff->d }} days, {{ $diff->h }} hours, {{ $diff->i }} minutes</p>
                <button class="btn btn-warning">Bid Now</button>
            @endif
        </div>
    </div>

    <!-- Stylish Horizontal Line -->
    <hr class="my-5" style="border-top: 3px solid #333;">

    <!-- Recent Auction Items -->
    <div class="container mt-5">
        <h3 class="text-center mb-4">Recent Auction Items</h3>
        <div class="row">
            @foreach($recentItems as $item)
            <div class="col-md-2 mb-4">
                <a href="{{ url('/item_details/' . $item->id) }}" class="text-decoration-none">
                    <div class="card">
                        @if($item->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $item->images->first()->url) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 180px; object-fit: cover;">
                        @else
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Placeholder" style="height: 150px; object-fit: cover;">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text"style="color:red;">Starting Price: {{ number_format($item->starting_price, 2) }}৳</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

<style>
    .featured-category {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        transition: transform 0.2s;
    }

    .featured-category:hover {
        transform: scale(1.05);
    }

    .icon-circle {
        width: 70px;
        height: 70px;
        background-color: #e0e0e0;
        /* Gray background */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 10px;
        /* Center the icon and add space below */
    }

    .icon-circle img {
        height: 40px;
        /* Icon size inside the circle */
        width: auto;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Featured Categories') }}
        </h2>
        <p class="text-center text-gray-500 mb-4">Select your desired product from the featured categories!</p>
    </x-slot>

    <div class="main-content">
        <!-- Serach Bar -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex me-auto w-100">
                    <input class="form-control me-2 form-control-search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary btn-search" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="container my-5">
            <div class="row">
                <!-- First Row of Categories (6 items) -->
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/car.png') }}" alt="Vehicle">
                        </div>
                        <p>Vehicle</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/books.png') }}" alt="Book">
                        </div>
                        <p>Book</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/canvas.png') }}" alt="Painting">
                        </div>
                        <p>Painting</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/sculpture.png') }}" alt="Sculpture">
                        </div>
                        <p>Sculpture</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/ruby.png') }}" alt="Gemstone">
                        </div>
                        <p>Gemstone</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/necklace.png') }}" alt="Jewellery">
                        </div>
                        <p>Jewellery</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Second Row of Categories (6 items) -->
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/sofa.png') }}" alt="Furniture">
                        </div>
                        <p>Furniture</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/collectible.png') }}" alt="Collectibles">
                        </div>
                        <p>Collectibles</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/apartment.png') }}" alt="Real Estate">
                        </div>
                        <p>Real Estate</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/cloth.png') }}" alt="Cloth">
                        </div>
                        <p>Cloth</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/tablet.png') }}" alt="Technology">
                        </div>
                        <p>Technology</p>
                    </div>
                </div>
                <div class="col-md-2 text-center mb-4">
                    <div class="featured-category">
                        <div class="icon-circle">
                            <img src="{{ asset('logo/wrist-watch.png') }}" alt="Watch">
                        </div>
                        <p>Watch</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container my-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Recently Added Auction Items') }}
        </h2>
        <p class="text-center text-gray-500 mb-4">Scroll down and click on show all to see all the auction items that are available</p>
        <div class="row">
            @foreach ($auctionItems as $item)
            <div class="col-md-4">
                <a href="{{ url('/item_details/' . $item->id) }}" class="text-decoration-none">
                    <div class="card h-100"> <!-- Ensure uniform height for the card -->
                        @if($item->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $item->images->first()->url) }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $item->title }}">
                        @else
                        <img src="https://via.placeholder.com/250" class="card-img-top" style="height: 250px; object-fit: cover;" alt="No Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">Starting Price: {{ number_format($item->starting_price, 2) }} taka</p>
                            <p class="mt-auto">
                                @foreach($item->categories as $category)
                                <span class="badge bg-primary">{{ $category->name }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            <div class="col-md-25 text-center mt-4">
                <a href="{{route('all_items')}}" class="btn btn-primary" style="right: 20px; bottom: 20px; background-color: blue; color: white;"">
                        Show All
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
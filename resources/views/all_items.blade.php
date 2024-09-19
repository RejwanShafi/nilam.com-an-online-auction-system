@extends('layouts.app2')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-center my-8">All Available Auction Items</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($auctionItems as $item)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($item->images->isNotEmpty())
                @php
                    $imagePath = $item->images->first()->url;
                    $fullImagePath = asset('storage/' . $imagePath);
                @endphp
                <img src="{{ $fullImagePath }}" class="w-25 h-48 object-cover" alt="{{ $item->title }}">
                
            @else
                <img src="https://via.placeholder.com/400x200" class="w-full h-48 object-cover" alt="Placeholder">
               
            @endif
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $item->title }}</h2>
                <p class="text-gray-600 mb-2">Starting Price: {{ number_format($item->starting_price, 2) }}taka</p>
                <div class="flex flex-wrap gap-1">
                    @foreach($item->categories as $category)
                    <span class="px-2 py-1 bg-blue-500 text-white text-sm rounded-full">{{ $category->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
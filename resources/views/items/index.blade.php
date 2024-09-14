@extends('layouts.app')

@section('content')
    <h1>Auction Items</h1>
    @foreach($items as $item)
        <div>
            <h3>{{ $item->title }}</h3>
            <p>{{ $item->description }}</p>
            <p>Starting Price: ${{ $item->starting_price }}</p>
            <p>Current Price: ${{ $item->current_price ?? $item->starting_price }}</p>
            <p>Auction Ends At: {{ $item->auction_end_time }}</p>
            <a href="{{ route('items.show', $item->id) }}">View Item</a>
        </div>
    @endforeach
@endsection

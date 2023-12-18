@extends('layouts.frontend')

@section('content')
    <!-- Brand Filter Form -->
    <form action="{{ route('products.filter') }}" method="GET">
        <label for="brand_id">Filter by Brand:</label>
        <select name="brand_id" id="brand_id">
            <option value="">All Brands</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->brandname }}</option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>
    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
                <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                    <img src="{{ url($product->image) }}" alt="" class="w-full max-h-60">
                    <div class="flex items-end justify-end w-full bg-cover">

                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                        <span class="mt-2 text-gray-500">MMK{{ $product->price }}</span>
                        <div><img src="/image/{{ $product->image }}" style="width:100%;height: 250px;"></div><br>
                        {{-- <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data"> --}}
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}" name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection

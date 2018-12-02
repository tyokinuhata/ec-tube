@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($foods as $food)
                <div class="m-2">
                    <img src="{{ $food->img }}" alt="" width="100">
                    <p class="h4 mt-2">{{ $food->name }}</p>
                    <p>{{ $food->description }}</p>
                    <form method="POST" action="{{ url('foods') }}" class="d-inline">
                        @csrf
                        <input type="hidden" value="{{ $food->id }}" name="item">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
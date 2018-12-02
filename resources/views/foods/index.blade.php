@extends('layouts.app')

@section('content')
    <div class="lanes-wrapper">
        <div class="lanes">
            @foreach($foods as $food)
                <div class="lane">
                    <div class="dish">
                        <img src="{{ $food->img }}" alt="" class="sushi" data-toggle="modal" data-target="#modal{{ $food->id }}">
                    </div>
                </div>

                <div class="modal fade" id="modal{{ $food->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $food->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">食べますか？</h5>
                            </div>
                            <div class="modal-body">
                                <p class="h4 mt-2">{{ $food->name }}</p>
                                <p>{{ $food->description }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">食べない</button>
                                <form method="POST" action="{{ url('foods') }}">
                                    @csrf
                                    <input type="number" class="form-control d-inline col-md-3" name="number" value="0">
                                    <input type="hidden" name="id" value="{{ $food->id }}">
                                    <button type="submit" class="btn btn-primary">食べる！</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
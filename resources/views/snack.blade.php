@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/delivery.css')}}">
@endsection

@section('main')
    <div class="section">
        <div class="snack">
            <h3>Закуски</h3>
            <div class="main-content">
                @foreach($data as $el)
                    <div class="item" id="{{ $el->id }}"  onclick="goto('{{$el->type}}', {{$el->id - 21}})">
                        <div class="t" style="background: url('{{asset('img/'.$el->src.'.png')}}');">
                            <div class="desc"><p class="text">{{ $el->desc }}</p></div>
                        </div>
                        <p>{{ $el->name }}</p>
                        <div class="btn">В КОРОБКУ</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/nav.js')}}"></script>
@endsection
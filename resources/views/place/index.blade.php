@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">

                <h2>All places</h2>
                <h4>Select category: <a href="{{ route('place.index') }}"> All</a>,
                    @foreach($categories as $category)
                        <a href="{{ route('categories.show',$category->id) }}"> {{ $category->name }}</a>,
                    @endforeach
                </h4>
                @foreach($places as $place)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src="/files/{{ $place->photo }}" class="img img-responsive" style="height: 200px; width: auto">
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('place.show',$place->id) }}">{{ $place->title }}</a><br>
                        <span class="glyphicon glyphicon-heart"></span><br>
                        ({{ $place->reviews }} reviews)<br>
                        <span class="glyphicon glyphicon-camera"></span> photos
                    </div>
                </div>
                </div>
                @endforeach


        </div>

    </div>

@endsection
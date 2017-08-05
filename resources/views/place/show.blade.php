@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
                <div class="col-lg-12">

                            <div class="col-md-7">
                                <h3>{{ $place->title }}</h3>
                                <b>{{ $place->category->name }} </b><br>
                                {{ $place->description }}
                            </div>
                            <div class="col-md-5">
                                <img src="/files/{{ $place->photo }}" class="img img-responsive" style="height: 200px; width: auto; float: right;">
                            </div>
                        </div>

            <h3>
                Gallery
            </h3>
            <hr style="border-color: #000000">
        </div>

    </div>

@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('data.news') }}</div>

                    <div class="panel-body">
                        <a href="{{ route('news.create') }}" type="button" class="btn btn-primary">Create a new</a>
                        @foreach($news as $new)
                            <blockquote>
                                <h5>{{ $new->topic }}</h5>
                                <p>{{ $new->content }}</p>
                                <footer> <cite title="Source Title">{{ $new->name }}</cite></footer>
                            </blockquote>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

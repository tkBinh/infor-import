@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>Make</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form method="POST" action="{{ route('informations.store') }}">
                @csrf
                <label>Face ID:</label>
                <input type="text" name="fb_id" class="form-control" />
                <label>Instagram:</label>
                <input type="text" name="instagram" class="form-control" />
                <input type="submit" class="btn btn-success mt-3" value="Save"/>
                <a href="{{ route('informations.index') }}" class="btn btn-secondary mt-3 ml-3">Home</a>
            </form>
        </div>
    </div>
@endsection

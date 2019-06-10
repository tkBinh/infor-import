@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>Edit</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form method="POST" action="{{ route('informations.update', $infor->id) }}">
                {{ method_field('PUT') }}
                @csrf
                <label>Face ID:</label>
                <input type="text" name="fb_id" class="form-control" value="{{ $infor->fb_id }}" />
                <label>Instagram:</label>
                <input type="text" name="instagram" class="form-control" value="{{ $infor->instagram }}" />
                <input type="submit" class="btn btn-success mt-3" value="Save"/>
            </form>
        </div>
    </div>
@endsection

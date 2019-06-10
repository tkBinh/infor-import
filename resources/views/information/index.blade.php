@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            @if(session()->has('message'))
                <div class="row alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <a href="{{ route('informations.create') }}" class="btn btn-lg btn-primary mb-3">+</a>
                @if($total != 0)
                    <div class="alert alert-secondary ml-3">Đang có thông tin của {{ $total }} người</div>
                @endif
            </div>
            <div class="row justify-content-center">
                <table class="table table-bordered table-dark">
                    <tr>
                        <th width="10%">STT</th>
                        <th>Face ID</th>
                        <th>Instagram</th>
                        <th colspan="2" width="30%"></th>
                    </tr>
                    @forelse($infors as $infor)
                        <tr>
                            <td>{{ $infor->id }}</td>
                            <td>{{ $infor->fb_id }}</td>
                            <td>{{ $infor->instagram }}</td>
                            <td class="text-center">
                                <a href="{{ route('informations.edit', $infor->id) }}"
                                   class="btn btn-info">Edit</a>
                            </td>
                            <td class="text-center">
{{--                                <form method="POST" action="{{ route('informations.destroy', $infor->id) }}">--}}
{{--                                    @csrf--}}
{{--                                    {{ method_field('DELETE') }}--}}
{{--                                    <input type="submit" value="Delete" onclick="return confirm('Are you sure')"--}}
{{--                                           class="btn btn-sm btn-danger">--}}
{{--                                </form>--}}
                                <a class="delete btn btn-success" href="#" id="{{ $infor->id }}">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data found</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection

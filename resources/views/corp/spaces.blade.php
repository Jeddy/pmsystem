@extends('layouts.app')
@section('title', '工作空间')

@section('content')

@if(count($spaces) > 0)

<div class="spaces-list row">
    @foreach($spaces as $space)
    <div class="col-xs-6 col-md-3">
        <a href="{{ route('space.index', ['space' => $space->space_id]) }}" class="thumbnail">
            <img src="{{ $space->thumb }}">
            <h5>{{ $space->name }}</h5>
        </a>
    </div>
    @endforeach
</div>

@else

<a href="{{ route('space.create') }}">创建一个空间</a>

@endif

@stop
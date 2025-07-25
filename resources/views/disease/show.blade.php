@extends('layouts.app')

@section('title', __('messages.diseases'))

@section('content')
    <h1>{{ $disease->name }}</h1>
    <p>{{ $disease->description }}</p>
@endsection

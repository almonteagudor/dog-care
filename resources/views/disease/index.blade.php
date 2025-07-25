@extends('layouts.app')

@section('title', __('messages.diseases'))

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        <x-new-item-card :route="route('diseases.create')" />
        @foreach($diseases as $disease)
            <x-description-item-card
                :name="$disease->name"
                :description="$disease->description"
                :createdAt="$disease->created_at->diffForHumans()"
                :editUrl="route('diseases.edit', $disease)"
                :deleteUrl="route('diseases.destroy', $disease)"
            />
        @endforeach
    </div>
@endsection

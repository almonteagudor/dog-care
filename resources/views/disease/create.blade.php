@extends('layouts.app')

@section('title', __('messages.diseases'))

@section('content')
    <x-forms.form
        :action="route('diseases.store')"
        :buttonLabel="__('messages.create')"
        method="POST"
    >
        <x-forms.string-input
            id="name"
            :label="__('messages.name')"
            name="name"
            :placeholder="__('messages.name')"
            :value="old('name')"
        />
        <x-forms.string-input
            :id="'description'"
            :label="__('messages.description')"
            :name="'description'"
            :placeholder="__('messages.description')"
            :value="old('description')"
        />
    </x-forms.form>
@endsection

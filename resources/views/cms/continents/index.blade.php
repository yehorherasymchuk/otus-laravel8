@extends('layouts.layout')

@section('title', __('messages.continents'))

@section('content')

<div class="container">

    @php
        $breadcrumbs = [
            [
                'url' => route('home'),
                'title' => __('messages.home'),
            ],
            [
                'url' => route('cms.continents.index', ['locale' => $locale]),
                'title' => __('messages.continents'),
            ],
        ];
    @endphp
    @include('blocks.breadcrumbs.index', ['breadcrumbs' => $breadcrumbs, 'active' => 'continents',])
    @include('cms.continents.blocks.header.list')
    @include('cms.continents.blocks.list.index')
</div>
@endsection

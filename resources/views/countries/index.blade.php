@extends('layouts.layout')

@section('title', __('messages.countries'))

@section('content')

<div class="container">
    @php
        $breadcrumbs = [
            [
                'url' => route('home'),
                'title' => __('messages.home'),
            ],
            [
                'url' => route('cms.countries.index', ['locale' => App::getLocale()]),
                'title' => __('messages.countries'),
            ],
        ];
    @endphp
    @include('blocks.breadcrumbs.index', ['breadcrumbs' => $breadcrumbs, 'active' => 'countries',])
    @include('countries.blocks.header.list')
    @include('countries.blocks.filters.index')
    @include('countries.blocks.list.index')
</div>
@endsection

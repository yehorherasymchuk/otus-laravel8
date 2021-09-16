@extends('layouts.layout')

@section('title', __('messages.products'))

@section('content')

    <div class="container">

        @php
            $breadcrumbs = [
                [
                    'url' => '/',
                    'title' => __('messages.home'),
                ],
                [
                    'url' => route('cms.continents.index', ['locale' => $locale]),
                    'title' => __('messages.continents'),
                ],
                [
                    'title' => __('messages.addContinent'),
                ],
            ];
        @endphp
        @include('blocks.breadcrumbs.index', ['breadcrumbs' => $breadcrumbs])
        @include('cms.continents.blocks.header.create')

        @include('cms.continents.blocks.form.create')
    </div>
@endsection

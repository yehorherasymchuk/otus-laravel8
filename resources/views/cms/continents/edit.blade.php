@extends('layouts.layout')

@section('title', __('messages.continents'))

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
                    'title' => __('messages.editContinent'),
                ],
            ];
        @endphp
        @include('blocks.breadcrumbs.index', ['breadcrumbs' => $breadcrumbs])
        @include('cms.continents.blocks.header.edit')
        @include('cms.continents.blocks.form.edit')
    </div>
@endsection

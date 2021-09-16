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
                    'url' => route('cms.countries.index', ['locale' => $locale]),
                    'title' => __('messages.countries'),
                ],
                [
                    'title' => __('messages.addCountry'),
                ],
            ];
        @endphp
        @include('blocks.breadcrumbs.index', ['breadcrumbs' => $breadcrumbs])
        @include('countries.blocks.header.create')

        @can(\App\Models\Country::class, 'edit')
            @include('countries.blocks.form.create')
        @else
            @include('countries.blocks.form.create')
        @endcan
    </div>
@endsection

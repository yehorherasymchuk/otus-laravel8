@extends('layouts.layout')

@section('title', __('messages.counrties'))

@section('content')

    <div class="container">

        @php
            $breadcrumbs = [
                [
                    'url' => route('home'),
                    'title' => __('messages.home'),
                ],
                [
                    'url' => \App\Services\Routes\Providers\Api\ApiRoutesProvider::countries(),
                    'title' => __('messages.counties'),
                ],
            ];
        @endphp
        @include('blocks.breadcrumbs.index', ['breadcrumbs' => $breadcrumbs])
        @include('cms.companies.blocks.header.list')
        @include('cms.companies.blocks.list.index', ['companies' => $companies])
    </div>
@endsection

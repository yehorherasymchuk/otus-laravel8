@extends('layouts.layout')

@section('title', __('messages.products'))

@section('content')

<div class="container">

    @php
        $breadcrumbs = [
            [
                'url' => route('home'),
                'title' => __('messages.home'),
            ],
            [
                'url' => route(\App\Services\Routes\Providers\CMS\CMSRoutes::CMS_COMPANIES_INDEX, ['locale' => App::getLocale()]),
                'title' => __('messages.companies'),
            ],
        ];
    @endphp
    @include('blocks.breadcrumbs.index', ['breadcrumbs' => $breadcrumbs])
    @include('cms.companies.blocks.header.list')
    @include('cms.companies.blocks.filters.index')
    @include('cms.companies.blocks.list.index', ['companies' => $companies])
</div>
@endsection

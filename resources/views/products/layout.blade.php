<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Fridge</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/products/app.css?{{time()}}">
    @yield('styles')
</head>
<body>


@yield('navbar')
@section('navbar')
    @include('products.blocks.navbar.index')
@endsection

<div class="container">
    @yield('content')

</div>

@include('products.blocks.footer.index')

<script src="{{ mix('/js/app.js') }}"></script>
@stack('scripts')

</body>
</html>

@extends('plain.layout')

@section('content')
    <h1>Includes</h1>
    @include('plain.blocks.nav.index')
    @include('plain.blocks.includes.check-overwrite', ['a' => 6])
    @isset($a)
        A final is: {{ $a }}<br>
    @endisset

@endsection

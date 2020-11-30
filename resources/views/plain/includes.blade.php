@extends('plain.layout')

@section('content')
    <h1>Includes</h1>
    @php($a = 3)
    @include('plain.blocks.nav.index')
    @include('plain.blocks.includes.check-overwrite', ['a' => 6])
    A final is: {{ $a }}<br>

@endsection

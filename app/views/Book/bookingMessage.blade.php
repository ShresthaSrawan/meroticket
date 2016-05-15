@extends('layouts.default')

@section('title')

Mero Ticket | Error Booking

@stop

@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a>
        </li>
        <li><a href="{{route('home')}}">Search Bus</a>
        </li>
        <li class="active">Message</li>
    </ul>
    <br>
    {{$message}}
</div>
@stop


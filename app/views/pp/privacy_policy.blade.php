@extends('layouts.default')

@section('title')

Mero Ticket | Privacy Policy

@stop

<?php
$pp_page = 1;
?>

@section('content')
<div class="container">
    <br>
    @if(Auth::user()->check())
        <h3>
            Hello {{ucwords(Auth::user()->get()->firstName)}}, <br>
            We are very glad to see you here. Following are our Privacy Policy please read it carefully:
        </h3>
        <hr>
        <?php $i=1;?>
        @foreach($PPs as $pp)
            <strong style="font-size:1.5em;">{{$i.'. '.$pp['header']}}</strong><br>
            <div style="text-align:justify;">{{$pp['description']}}</div><br><br>
            <?php $i++;?>
        @endforeach 
    @elseif(Auth::admin()->check())
        <h3>
            Hello Admin, <br>
        </h3>
        <hr>
        <?php $i=1;?>
        @foreach($PPs as $pp)
            <strong style="font-size:1.5em;">{{$i.'. '.$pp['header']}}</strong><br>
            <div style="text-align:justify;">{{$pp['description']}}</div><br><br>
            <?php $i++;?>
        @endforeach

    @elseif(isset($message))
        <h3>
            {{$message}} <br>
        </h3>
    @else
        <h3>
            Hello Guest, <br>
            We are very glad to see you here. Following are our Privacy Policy please read it carefully:
        </h3>
        <hr>
        <?php $i=1;?>
        @foreach($PPs as $pp)
            <strong style="font-size:1.5em;">{{$i.'. '.$pp['header']}}</strong><br>
            <div style="text-align:justify;">{{$pp['description']}}</div><br><br>
            <?php $i++;?>
        @endforeach 
    @endif

</div>
<div class="gap"></div>
@stop


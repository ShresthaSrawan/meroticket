@extends('layouts.default')

@section('title')

Mero Ticket | Terms and Condition

@stop

<?php
$tm_page = 1;
?>

@section('content')
<div class="container">
    <br>
    @if(Auth::user()->check())
        <h3>
            Hello {{ucwords(Auth::user()->get()->firstName)}}, <br>
            We are very glad to see you here. Following are our Terms and Conditions please read it carefully:
        </h3>
        <hr>
        <?php $i=1;?>
        @foreach($tds as $td)
            <strong style="font-size:1.5em;">{{$i.'. '.$td['header']}}</strong><br>
            <div style="text-align:justify;">{{$td['description']}}</div><br><br>
            <?php $i++;?>
        @endforeach 
    @elseif(Session::get('message'))
        <h3>
            Hello there! We are very glad to see you here. Unfortunetly Terms and Condition of Mero Ticket is not currently available :( <br>
        </h3>
    @else
        <h3>
            Hello Guest, <br>
            We are very glad to see you here. Following are our Terms and Conditions please read it carefully:
        </h3>
        <hr>
        <?php $i=1;?>
        @foreach($tds as $td)
            <strong style="font-size:1.5em;">{{$i.'. '.$td['header']}}</strong><br>
            <div style="text-align:justify;">{{$td['description']}}</div><br><br>
            <?php $i++;?>
        @endforeach 
    @endif

</div>
<div class="gap"></div>
@stop


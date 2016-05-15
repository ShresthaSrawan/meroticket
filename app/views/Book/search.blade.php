@extends('layouts.default')

@section('title')

Mero Ticket | Search

@stop

<?php
$search_page = 1;
?>

@section('content')

<div class="container">
    <h1 class="page-title">Search Bus</h1>
</div>

<div class="container">
{{ Form::open((array('route'=>'search'))) }}
    <div class="input-daterange" data-date-format="yyyy M d">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>From</label>
                    <input class="typeahead form-control" placeholder="City" name="from" type="text" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                    <label>To</label>
                    <input class="typeahead form-control" placeholder="City" name="to" type="text" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                            <label>Date</label>
                            <input class="form-control" name="start" type="text" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <input class="btn btn-primary mt10" type="submit" value="Search for Bus" />
{{ Form::close() }}
<div class="gap gap-small"></div>

</div>
@stop
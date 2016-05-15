
@extends('layouts.default')

@section('title')

Mero Ticket | Select Seat

@stop

@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a>
        </li>
        <li><a href="">Select Seat</a>
        </li>
        <li>{{$result['busname']}}</li>
    </ul>
    <div class="booking-item-details">
        <header class="booking-item-header">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="lh1em">{{ucwords($result['busname'])}}</h2>
                    <ul class="list list-inline text-small">
                        <li><a href="#"><i class="fa fa-envelope"></i> Contact Bus Company</a></li>
                        <li><i class="fa fa-phone"></i> {{ $result['contact_number'] }}</li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="gap gap-small"></div>
        <div class="row row-wrap">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{URL::to('/').'/'.$result['image']}}" alt="Image Alternative text" title="Image Title" />
                    </div>
                    <div class="col-md-7">
                        <div class="booking-item-price-calc">
                            <div class="row row-wrap">
                                {{ Form::open(array('route'=>'postBookingTicket')) }}

                                    <h4>Fill up the following Information.</h4>
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="active"><a href="#tab" data-toggle="tab">Select Seat</a>
                                            </li>                                    
                                        </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab"> 

<!--*********************************************************************************************************************************** 
                                            Creating Dynamic Table for selecting seat: powered by Mero Ticket
 ***********************************************************************************************************************************-->                                      
                                        <p>Please select the seat</p>
                                        <div class="seatings row">
                                            <table class="table">
                                                <tr>
                                                    <th><center>Side A</center></th>
                                                    <th>&nbsp;&nbsp;</th>
                                                    <th>&nbsp;&nbsp;</th>                                            
                                                    <th><center>Side B</center></th>
                                                    <th>&nbsp;&nbsp;</th>
                                                    <th>&nbsp;&nbsp;</th>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>                                                                                                
                                                    @for($i=1;$i<=$result['front_seat'];$i++)
                                                        <td><label for = "f{{$i}}">F{{$i}}<input value="f{{$i}}" name="seat[]" class="i-check seats" type="checkbox" id="f{{$i}}"></label></td>
                                                    @endfor
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="side-a col-sm-6 col-xs-6">
                                                <?php $count=1 ;?>
                                                @for($i=1;$i<=$result['side_a'];$i+=2)
                                                    <div class='row seat-row'>
                                                        <div class="col-sm-6 col-xs-6"><label for = "a{{$count}}">A{{$count}}<input value="a{{$count}}" name="seat[]" class="i-check seats" type="checkbox" id="a{{$count}}"></label></div>
                                                            <?php $count++ ?>
                                                        <div class="col-sm-6 col-xs-6"><label for = "a{{$count}}">A{{$count}}<input value="a{{$count}}" name="seat[]" class="i-check seats" type="checkbox" id="a{{$count}}"></label></div>
                                                         <?php $count++ ?>
                                                    </div>
                                                @endfor
                                            </div>
                                            <input type="hidden" name="bookingid" value="{{$bookingid}}">
                                            <input type="hidden" name="ticket_price" value="{{$ticket_price}}">
                                            <input type="hidden" name="student" value="{{$student}}">
                                            <input type="hidden" name="adults" value="{{$adults}}">
                                            <input type="hidden" name="kids" value="{{$kids}}">
                                            <input type="hidden" name="elder" value="{{$elder}}">
                                            <input type="hidden" name="luggage" value="{{$luggage}}">
                                            <input type="hidden" name="date" value="{{$date}}">


                                            <div class="side-b col-sm-6 col-xs-6">
                                                <?php $count=1 ;?>
                                                @for($i=1;$i<=$result['side_b'];$i+=2)

                                                    <div class='row seat-row'>
                                                        <div class="col-sm-6 col-xs-6"><label for = "b{{$count}}">B{{$count}}<input value="b{{$count}}" name="seat[]" class="i-check seats" type="checkbox" id="b{{$count}}"></label></div>
                                                            <?php $count++ ?>
                                                        <div class="col-sm-6 col-xs-6"><label for = "b{{$count}}">B{{$count}}<input value="b{{$count}}" name="seat[]" class="i-check seats" type="checkbox" id="b{{$count}}"></label></div>
                                                            <?php $count++ ?>
                                                    </div>
                                                    
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="row">
                                            <table class="table">
                                                <tr>
                                                    @for($i=1;$i<=$result['back_seat'];$i++)
                                                    <td>
                                                        <label for = "bs{{$i}}">BS{{$i}}<input value="bs{{$i}}" name="seat[]" class="i-check seats" type="checkbox" id="bs{{$i}}"></label>
                                                    </td>
                                                    @endfor
                                                </tr>
                                            </table>
                                        </div>
                                </div>

<!--*********************************************************************************************************************************** 
                                            End of Creating Dynamic Table
 ***********************************************************************************************************************************-->

                                    </div><!-- End of tab -->
                                    
                                </div>
                            </div> 
                                    <br>
                                    <center><input class="btn btn-primary" type="submit" value="Book Ticket" /></center>
                                    {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
<!-- 
-->
@section('bottom-script')
    <script type="text/javascript">
    $(document).ready(function(){
        
        checkSeats();
        var refreshId = setInterval( function() {
            checkSeats();
        },5000);
        
    function checkSeats () {
        // body...
        $.ajax({
                type: "GET",
                url:"{{route('seatcheck')}}",
                data: { bookingid:"{{$bookingid}}", date:"{{$result['date']}}"},
                success: function(msg){
                    reservedSeats = msg;
                    $('.seats').each(function(e){
                        seatid= $(this).attr('id');
                        if(reservedSeats.indexOf(seatid)!=-1)
                        {
                            $(this).attr('disabled','disable');
                            $(this).parent().addClass('disabled checked');
                        }
                    });
                }
            });
    }
    });
    </script>
@stop
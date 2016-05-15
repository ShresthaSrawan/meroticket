
@extends('master')

@section('title')
  Mero Ticket::Admin - Add Bus
@stop

@section('dropdown-active')
   active       
@stop

@section('add-bus-class')
   active       
@stop

@section('content')
  <h1 class="page-header">Add Bus Information</h1>
 
  @if(Session::get('message')!==null)
    <h3>{{Session::get('message')}}</h3>
    <a href="{{route('getAddBus')}}"><button class="btn btn-primary">Add Another Bus</button></a>
  @else
    <div class="container">
      @if($busType_info!==null)
      {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postAddBus', 'files'=> true)) }}
        <fieldset>
          <legend>Please provide the correct information</legend>


          <div class="form-group">
            <label for="busName" class="col-lg-2 control-label">Bus Name</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="busname" id="busName" placeholder="e.g. Ugratara">
              <span class="error-display"><i style='color: red;'>  {{$errors->first('busname')}}</i></span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Bus Type</label>
            <div class="col-lg-10">
              <select name="bustype" class="form-control">
                
                  <option value="">Choose the type of your bus</option>
                  @foreach($busType_info as $busTypeInfo)
                    <option value="{{$busTypeInfo['id']}}">{{ucfirst($busTypeInfo['name'])}}</option>
                  @endforeach
                                                         
              </select>
            </div>
          </div>
          <!-- <input type="hidden" value="{{Auth::id()}}" name="user_id"> -->          
          <div class="form-group">
            <label for="busNumber" class="col-lg-2 control-label">Bus Number</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="busnumber" id="busNumber" placeholder="e.g. Bs 1 pa 2224">
              <span class="error-display"><i style='color: red;'>  {{$errors->first('busnumber')}}</i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="image" class="col-lg-2 control-label">Image</label>
            <div class="col-lg-10">
              <input type="file" class="form-control" name="image">
              <span class="error-display"><i style='color: red;'>  {{$errors->first('image')}}</i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="frontSeat" class="col-lg-2 control-label">Front Row Seat</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="frontseat" id="frontseat" placeholder="e.g. 2">
              <span class="error-display"><i style='color: red;'>  {{$errors->first('frontseat')}}</i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="sideA" class="col-lg-2 control-label">Side A</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="sideA" id="sideA" placeholder="e.g. 14">
              <span class="error-display"><i style='color: red;'>  {{$errors->first('side_a')}}</i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="sideB" class="col-lg-2 control-label">Side B</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="sideB" id="sideB" placeholder="e.g. 14">
              <span class="error-display"><i style='color: red;'>  {{$errors->first('side_b')}}</i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="backRow" class="col-lg-2 control-label">Back Row Seat</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="backseat" id="backseat" placeholder="e.g. 5">
              <span class="error-display"><i style='color: red;'>  {{$errors->first('backseat')}}</i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Description of the bus</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="3" name="description" id="textArea" placeholder="Description about your bus..."></textarea>  
              <span class="error-display"><i style='color: red;'>  {{$errors->first('description')}}</i></span>          
            </div>
          </div>    
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </fieldset>
      {{ Form::close() }}
      @else
        <h3><i class="fa fa-exclamation-triangle"></i> You have not added any bus type, Please add the type of bus first.</h3>
      @endif
    </div>
  @endif  
@stop
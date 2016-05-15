@extends('master')

@section('title')
Mero Ticket::Admin - View Bus
@stop

@section('content')
<h1 class="page-header">Bus Details</h1>
@if($results==null)
<h3><i class="fa fa-exclamation-triangle"> You have not added any bus yet.</h3>
@elseif($bustypes==null)
<h3><i class="fa fa-exclamation-triangle"> You have not added any bus type yet.</h3>
@else
<div class="container">
  @if(Session::get('message')!==null)
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Success!</strong> {{Session::get('message')}}.
  </div>
  @endif
</div>
<div class="container">     

  <h3>You can edit and delete the record</h3>
  <table class="table">
    <tr>
      <th>#</th>
      <th>Bus Name</th>
      <th>Image</th>
      <th>Bus Number</th>
      <th>Company name</th>
      <th>Bus Type</th>
      <th>Front Seat</th>
      <th>Side A</th>
      <th>Side B</th>
      <th>Back Seat</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
    <?php $i=1?>        
    @foreach($results as $result)
    <tr>
      <td>
        {{$i}}
      </td>
      <td>{{ucwords($result['busname'])}}</td>
      <td><img src="{{URL::to('/').'/'.$result['busimage']}}" height="100"></td>
      <td>{{$result['busnumber']}}</td>
      <td>{{ucwords($result['companyname'])}}</td>
      <td>
        @foreach($bustypes as $bustype)
        {{$result['bustypeid']==$bustype['bustypeid'] ? $bustype['bustypename']:''}}
        @endforeach
      </td>
      <td>{{$result['front']}}</td>
      <td>{{$result['sideA']}}</td>
      <td>{{$result['sideB']}}</td>
      <td>{{$result['back']}}</td>
      <td>{{(strlen($result['busdescription'])>10)? substr($result['busdescription'],0,10)."...." : $result['busdescription']}}</td>
      <td>
        <a href="#editBus{{$result['busid']}}-MeroTicket" data-toggle="modal"><button type="submit" class="btn btn-primary" ><i class="fa fa-pencil"></i> Edit</button></a>

        <!-- start Edit Model -->
        <div class="modal" id="editBus{{$result['busid']}}-MeroTicket">
          <div class="modal-dialog">
            <div class="modal-content">
              {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postEditBus', 'files'=> true)) }}
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-pencil"></i> | Edit Bus</h4>
              </div>
              <div class="modal-body">
                <fieldset>
                  <div class="form-group">
                    <label for="inputid" class="col-lg-2 control-label">Bus id</label>
                    <div class="col-lg-10">
                      <input type="hidden" class="form-control" id="inputid" name="id" value="{{$result['busid']}}">
                      <input type="text" class="form-control" value="{{$result['busid']}}" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Bus Name</label>
                    <div class="col-lg-10">                              
                      <input type="text" class="form-control" name="busname" value="{{$result['busname']}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Bus Type</label>
                    <div class="col-lg-10">
                      <select name="bustype" class="form-control">
                        @foreach($bustypes as $bustype)
                        
                          <option value="{{$bustype['bustypeid']}}" <?php echo $result['bustypeid']!==$bustype['bustypeid'] ? 'selected':''?>>{{$bustype['bustypename']}}</option> 
                        
                        @endforeach
                      </select>
                    </div>
                  </div>          
                  
                  <div class="form-group">
                    <label for="image" class="col-lg-2 control-label">Image</label>
                    <div class="col-lg-10">
                      <input type="file" class="form-control" name="image">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="frontSeat" class="col-lg-2 control-label">Front Row Seat</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="frontseat" value="{{$result['front']}}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sideA" class="col-lg-2 control-label">Side A</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="sideA" value="{{$result['sideA']}}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sideB" class="col-lg-2 control-label">Side B</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="sideB" value="{{$result['sideB']}}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="backRow" class="col-lg-2 control-label">Back Row Seat</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="backseat" value="{{$result['back']}}" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Bus Number</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="busnumber" value="{{$result['busnumber']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Description of the bus</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" name="description">{{$result['busdescription']}}</textarea>            
                    </div>
                  </div>                             
                </fieldset>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
        <!-- End of Edit Modal -->

        <a href="#deleteBus" data-toggle="modal"><button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Trash</button></a>
        {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteBus')) }}
        <!-- start Delete Model -->
        <div class="modal" id="deleteBus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4><i class="fa fa-exclamation-triangle"></i> Are you sure want to move "{{ucfirst($result['busname'])}}" to trash?</h4>                    
              </div>
              <input type="hidden" class="form-control" name="id" value="{{$result['busid']}}">

              <div class="modal-footer">                      
                <button type="submit" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div><!--End of Delete Modal-->
        {{ Form::close() }}
      </td>
    </tr>
    <?php $i++?>
    @endforeach

  </table>
</div>
@endif  
@stop
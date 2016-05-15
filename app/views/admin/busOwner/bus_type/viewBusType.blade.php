@extends('master')

@section('title')
  Mero Ticket::Admin - Add Bus Type
@stop

@section('dropdown-active-bus_type')
  active
@stop

@section('edit-bus-class')
  active
@stop
@section('content')
 
  <h1 class="page-header">Adding Information of Bus Type</h1>
  @if(Session::get('message')!==null)
    <h3>{{Session::get('message')}}</h3>
    
  @endif
  <div class="container">
  
    @if($busTypes==null)

      <h3><i class="fa fa-exclamation-triangle"></i> You have not added any bus type yet. </h3>

    @else

    <table class="table">
      <tr>
        <th>#</th>
        <th>Bus Type Name</th>
        <th>Action</th>
      </tr>

      <?php $i=1; ?>
      @foreach($busTypes as $bustype)
        <tr>
          <td>{{$i}}</td>
          <td>{{ucwords($bustype['name'])}}</td>
          <td>
            <a href="#editBus{{$bustype['id']}}-MeroTicket" data-toggle="modal"><button type="submit" class="btn btn-primary" ><i class="fa fa-pencil"></i> Edit</button></a>
            
            <!-- start Edit Model -->
            <div class="modal" id="editBus{{$bustype['id']}}-MeroTicket">
              <div class="modal-dialog">
                <div class="modal-content">
                {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postEditBustype')) }}
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class="fa fa-pencil"></i> | Edit Bus Type</h4>
                  </div>
                  <div class="modal-body">
                  
                      <fieldset>
                        <div class="form-group">
                          <label for="inputid" class="col-lg-2 control-label">Name</label>
                          <div class="col-lg-10">
                            <input type="hidden" class="form-control" name="id" value="{{$bustype['id']}}">
                            <input type="text" class="form-control" name="bustypename" value="{{$bustype['name']}}">
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
             <!-- Edit Modal ends here -->

             <a href="#deleteBus{{$bustype['id']}}-MeroTicket" data-toggle="modal"><button type="submit" class="btn btn-primary" ><i class="fa fa-trash-o"></i> Delete</button></a>
            
            <!-- start Edit Model -->
            <div class="modal" id="deleteBus{{$bustype['id']}}-MeroTicket">
              <div class="modal-dialog">
                <div class="modal-content">
                {{ Form::open(array('class'=>'form-horizontal', 'route'=>'postDeleteBustype')) }}
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class="fa fa-trash-o"></i> | Delete Bus Type</h4>
                  </div>
                  <div class="modal-body">
                      <fieldset>
                        <i class="fa fa-exclamation-triangle"></i> Are you sure want to move "{{ucwords($bustype['name'])}}" to trash?                         
                        <input type="hidden" value="{{$bustype['id']}}" name="bustypeid">
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

          </td>
        </tr>
        <?php $i++;?>
      @endforeach
    </table>
     
    @endif
  </div>
   
@stop
@extends('backend.layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form>
                        <div class="form-row">
                            <div class="col-2">
                                <label for="" class="col-form-label">Code No:</label>
                            </div>
                            <div class="col-7">
                                <select class="form-select form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-3">
                                {{-- <input type="button" class="form-control" value="Add"> --}}
                                <button class="btn btn-secondary  px-4 form-control"><i class="las la-plus"></i>
                                    Add</button>
                            </div>
                        </div>

                        <div class="form-row mt-1">
                            <div class="col-2">
                                <label for="" class="col-form-label">Name:</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt-1">
                            <div class="col-2">
                                <label for="" class="col-form-label">Type:</label>
                            </div>
                            <div class="col-7">
                                <select class="form-select form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-3">
                                {{-- <input type="button" class="form-control" value="show"> --}}

                               
                                <button  type="button" class="btn btn-secondary  px-4 form-control"  data-toggle="modal" data-target="#showcoatype"><i class="las la-eye"></i>

                                    Show</button>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-2">
                                <label for="" class="col-form-label">Trial Balance Group:</label>
                            </div>
                            <div class="col-7">
                                <select class="form-select form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-2">
                                <label for="" class="col-form-label">Remarks:</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-2">
                                <label for="" class="col-form-label">Opening Balance:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-2 text-center mt-1">
                              <span class="mt-1">At</span>
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-2">

                            </div>
                            <div class="col-8">
                                <button class="btn btn-success"> <i class="fa fa-floppy-o"
                                        aria-hidden="true"></i>Save</button>
                                <button class="btn btn-danger"> <i class="fa fa-floppy-o"
                                        aria-hidden="true"></i>Delete</button>
                                <button class="btn btn-warning"> <i class="fa fa-floppy-o"
                                        aria-hidden="true"></i>Clear</button>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row">
              <div class="table-responsive" style="height:400px" >
                <table class="table table-striped table-bordered mt-2">
                    <thead>
                        <tr>
                            <th scope="col">HeadID</th>
                            <th scope="col">HeadName</th>
                            <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
              </div>

            </div>
            <hr>

        </div>
    </section>
    <!--Model-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Chat of Account Type</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <form action="{{ route('create_coa_type') }}" method="POST">
                  @csrf
                  <div class="form-row">
                      <div class="col-2">
                          <label for="" class="col-form-label">Type Name</label>
                      </div>
                      <div class="col-10">
                          <input type="text" class="form-control" name="type_name" id="type_name" required>
                      </div>
                      @error('type_name')
                         <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                  </div>
                  <div class="form-row">
                      <div class="col-2">
                          <label for="" class="col-form-label">Destination</label>
                      </div>
                      <div class="col-10">
                        <input type="text" name="Destination" class="form-control" id="Destination" required>
                      </div>
                      @error('Destination')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="form-row">
                      <div class="col-2"></div>
                      <div class="col-3 mt-1">
                          {{-- <input type="button" class="form-control" value="Save"> --}}
                          <button class="btn btn-success" id="addsdfsf">Save</button>
                      </div>
                  </div>


              </form>

              </div>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!---Show --->
    <!-- Modal -->
<div class="modal fade" id="showcoatype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chat of type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
              <form>
                  <div class="form-row">
                      <div class="col-2">
                          <label for="" class="col-form-label">Type ID</label>
                      </div>
                      <div class="col-5">      
                          <select class="form-select form-control" id="select_type_id">
                            @foreach($coa_types as  $type)
                              <option value="{{ $type->id}}">{{ $type->id}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="col-5">
                          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"><i class="las la-plus"></i>Add</button>
                      </div>
                  </div>

                  <div class="form-row mt-1">
                      <div class="col-2">
                          <label for="" class="col-form-label">Type Name</label>
                      </div>
                      <div class="col-10">
                          <input type="text" class="form-control">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-2">
                          <label for="" class="col-form-label">Destination</label>
                      </div>
                      <div class="col-10">
                        <select class="form-select form-control" id="coa_destination">

                      </select>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-2"></div>
                      <div class="col-3 mt-1">
                          {{-- <input type="button" class="form-control" value="Save"> --}}
                          <button class="btn btn-success" id="addcoadtypesf">Save</button>
                      </div>
                  </div>


              </form>

          </div>
      </div>
      <div class="row">
        <div class="table-responsive" style="height:400px" >
          <table class="table table-striped table-bordered mt-2">
              <thead>
                  <tr>

                      <th scope="col">Type ID</th>
                      <th scope="col">Type</th>
                      <th scope="col">Destination</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($coa_types as  $type)
                <tr>
                  <td>{{ $type->id }}</td>
                  <td>{{ $type->type_name }}</td>
                  <td>{{ $type->Destination }}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
$("#select_type_id").change(function(){
  var value= $(this).val();
  // alert(value);
  var url="{{ route('loadcoadataajax') }}";
  var html="";

  $.post( url, { value: value, _token: "{{ csrf_token() }}" })
  .done(function( data ) {
  html ="<option value="+data.id+">"+data.Destination+"</option";
   $("#coa_destination").html(html);
  });
});
$("#addsdfsf").click(function(e){
  e.preventDefault();
  var Destination = $("#Destination").val();
  var type_name = $("#type_name").val();
  var url=   "{{ route('create_coa_type') }}"
  if(Destination == null && type_name==null )
  {
    alert("Requied Data")
  }else{
    $.post( url, { Destination: Destination,type_name:type_name, _token: "{{ csrf_token() }}" })
    .done(function( data ) {
      $("#exampleModal").modal('hide');
      

    });
  }


});
</script>
@endsection

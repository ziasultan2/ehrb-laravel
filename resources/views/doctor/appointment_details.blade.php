@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <form  action="{{url('/doctor/appointment')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="disease">Disease</label>
                          <input type="text" class="form-control" id="disease" name="disease_name">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Observatiion:</label>
                          <input type="text" class="form-control" id="observation" name="observation">
                        </div>
                        <div class="test">
                            <div class="form-group">
                                <div class="form-group">
                                    <h4 class="col-md-4" for="pwd"> Test:</h4>
                                </div>
                            </div>
                        </div>

                        <a href="#" id="add"><i  class="fa fa-plus-circle iIcon"></i></a>
                        <div id="boxes-wrap">
                            <div>
                              <div class="form-group d-flex">
                                <select class="form-control input-sm" name="test[]">
                                    <option value="">Select Test</option>
                                    @foreach ($test as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>

                                <button class="remove-gas-row" type="button"><i class="fa fa-minus-circle"></i></button>
                              </div>
                              
                            </div>
                          </div>
                          
                          {{-- Medicine --}}


                        
                          <div class="Medicine">
                            <div class="form-group">
                                <div class="form-group">
                                    <h4 class="col-md-4" for="pwd">Medicine:</h4>
                                </div>
                            </div>
                        </div>
                        <a href="#" id="addMedicine"><i  class="fa fa-plus-circle iIcon"></i></a>
                        <div id="medicines-wrap">
                            <div>
                                <div class="form-group d-flex">
                                <select class="form-control input-sm" name="medicine[]">
                                    <option value="">Select Medicine</option>
                                    @foreach ($medicine as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <input name="duration[]" type="text" class="name col-md-3" placeholder="DAYS"> 

                                <button class="remove-medicine-row " type="button"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                <textarea name="dose[]" type="text" class="name col-md-8" placeholder="Dose"> </textarea>
                                
                            </div>
                        </div>
                          
                        <div class="form-group">
                            <label for="pwd">Precaution:</label>
                            <input type="text" class="form-control" id="observation" name="precaution">
                        </div>

                          <div class=" text-center" ><button type="submit" class="btn btn-success col-md-6 ">Submit</button></div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .i.fa.fa-plus-circle.iIcon{
        font-size: 25px!important;
    }
</style>

<script>
    $(document).ready(function () {
        var testCount = 1; 
        var medicineCount = 1; 

  var boxesWrap = $('#boxes-wrap');
  var boxRow = boxesWrap.children(":first");


  var medicinesWrap = $('#medicines-wrap');
  var medicineRow = medicinesWrap.children(":first");

  $('#add').click(function () {
    var newRow = boxRow.clone();
    testCount++;
    boxesWrap.append(newRow);
  });  

  $('#addMedicine').click(function () {
    var newMedicine = medicineRow.clone();
    medicineCount++;
    medicinesWrap.append(newMedicine);
  }); 
  
  $('#boxes-wrap').on('click', 'button.remove-gas-row', function () {
  	$(this).parent().remove();
      testCount--;
  }); 

  $('#boxes-wrap').on('click', 'button.remove-medicine-row', function () {
  	$(this).parent().remove();
      medicineCount++;
  }); 
});
</script>
@endsection
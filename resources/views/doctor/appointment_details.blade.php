@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <form action="/action_page.php">
                        <div class="form-group">
                          <label for="disease">Disease</label>
                          <input type="text" class="form-control" id="disease" name="disease">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Observatiion:</label>
                          <input type="text" class="form-control" id="observation" name="observation">
                        </div>
                        <div class="test">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-md-4" for="pwd">ADD Test:</label>
                                    <button type="button" class="btn btn-primary  add_form_field">ADD</button>
                                    <div  class="form-group form-inline">
                                        <div>
                                            
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    
                        
                        <button type="submit" class="btn btn-default">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
    var max_fields = 30;
    var wrapper = $(".test");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div  class="form-group form-inline"><div><select class="livesearch form-control p-3"  name="mytext[]">'+
                @foreach ($collection as $item)
                       <option value="{{data->id}}">{{data->name}}</option>  
                @endforeach
            +'</select><a href="#" class="delete glyphicon glyphicon-trash">DELETE</a></div></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});

</script>

@endsection
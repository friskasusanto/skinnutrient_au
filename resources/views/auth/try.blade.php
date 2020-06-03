<!DOCTYPE html>
<html>
<head>
    <title>Laravel Dependent Dropdown Example with demo</title>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
</head>
<body>


<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Select State and get bellow Related City</div>
      <div class="panel-body">
            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="state" class="form-control" style="width:350px">
                    <option value="">--- Select State ---</option>
                    @foreach ($states as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Select City:</label>
                <select name="city" class="form-control" style="width:350px">
                  <option>--State--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Select Regency:</label>
                <select name="regency" class="form-control" style="width:350px">
                  <option>--State--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Select Village:</label>
                <select name="village" class="form-control" style="width:350px">
                  <option>--State--</option>
                </select>
            </div>
      </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                        
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });

     $(document).ready(function() {
        $('select[name="city"]').on('change', function() {
            var cityID = $(this).val();
            if(cityID) {
                $.ajax({
                    url: '/myformAjax_districts/ajax/'+cityID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="regency"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="regency"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="regency"]').empty();
            }
        });
    });

     $(document).ready(function() {
        $('select[name="regency"]').on('change', function() {
            var regencyID = $(this).val();
            if(regencyID) {
                $.ajax({
                    url: '/myformAjax_villages/ajax/'+regencyID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="village"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="village"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="village"]').empty();
            }
        });
    });
</script>


</body>
</html>
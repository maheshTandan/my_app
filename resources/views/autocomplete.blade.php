    <!DOCTYPE html>
    <html>
    <head>
        <title>Laravel 5 - Autocomplete Mutiple Fields Using jQuery, Ajax and MySQL</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>
    <div class="container">
      <h1>Laravel 5 - Autocomplete Mutiple Fields Using jQuery, Ajax and MySQL</h1>
      
      <form>
          
        <table class="table table-bordered">
          <tr>
              <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
              <th>S. No</th>
              <th>Country Name</th>
              <th>Country code</th>
          </tr>
          <tr>
              <td><span id='sn'>1.</span></td>
              <td><input class="form-control autocomplete_txt" type='text' data-type="countryname" id='countryname_1' name='countryname[]'/></td>
            </tr>
          </table>
      </form>
    </div>
    <script type="text/javascript">
              
    //autocomplete script
    $(document).on('focus','.autocomplete_txt',function(){
      type = $(this).data('type');
      
      if(type =='countryname' )autoType='name'; 
      if(type =='country_code' )autoType='sortname'; 
      
       $(this).autocomplete({
           minLength: 0,
           source: function( request, response ) {
                $.ajax({
                    url: "{{ route('searchajax') }}",
                    dataType: "json",
                    data: {
                        term : request.term,
                        type : type,
                    },
                    success: function(data) {
                        var array = $.map(data, function (item) {
                           return {
                               label: item[autoType],
                               value: item[autoType],
                               data : item
                           }
                       });
                        response(array)
                    }
                });
           },
           select: function( event, ui ) {
               var data = ui.item.data;           
               id_arr = $(this).attr('id');
               id = id_arr.split("_");
               elementId = id[id.length-1];
               $('#countryname_'+elementId).val(data.name);
               $('#country_code_'+elementId).val(data.sortname);
           }
       });
       
       
    });
    </script>
    </body>
    </html>
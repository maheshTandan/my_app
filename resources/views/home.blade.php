<!-- HEADER INCLUDED -->
@include('header')
<!-- ///HEADER INCLUDED -->

<br>
<!----FOR VALIDATION ERRORS---->
@if ($errors->any())
  <script>
  	// FOR SEARCH BAR GET RED IF EMPTY
  	$(document).ready(function(){
  		$("#countryname_1").css({"border":"1px solid red"});
  	});
</script>
@endif

<div class="container">
    <form action="search">
  <input type="text" class="form-control autocomplete_txt" placeholder="Search.." autocomplete="off" data-type="countryname" id="countryname_1" name='countryname'>
  
  <br>
  <center><button type="submit" class="btn btn-primary"><i>Search</i></button></center>
</form>
</div>

  
   
  </div>
  <br>

<!-- Page Content -->
<div class="container">
  <h1 class="mt-4">Details About Website</h1>
  <p>The logo in the navbar is now a default Bootstrap feature in Bootstrap 4! Make sure to set the width and height of the logo within the HTML or with CSS. For best results, use an SVG image as your logo
  .</p>
</div>
<!-- /.container -->


<!-- FOOTER INCLUDED -->
@include('footer')
<!-- ///FOOTER INCLUDED -->
<script type="text/javascript">
              
    //autocomplete script
    $(document).on('focus','.autocomplete_txt',function(){
      type = $(this).data('type');
      
      if(type =='countryname' )autoType='name'; 
      
       $(this).autocomplete({
           minLength: 1,
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
           }
       });
       
       
    });
    </script>
<!-- HEADER INCLUDED -->
@extends('layouts.master')
<!-- ///HEADER INCLUDED -->

<!-- TITLE IS HERE -->
@section('title', 'SubhKuch.com')

@section('content')
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
  <div class="row">
    <div class="col-sm-2">
      
    </div>
    <div class="col-sm-8">
      <form id="submit" action="search">
        @csrf
        <span id="border_bottom">
        <input type="text" class="autocomplete_txt" placeholder="Search.." autocomplete="off" data-type="countryname" id="countryname_1" name='countryname'>
        <br>
        </span>
        <center><button type="submit" class="btn btn-primary"><i>Search</i></button></center>
      </form>
    </div>
    <div class="col-sm-2">
      
    </div>
      
  </div>
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


<!-- JQUERY SCRIPT START HERE -->
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
               $('#submit').submit();
           }
       });
       
       
    });

    </script>

@endsection
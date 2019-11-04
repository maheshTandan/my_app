<!-- HEADER INCLUDED -->
@extends('layouts.master')
<!-- ///HEADER INCLUDED -->

<!-- TITLE IS HERE -->
@section('title', 'SubhKuch.com')

@section('content')
<br>
@if(isset($result))
<div class="container">
  <div class="row">
    <div class="col-sm-2">
      
    </div>
    <div class="col-sm-7">
      <form id="submit" action="search">
      <span id="border_bottom">
        @csrf
        <input type="text" value="@if(isset($search)){{$search}}@endif" class="autocomplete_txt" placeholder="Search.." autocomplete="off" data-type="countryname" id="countryname_1" name='countryname'>
      </span>
        <br>
        
      
    </div>
    <div class="col-sm-3 mt-3">
      <button type="submit" class="btn btn-primary"><i>Search</i></button>
    </div>
    </form>
  </div>
</div>

<br>

<div class="container" id="search_main" style="width: 60%;">
<div class="row">
  
  
    @foreach($result as $user)
  <!--  <a target="blank" href="{{ $user->site_link }}" class="col-sm- border search_items">
      <center><b>{{$user->site_name}}</b></center>
      {{ $user->type }}<br>
      {{ $user->up_votes }}
      <p class="little">{{ $user->detail }}</p>
    </a> -->
    <div class="col-sm-3">
      <a target="blank" href="{{ $user->site_link }}" class="search_items_anchor">
      <div class="py-1 px-3 search_items mb-2 mt-2">
      <center><b>{{$user->site_name}}</b></center>
      {{ $user->type }}<br>
      {{ $user->up_votes }}
      <p class="little">{{ $user->detail }}</p>
      </div>
      </a>
    </div>
  @endforeach
  
  
</div>
</div>
@endif

<!-- Page Content -->
<div class="container">
  <h1 class="mt-4">Details About Website</h1>
  <p>The logo in the navbar is now a default Bootstrap feature in Bootstrap 4! Make sure to set the width and height of the logo within the HTML or with CSS. For best results, use an SVG image as your logo.

  </p>
</div>

<!-- /.container -->
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
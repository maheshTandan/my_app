<!-- HEADER INCLUDED -->
@include('header')
<!-- ///HEADER INCLUDED -->

<br>



@if(isset($result))
<div class="container">
    <form action="search">
  <input type="text" value="@if(isset($search)){{$search}}@endif" class="form-control autocomplete_txt" placeholder="Search.." autocomplete="off" data-type="countryname" id="countryname_1" name='countryname'>
  
  <br>
  <center><button type="submit" class="btn btn-primary"><i>Search</i></button></center>
</form>
</div>

<br>

<div class="container border border-dark" id="search_main" style="display:;">
<table class="table">
    <tr>
        <th>S.N</th>
        <th>Website Name</th>
        <th>Link</th>
        <th>Votes</th>
    </tr>
    <tr>
        @php
        $key = 1;
        @endphp
        @foreach ($result as $user)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $user->site_name }}</td>
                <td><a class="btn btn-primary btn-sm" target="blank" href="{{ $user->site_link }}">Goto Website</a></td>
                <td>{{ $user->up_votes }}</td>
                @php
                    $key++;
                @endphp
            </tr>
        @endforeach

    </tr>
</table>
</div>
@endif

<!-- Page Content -->
<div class="container">
  <h1 class="mt-4">Details About Website</h1>
  <p>The logo in the navbar is now a default Bootstrap feature in Bootstrap 4! Make sure to set the width and height of the logo within the HTML or with CSS. For best results, use an SVG image as your logo.

  </p>
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
<!-- HEADER INCLUDED -->
@include('header')
<!-- ///HEADER INCLUDED -->

<br>



@if(isset($result))
<div class="container">
    <form class="example">

  <input type="text" placeholder="Search.." value="@if(isset($search)){{$search}}@endif" name="search">
  <button type="submit" id="showw"><i>Search</i></button>
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
                <td><a class="btn btn-primary btn-sm" href="{{ $user->site_link }}">Goto Website</a></td>
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
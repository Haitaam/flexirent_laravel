<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FlexiRent</title>
  <link rel="shortcut icon" href="images/h.png" type="image/x-icon ">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="css/welcome.css">
</head>
<body>
    @if (session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif
<div>@include('Components.userheader')</div>


<br><br>
<div id="div2">@include('Components.searchbar')</div>
    @include('Components.cards')
    {{-- @include('societe.societe') --}}
    @include('Components.apropos')

    @include('Components.footer')




  @if (isset($utilisateur->date_naissance))

  @endif

  <!-- Inclus jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <!-- Inclus Bootstrap Bundle de Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

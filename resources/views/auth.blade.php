<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FlexiRent-LoginPage</title>
  <link rel="shortcut icon" href="images/h.png" type="image/x-icon ">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="css/welcome.css">
</head>
<body>

    @if ($errors->any())
    <div id="error-message" class="alert alert-danger fixed top-4 left-1/2 -translate-x-1/2 w-full max-w-md px-4 py-3 bg-red-500 text-white rounded-md shadow-lg flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                <path d="M12 9v4"></path>
                <path d="M12 17h.01"></path>
            </svg>
             {{ $errors->first() }} 
        </div>
        <button id="close-button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:text-accent-foreground h-10 w-10 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
            <span class="sr-only">Close</span>
        </button>
    </div>

    <script>
        document.getElementById('close-button').addEventListener('click', function() {
            document.getElementById('error-message').style.display = 'none';
        });
    </script>
@endif


    @include('Components.loginc')

 <!-- Tes scripts JavaScript -->


  <!-- Inclus jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <!-- Inclus Bootstrap Bundle de Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

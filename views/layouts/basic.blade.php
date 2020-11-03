<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Harlem College</title>
    <link rel="shortcut icon" href="images/logo.png" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrapx/css/bootstrap.min.css')}}">



  <script type="text/javascript" src="{{asset('jquery.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrapx/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript">

    $(document).ready(function() {

    } );

</script>

</head>
<body>
    <!--<div class='linksDiv'>
        <a><a href="{{ URL::to('institute') }}">Home</a>
        <a href="{{ URL::to('lecturers') }}">Lecturers</a>
        <a href="{{ URL::to('students') }}">Students</a>
        <a href="{{ URL::to('students') }}">Students</a>
    </div>-->
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{$institute->name}}</a>
        </div>
        <ul class="nav navbar-nav">
        @if(Session::has('lec') || Session::has('student'))
            <li><a href="{{ URL::to('logout/{sess}') }}">Log out</a></li>
        @else()
        <!--
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>-->
        @endif
        </ul>
    </div>
    </nav>
    @yield('content')
</body>
</html>
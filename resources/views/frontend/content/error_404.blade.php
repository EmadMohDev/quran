<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@lang('quran.quran') | 404</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="{{url('assets/custom/soon.css')}}" rel="stylesheet">

</head>

<body>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>4<span>0</span>4</h1>
			</div>
            <h2>@lang('quran.error_404')</h2>
            <a class="home-button" href="{{ url('home'.getPramOpId()) }}">@lang('quran.home')</a>
            @yield('content')
		</div>
	</div>

</body>

</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="{{ app()->getLocale() == 'ar' ? 'text-align:right;' : '' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Quran</title>

        <link href="{{url('assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

        <link href="{{url('assets/frontend/css/animate.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{url('assets/frontend/css/main.css')}}" rel="stylesheet">
        <link href="{{url('assets/frontend/css/responsive.css')}}" rel="stylesheet">
        <link href="{{url('assets/custom/custom-style.css')}}" rel="stylesheet">
        @if (app()->getLocale() == 'ar')
        <link href="{{url('assets/custom/custom-style-ar.css')}}" rel="stylesheet">
        @endif

        @if (session()->get('theme') == 'dark')
        <link href="{{url('assets/custom/dark.css')}}" rel="stylesheet">
        @endif
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('assets/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('assets/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('assets/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{url('assets/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
        <link href="{{url('assets/custom/loading.css')}}" rel="stylesheet">
    </head>
    <body class="homepage">

        @include('frontend.includes.header')

        @yield('content')

        @include('frontend.includes.footer')

    <script src="{{url('assets/frontend/js/jquery.js')}}"></script>
    <script src="{{url('assets/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{url('assets/frontend/js/jquery.isotope.min.js')}}"></script>
    <script src="{{url('assets/frontend/js/main.js')}}"></script>
    <script src="{{url('assets/frontend/js/wow.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{url('assets/chosen-bootstrap/chosen.min.css')}}" />
    <script type="text/javascript" src="{{url('assets/chosen-bootstrap/chosen.jquery.min.js')}}"></script>
    <script src="{{url('assets/custom/custom.js')}}"></script>
    @yield('script')

    <script>

      op_id = {{ isset($_REQUEST['OpID']) ? 1 : 0 }}
      if (op_id) {
        var operator_id = {{ isset($_REQUEST['OpID']) ? $_REQUEST['OpID'] : '' }}
        $('.link_href').each(function() {
          console.log($(this));
          var $this = $(this);
          var _href = $this.attr("href");
              if (_href.includes('?')) {
                $this.attr("href", _href + '&OpID=' + operator_id);
              } else {
                $this.attr("href", _href + '?OpID=' + operator_id);
              }
            });
          }


    </script>

    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> EVSU | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Wire+One|Raleway:300' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var fbCustomerChat = document.getElementById('fb-customer-chat');
        fbCustomerChat.setAttribute('page_id', '102229915181852')
        document.body.appendChild(fbCustomerChat);

        window.fbAsyncInit = function() {
            FB.init({
              appId            : 'xxx',
              autoLogAppEvents : true,
              xfbml            : true,
              version          : 'v12.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    {{-- <script defer>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "102229915181852");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script defer>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    --}}



</head>
<body class="bg-gray-200">
    @include('include/_navbar')

    <div id="app" class="pb-0">
        <main class="">
            @yield('content')
        </main>
    </div>

    
    @include('include/_footer')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

    {{-- <script src="owlcarousel/owl.carousel.min.js"></script> --}}
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    @yield('scripts')
    
    <script>
        function refreshTime() {
            var datetime = new Date().toDateString();
            var time = new Date().toLocaleTimeString();
            document.getElementById("date").textContent = datetime
            document.getElementById("time").textContent = time ;
        } setInterval(refreshTime, 1000);
        
    </script>

</body>
</html>

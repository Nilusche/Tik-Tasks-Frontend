<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/loader.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b90fa0e727.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <script>
        window.Laravel = {!! json_encode([
    'user' => auth()->check() ? auth()->user()->id : null,
]) !!};
    </script>

    <title>TikTasks</title>
    @yield('css')
    @yield('scripts')

</head>

<body>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <div id=app>

    </div>
    <div class="container-fluid navcontainer">
        <nav class="navbar navbar-expand-lg navbar-dark back">
            <a class="navbar-brand" href="/Startseite">
                <img class="TikTaskPicture" src="/sources/logo_white.png" alt="TikTasksPicture" width=auto height="150">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ms-auto">
                    <!-- Notifaction Bell -->
                    <li class="nav-item">
                        <a href="/refresh" class="nav-item refresh"><i class="fas fa-sync-alt"></i></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-item" href="/UserNotifications" data-toggle="tooltip" data-placement="top"
                            title="Benachrichtigungen">
                            <i class="fas fa-bell icon">
                                @if ($data > 0)
                                    <span class="notifactionBadge ">
                                        {{ $data }}
                                    </span>
                                @endif
                            </i>
                        </a>
                    </li>
                    @if (auth()->user()->isAdmin())
                        <li class="nav-item grow">
                            <a class="nav-link {{ request()->is('Systempanel','EditUser','FindUser','DeleteUser','DeleteUser/action','AdminExportImport','register') ? 'active' : ''}}" href="/Systempanel">{{__('menu.systempanel')}}</a>
                        </li>
                    @endif
                    @if (auth()->user()->isManager())
                            <li class="nav-item grow ">
                                <a class="nav-link {{ request()->is('Assign') ? 'active' : ''}}" href="/Assign">{{__('menu.assign')}}</a>
                            </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link grow {{ request()->is('Settings','Archive','NonAdminExportImport','UserNotifications') ? 'active' : ''}}" href="/Settings">{{__('menu.settings')}}</a>
                    </li>
                    <li class="nav-item grow">
                        <a class="nav-link {{ request()->is('Profile', 'Profile/edit','Profile/change-password') ? 'active' : ''}}" href="/Profile">{{__('menu.profile')}}</a>
                    </li>
                    <li class="nav-item grow">
                        <a class="nav-link {{ request()->is('logout') ? 'active' : ''}} " href="/logout">{{__('menu.logout')}}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    @if (session()->has('success'))
        <div class=" container alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class=" container alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @yield('content')
    <footer class="text-center text-lg-start">
        <div class="text-center p-3 foot">
           {{__('menu.disclaimer')}}
        </div>
    </footer>


    

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <script>
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>



    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader-inner">
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        })
    </script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            easing: 'ease-out-back',
            duration: 700
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="{{asset('assets/js/push.min.js')}}"></script>
    @if(App::currentLocale()=='de')
    
    <script>
        (function() {

            var originallog = console.log;

            console.log = function(txt) {
                // Do really interesting stuff
                //alert("Neue Benachrichtigung, Aufgabe abgelaufen");
                
                @if(session()->has('noti') && session()->get('noti') == 'enable')
                    Push.create('Neue Benachrichtigung',{
                        body:"Eine Aufgabe nähert sich der Deadline", 
                        timeout: 5000,
                        icon:"https://img.icons8.com/dusk/64/000000/task.png",
                        onClick: function () {
                            window.location.href = "/UserNotifications";
                            this.close();
                        }
                    });
                @else
                    alertify       
                        .alert(
                            "Sie haben gerade eine neue Benachrichtigung erhalten.",
                            function() {
                                alertify.message('OK');
                                window.location.reload();
                            }).set({
                            title: "Benachrichtigung"
                    });
                @endif
                window.location.reload();
                originallog.apply(console, arguments);

            }

        })();
    </script>
    @else

    <script>
        (function() {

            var originallog = console.log;

            console.log = function(txt) {
                // Do really interesting stuff
                //alert("Neue Benachrichtigung, Aufgabe abgelaufen");
                @if(session()->has('noti') && session()->get('noti') == 'enable')
                    Push.create('New Notification',{
                        body:"A Task approaches the Deadline", 
                        timeout: 5000,
                        icon:"https://img.icons8.com/dusk/64/000000/task.png",
                        onClick: function () {
                            window.location.href = "/UserNotifications";
                            this.close();
                        }
                    }); 
                @else
                    alertify
                    .alert(
                        "You just received a notification",
                        function() {
                            alertify.message('OK');
                            window.location.reload();
                        }).set({
                        title: "Notification"
                    });
                @endif
                  

                originallog.apply(console, arguments);

            }

        })();
    </script>
    @endif
    <script>
        $(document).ready(function() {
            $( ".ms-auto .grow" ).bind( "click", function(event) {
                var clickedItem = $( this );
                $( ".ms-auto .grow" ).each( function() {
                    $( this ).removeClass( "active" );
                });
                clickedItem.addClass( "active" );
            });
        });
    </script>
    @yield('bottomscripts')
</body>

</html>

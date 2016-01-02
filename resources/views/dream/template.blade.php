<!DOCTYPE html>
<html lang="en" ng-app="dreamsApp">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dreams</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../dream/css/grayscale.css">
        <!-- <script src="../dream/vendor.js"></script> -->
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{!! url('/') !!}">
                        <i class="fa fa-play-circle"></i>  Home
                    </a>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <main class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Bestmomo 2015</p>
            </div>
        </footer>

    </body>

</html>




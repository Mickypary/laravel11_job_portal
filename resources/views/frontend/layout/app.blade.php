<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <meta name="description" content="" />
        <title>Job Hunt</title>

        <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}" />

        <!-- All CSS -->
        @include('frontend.layout.styles')

        <!-- All Javascripts -->
        @include('frontend.layout.scripts')

        <link
            href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="phone-text">111-222-3333</li>
                            <li class="email-text">contact@arefindev.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            <li class="menu">
                                <a href="login.html"
                                    ><i class="fas fa-sign-in-alt"></i> Login</a
                                >
                            </li>
                            <li class="menu">
                                <a href="signup.html"
                                    ><i class="fas fa-user"></i> Sign Up</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        @include('frontend.layout.nav')

        

        @yield('main_content')

        @include('frontend.layout.footer')

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        @include('frontend.layout.scripts_footer')
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; Charset=UTF-8" http-equiv="Content-Type" />
        <title>{{ config('metadata.title') }}</title>
        <meta name="description" content="{{ config('metadata.description') }}">
        <link rel="stylesheet" href="/css/reset.css">
        <link rel="stylesheet" href="/css/common.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="icon" type="image/png" href="/images/punch.png" />
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        {{-- Required for previews, edit buttons, & experiments --}}
        <script>
            window.prismic = {
                endpoint: '{{ config('prismic.url') }}'
            };
        </script>
        <script src="//static.cdn.prismic.io/prismic.js"></script>
    </head>
    @if (!isset($isHomepage))
        <?php $isHomepage = false; ?>
    @endif
    <body class="page{{ $isHomepage ? " homepage" : "" }}">

        <header class="site-header">
            <a href="/">
                <div class="logo">John Doe</div>
            </a>

            {{-- If the navigation is set up in prismic.io --}}
            @if ( $menuContent != null )
                <nav>
                    <ul>

                    {{-- Loop through each menu item --}}
                    @foreach ( $menuContent->getGroup('menu.menuLinks')->getArray() as $link )
                        <li><a href="{{ $link->getLink("link")->getUrl($linkResolver) }}">{{ $link->getText("label") }}</a></li>
                    @endforeach
                    </ul>
                </nav>
            @endif

        </header>

        @yield('content')

        <footer>
            <p>
                Proudly published with &nbsp;<a href="https://prismic.io" target="_blank">prismic.io</a>
                <br/>
                <a href="https://prismic.io" target="_blank"><img class="footer-logo" src="images/logo-prismic.svg"/></a>
            </p>

        </footer>
    
    </body>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - RealProperty - Leader in Real Estate Business</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/blogcustom.css">

    

</head>

<body>
    <nav class="navbar is-primary">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="/img/logoblack.png" width="112" height="28">
                </a>
                <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                <span></span>
                <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item" href="/blog">
                            Home
                        </a>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                    Categories
                                </a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="/blog/?category=Life Style">
                                        Life Style
                                    </a>
                                <a class="navbar-item" href="/blog/?category=Tips"> 
                                        Tips
                                    </a>
                                <a class="navbar-item" href="/blog/?category=Loan">
                                        Loan
                                    </a>
                                <a class="navbar-item" href="/blog/?category=News">
                                    News
                                </a>
                                <a class="navbar-item" href="/blog/?category=Notice">
                                    Notice
                                </a>
                            </div>
                        </div>
                        <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                        Archives
                                    </a>
                                <div class="navbar-dropdown">
                                @if ($archives->count() > 0)
                                @foreach ($archives as $archive)
                                    <a class="navbar-item" href="/blog/?month={{ $archive->month}}&year={{$archive->year}}">{{ $archive->month .' '. $archive->year .' ('.$archive->article_count. ')' }}</a>
                                @endforeach
                                @endif    
                                </div>
                            </div>
                    <a class="navbar-item" href="/about">
                            About Us
                        </a>
                    <a class="navbar-item" href="/contactus">
                            Contact Us
                        </a>
                </div>
            </div>
        </div>
    </nav>

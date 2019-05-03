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
                    <img src="img/logoblack.png" width="112" height="28">
                </a>
                <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                <span></span>
                <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item">
                            Home
                        </a>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                    Categories
                                </a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item">
                                        Life Style
                                    </a>
                                <a class="navbar-item">
                                        Tips
                                    </a>
                                <a class="navbar-item">
                                        Loan
                                    </a>
                                <a class="navbar-item">
                                    News
                                </a>
                                <a class="navbar-item">
                                    Notice
                                </a>
                            </div>
                        </div>
                        <a class="navbar-item">
                            Archives
                    </a>
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
    <!-- END NAV -->

    <section class="hero is-info is-medium is-bold">
        <div class="hero-body"style='background-image: url("/img/home2.jpg");   filter: blur(8px);'>
        </div>
        <span class="container has-text-centered textbox">
            <h1 class="title is-1">BLOG</h1>
            <div class="title">RealProperty - Leader in Real Estate Business</div>
        </span>
    </section>


    <div class="container">
        <!-- START ARTICLE FEED -->
        <section class="articles">
            <div class="column is-8 is-offset-2">
                <!-- START ARTICLE -->
                <div class="card article">
                    <div class="card-content">
                        <div class="media">
                                <div class="media-center">
                                        <img src="http://www.radfaces.com/images/avatars/daria-morgendorffer.jpg" class="author-image" alt="Placeholder image">
                                    </div>
                            <div class="media-content has-text-centered">
                                <p class="title article-title">Introducing a new feature for paid subscribers</p>
                                <div class="tags has-addons level-item">
                                    <span class="tag is-rounded is-info">@skeetskeet</span>
                                    <span class="tag is-rounded">May 10, 2018</span>
                                </div>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>Non arcu risus quis varius quam quisque. Dictum varius duis at consectetur lorem. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. </p>
                            <p>Metus aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Accumsan lacus vel facilisis volutpat. Non sodales neque sodales ut etiam.
                                Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus.</p>
                            <h3 class="has-text-centered">How to properly center tags in bulma?</h3>
                            <p> Proper centering of tags in bulma is done with class: <pre>level-item</pre>
                                Voluptat ut farmacium tellus in metus vulputate. Feugiat in fermentum posuere urna nec. Pharetra convallis posuere morbi leo urna molestie.
                                Accumsan lacus vel facilisis volutpat est velit egestas. Fermentum leo vel orci porta. Faucibus interdum posuere lorem ipsum.</p>
                        </div>
                        <a href="" class="button is-primary is-pulled-right">Read More</a>
                    </div>
                </div>
                <!-- END ARTICLE -->
              </div>
              <div class="column container is-8 is-offset-2">
                    <nav class="pagination is-rounded" role="navigation" aria-label="pagination">
                            <a class="pagination-previous">Previous</a>
                            <a class="pagination-next">Next page</a>
                            <ul class="pagination-list">
                              <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
                              <li><span class="pagination-ellipsis">&hellip;</span></li>
                              <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
                              <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
                              <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
                              <li><span class="pagination-ellipsis">&hellip;</span></li>
                              <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
                            </ul>
                          </nav>
              </div>
        </section>
        </div>


    {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>

</html>
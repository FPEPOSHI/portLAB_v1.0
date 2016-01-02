<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome to PortLAB</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="{!! asset("welcome/assets/css/main.css") !!}" />

</head>
<body class="homepage">
<div id="page-wrapper">


    <!-- Header -->
    <div id="header">

        <!-- Inner -->
        <div class="inner">
            <header>
                <h1><a href="#" id="logo">portLAB</a></h1>
                <hr />
                <p>Faqja qe iu vjen ne ndihme te gjitheve</p>
            </header>
            <footer>
                <a href="#banner" class="button circled scrolly">Start</a>
            </footer>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="/">Home</a></li>


                <li><a href="about.html">About</a></li>
                <li><a href="example.html">Contact</a></li>
                <li><a href="{!! URL::route("login") !!}">Login</a></li>

            </ul>
        </nav>

    </div>

    <!-- Banner -->
    <section id="banner">
        <header>
            <h2>Pershendetje. Ju po kerkoni ne <strong>portLAB</strong>.</h2>
            <p>
                Nje aplikacion ne web i cili do te permbaje projekte te ngarkuara nga vete perdoruesit dhe ndermjet tyre do behet shkembim i projekteve qe do te perdoren per pune personale.
            </p>
        </header>
    </section>

    <!-- Carousel -->
    <section class="carousel">
        <div class="reel">

            <article>
                <a href="#" class="image featured"><img src="{!! asset("welcome/img1.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="#">Project 1</a></h3>
                </header>
                <p>......</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="{!! asset("welcome/img2.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="#">Project</a></h3>
                </header>
                <p>......</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="{!! asset("welcome/img3.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="#">Project 3</a></h3>
                </header>
                <p>.....</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="{!! asset("welcome/img4.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="#">Project 4</a></h3>
                </header>
                <p>......</p>
            </article>
            <article>
                <a href="#" class="image featured"><img src="{!! asset("welcome/img5.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="#">Project 5</a></h3>
                </header>
                <p>......</p>
            </article>
            <article>
                <a href="#" class="image featured"><img src="{!! asset("welcome/img6.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="#">Project 6</a></h3>
                </header>
                <p>......</p>
            </article>

        </div>
    </section>

</div>
<hr />
<div class="row">
    <div class="col-md-6">

        <!-- Contact -->
        <section class="contact">
            <ul class="icons">
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
            </ul>
        </section>
        </div>
    <div class="col-md-6">

        <!-- Copyright -->
        <div class="copyright">
            <ul class="menu">
                <li>&copy; portLAB. All rights reserved.</li><li>Design: <a href="portlab.xyz">portLAB</a></li>
            </ul>
        </div>

    </div>

</div>
</div>
</div>

</div>

<!-- Scripts -->
<script src="{!! asset("welcome/assets/js/jquery.min.js") !!}"></script>
<script src="{!! asset("welcome/assets/js/jquery.dropotron.min.js") !!}"></script>
<script src="{!! asset("welcome/assets/js/jquery.scrolly.min.js") !!}"></script>
<script src="{!! asset("welcome/assets/js/jquery.onvisible.min.js") !!}"></script>
<script src="{!! asset("welcome/assets/js/skel.min.js") !!}"></script>
<script src="{!! asset("welcome/assets/js/util.js") !!}"></script>
{{--<!--[if lte IE 8]><script src={!! asset("welcome/assets/js/ie/respond.min.js") !!}"></script><![endif]-->--}}
<script src="{!! asset("welcome/assets/js/main.js") !!}"></script>

</body>
</html>
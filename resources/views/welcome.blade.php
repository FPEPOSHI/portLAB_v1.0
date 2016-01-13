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
                <p> FUQIA e ZGJEDHJES </p>
            </header>
            <footer>
                <a href="#banner" class="button circled scrolly">Start</a>
            </footer>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="/">Home</a></li>


                <li><a href="#about">About</a></li>
                <li><a href="example.html">Contact</a></li>
                <li><a href="{!! URL::route("login") !!}">Login</a></li>

            </ul>
        </nav>

    </div>

    <!-- Banner -->
    <section id="banner">
        <header>
            <p>
               <strong> PortLAB eshte nje arkive online me projekte e krijuar me qellim per tu ardhur ne ndihme te gjitheve. </strong>
            </p>
        </header>
    </section>

    <!-- Carousel -->
    <section class="carousel">
        <div class="reel">

            <article>
                <a href="{!! URL::route("login") !!}" class="image featured"><img src="{!! asset("welcome/bio.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="{!! URL::route("login") !!}">Hemorragjia Cerebrale -BIOLOGJI</a></h3>
                </header>
                <p>Objektivat: Te njihemi me semundjen cerebrale dhe simptomat e saj. ...</p>
            </article>

            <article>
                <a href="{!! URL::route("login") !!}" class="image featured"><img src="{!! asset("welcome/fiz.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="{!! URL::route("login") !!}">Ligji i Dyte i Termodinamikes Kunder Evolucionit -FIZIKE</a></h3>
                </header>
                <p>Ligji i Dyte i Termodinamikes njihet ndryshe edhe si Ligji i Entropise. Teoria e evolucionit eshte zhvilluar duke e injoruar kete baze ...</p>
            </article>

            <article>
                <a href="{!! URL::route("login") !!}" class="image featured"><img src="{!! asset("welcome/mat.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="{!! URL::route("login") !!}">Studim statistikor mbi moshen e duhanpiresve -MATEMATIKE</a></h3>
                </header>
                <p>Popullimi: Bashkesia e numrit te personave duhanpires qe jane ne ...</p>
            </article>

            <article>
                <a href="{!! URL::route("login") !!}" class="image featured"><img src="{!! asset("welcome/gjeo.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="{!! URL::route("login") !!}">Rajoni Jugor i Shqiperise -GJEOGRAFI</a></h3>
                </header>
                <p>Rajoni Jugor gjendet ne jug te vendit dhe ka daLje te gjere ne detin e ngrohte te Jonit ...</p>
            </article>
            <article>
                <a href="{!! URL::route("login") !!}" class="image featured"><img src="{!! asset("welcome/psiko.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="{!! URL::route("login") !!}">Crregullimet e Ankthit -PSIKOLOGJI</a></h3>
                </header>
                <p>Crregullimet e ankthit percaktohet nga nje frike e paqarte , e zgjatur por e madhe, qe nuk lidhet ...</p>
            </article>
            <article>
                <a href="{!! URL::route("login") !!}" class="image featured"><img src="{!! asset("welcome/his.jpg") !!}" alt="" /></a>
                <header>
                    <h3><a href="{!! URL::route("login") !!}">Ndikimi I Revolucionit Industrial ne vendet e Evropes-HISTORI</a></h3>
                </header>
                <p>Revolucioni Industrial ishte tranzicioni drejt proceseve te reja prodhuese ne periudhEn nga 1760 ne lidhje me ...</p>
            </article>

        </div>
    </section>

</div>
<hr />
<div id="about">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-4">
            Permbajtja Projekti PortLab do te jete nje aplikacion ne web i cili do te permbaje projekte te ngarkuara nga vete perdoruesit dhe ndermjet tyre do behet shkembim i projekteve qe do te perdoren per pune personale.
            Aplikacioni do te kete tre nivele perdoruesish: Administratori, perdorues I thjeshte dhe perdorues Pro. Perdoruesi Pro ka te drejte qe te shkarkoje cdo projekt, por me nje limit mujor dhe kundrejt nje pagese. Ndersa perdoruesi I thjeshte, qe te kete mundesine te shkarkoje nje projekt duhet qe fillimisht ai te kete ngarkuar nje te tille vete dhe me pas mund te shkarkoje projekte te tjera duke I bere nje kerkese per shkarkim poseduesit te vete projektit. Administratori do te menaxhon perdorues, do iu cakton te drejtat per cdo perdorues, si edhe do te aprovon aplikimet e perdoruesve per te shmangur parregullesi ne aplikacion.
            Aplikacioni do te kete nje faqe prezantuese e cila do ti informoje rreth platformes dhe per perdoruesit e interesuar do te ridrejtohen tek nje faqe ku ato do te duhet te logohen per te kaluar ne brendesi te aplikacionit. Me pas do te kete nje nderfaqe profil per cdo perdorues, ku secili mund te ngarkoje projektet e tyre, ti menaxhon ato si edhe profilin e tyre. Do te kete dhe nje nderfaqe ku do te prezantohen projektet me te fundit dhe nje nderfaqe tjeter ku mund te kerkojne per projekte me ane te filtrimit.

        </div>
        <div class="col-md-7">
            {{--<img src="{!! asset("welcome/img6.jpg") !!}" alt="" />--}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">

        <!-- Contact -->
        <section class="contact">
            <ul class="icons">
                <li><a href="www.twitter.com" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="www.facebook.com" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="www.instagram.com" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="www.linkedin.com" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
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
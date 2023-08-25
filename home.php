<!DOCTYPE html>
<html lang="sr">
<head>
    <title>Chelsea FC</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <!-- div blok klase container sadrzi sve elemente naseg sajta -->
    <div class="container">
        <!-- klasa clearfix se koristi unutar css-a za resavanje problema preklapanja elemenata -->
        <div class="navigation clearfix">
            <div class="logo"><h1>CHELSEA FC</h1></div>
            <div class="menu">
                <!-- neoznacena lista koja predstavlja nas navigacioni meni -->
                <ul class="main-menu">
                    <!-- elementi liste koji predstavljaju linkove ka odredjenim delovima sajta -->
                    <li class="menu-item"><a href="home.php">HOME</a></li>
                    <li class="menu-item"><a href="players.php">PLAYERS</a></li>
                    <li class="menu-item"><a href="kontakt.html">LOG OUT</a></li>
                </ul>
            </div>
        </div>

        <div class="hero"><h1 class="hero-text">KEEP THE <br> BLUE FLAG <br> FLYING HIGH</h1></div>
        <div class="article">
            <h1 class="title">Ovo je naslov</h1>
            <!-- horizontalna linija koja se koristi pri vizuelnom razdvajanju uglavnom tekstualnih celina-->
            <hr>
            <p class="article-text">
                Organska hrana je hrana koja je uzgajana po standardima organske proizvodnje, odnosno bez upotrebe pesticida i veštačkog đubriva kada su žitarice, voće i povrće u pitanju, odnosno antibiotika ili hormona u uzgoju životinja čije se meso, ali i druge namirnice životinjskog porekla (jaja i mlečni proizvodi) koriste u ishrani. 
            </p>
        </div>
        <div class="blog">
            <h1 class="title">About Chelsea F.C.</h1>
            <hr>
            <div class="cards">
                <div class="card">
                    <!-- slika koja se prikazuje na sajtu, nalazi se u nasem folderu koji "imitira" server -->
                    <img src="image/outside.jpg">
                    <h3 class="card-title">Chelsea FC</h3>
                    <p class="card-text">
                    Chelsea Football Club is an English professional football club based in Fulham, West London. Founded in 1905, they play their home games at Stamford Bridge. The club competes in the Premier League, the top division of English football. 
                </p>
                </div>
                <div class="card">
                    <img src="image/bridge.jpg">
                    <h3 class="card-title">Stamford Bridge</h3>
                    <p class="card-text">
                    Stamford Bridge is a football stadium in Fulham, adjacent to the borough of Chelsea in West London. It is the home of Premier League club Chelsea. With a capacity of 40,343, it is the ninth largest venue of the 2023–24 Premier League season and the eleventh largest football stadium in England.
                    </p>
                </div>
                <div class="card">
                    <img src="image/pitch.jpeg">
                    <h3 class="card-title">Titles</h3>
                    <p class="card-text">
                    Domestically, the club has won six league titles, eight FA Cups, five League Cups, and four FA Community Shields. Internationally, they have won the UEFA Champions League, the UEFA Europa League, the UEFA Cup Winners' Cup and the UEFA Super Cup twice each, and the FIFA Club World Cup once since their inception.
                    </p>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
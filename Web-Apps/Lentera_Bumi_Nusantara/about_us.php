<!-- password cahyo = password -->
<!DOCTYPE html>
<html>
<head>
	<meta   charset = "utf-8">
    <meta   name    = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
    <link   rel     = "stylesheet" type  = "text/css" href = "bootstrap-4.5.0-dist/css/bootstrap.css">
    <script src     = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src     = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src     = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src     = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src     = "https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src     = "https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src     = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style>
        .border {
            display: inline-block;
            width  : 100%;
            height : 100%;
        }
        .carousel img {
            min-width: 100%;
            min-height: 10%;
            max-height: 25%;
        }
    </style>
    <title align = "center" >Yakin Jaya Data Logger</title>
    <link  rel   = "icon" href = "lentera_ikon.png">
</head>
<body>
	<nav    class = "navbar navbar-expand-md navbar-dark bg-dark">
            <a      class = "navbar-brand" href   = "https://lenterabumi.com/">Lentera Bumi Nusantara</a>
            <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarNavDropdown" aria-controls = "navbarNavDropdown" aria-expanded = "false" aria-label = "Toggle navigation">
            <span   class = "navbar-toggler-icon"></span>
                </button>
                <div class = "collapse navbar-collapse" id = "navbarNavDropdown" style = "padding-left:72%; padding-right:0%;">
                <ul  class = "navbar-nav">
                <li  class = "nav-item active" style       = "padding-left:0%; padding-right:0%;">
                <a   class = "nav-link" href               = "http://192.168.43.231/Lentera_Bumi_Nusantara/index.php?&time_stamp=GET_ALL">Home</a>
                        </li>
                        <li class = "nav-item active" style = "padding-left:0%; padding-right:0%;">
                        <a  class = "nav-link" href         = "http://192.168.43.231/Lentera_Bumi_Nusantara/about_us.php">About</a>
                        </li>
                    </ul>
                </div>
            </nav>
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel" style="height:100%; width:100%;">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>
    <!-- Wrapper for carousel items -->
    <div class="carousel-inner" style="
            max-width: 50%; min-width: 30%; max-height:60%; min-height:50%; margin-left: 25%; margin-right: 0%; margin-bottom: 20">
        <div class="carousel-item active">
            <img src="lentera_horizontal_ikon_about.jpg" alt="First Slide" style="width: 100%; height:100%;">
            <h1>
                <br><br><br>
            </h1>
            <div class="carousel-caption d-none d-md-block" style="color:black;">
            <h1>
            <br><br><br><br>
                Yakin Jaya Logger
            </h1>
            <br><br>
                <h4>
                <p>Aplikasi ini dibuat sebagai prototipe monitoring data turbin angin yang ada pada PT Lentera Bumi Nusantara.</p>
                </h4>
            </div>
        </div>
        <div class="carousel-item">
            <img src="ricky_elson_about.jpg" alt="Second Slide" style="width: 100%; height:100%;">
            <div class="carousel-caption d-none d-md-block">
                <h5>Founder : Ricky Elson </h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="yakin_monitor.png" alt="Third Slide" style="margin-bottom: 20%;">
            <div class="carousel-caption d-none d-md-block">
                <h1 style = "color:black;">
                <br>Developer<br>
                <br><br>
                </h1>
                <!-- <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="cahyo_about.png" alt="Third Slide" style="">
            <div class="carousel-caption d-none d-md-block">
                <h5>Nur Cahyo Ihsan Prastyawan</h5>
                <h6>TTL         : Probolinggo, 12 April 2000</h6>
                <h6>Konsentrasi : Data Logger</h6>
                <h6>Role        : Embedded Engineer</h6>
                <h6>Quote       : Hidup adalah Penderitaan</h6>
                <!-- <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="didi_about.jpg" alt="Third Slide" style="height: 50%; width: 70%;">
            <div class="carousel-caption d-none d-md-block">
                <h5>Didi Alfandi</h5>
                <h6>TTL         :Gresik, 25 Mei 1999</h6>
                <h6>Konsentrasi : Data Logger</h6>
                <h6>Role        : Hardware Engineer</h6>
                <h6>Quote       : Hidup itu sederhana</h6>
                <!-- <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
            </div>
        </div>
        <div class="carousel-item" style="height:100%;">
            <img src="wafiq_about.jpeg" alt="Third Slide" style="">
            <div class="carousel-caption d-none d-md-block">
                <h5>Muhammad Wafiq Kamaluddin</h5>
                <h6>TTL         : Bojonegoro, 16 November 1999</h6>
                <h6>Konsentrasi : Data Logger</h6>
                <h6>Role        : Software Engineer</h6>
                <h6>Quote       : Berlayarlah kita tak pernah tahu apa yang ada di seberang sana</h6>
                <!-- <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
            </div>
        </div>
    </div>
    <!-- Carousel controls -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
</body>
</html>
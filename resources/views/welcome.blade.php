<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no"/>
        <meta http-equiv="Content-Type" content="text/html, charset=utf-8"/>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mr Barbershop</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />


        <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/nice-select/css/nice-select.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/owl-carousel/owl.carousel.css">


        <style type="text/css">
#carousel {
position: relative;
width:100%;
margin:0 auto;
}

#slides {
overflow: hidden;
position: relative;
width: 100%;
height: 250px;
}

#slides ul {
list-style: none;
width:100%;
height:250px;
margin: 0;
padding: 0;
position: relative;
}

 #slides li {
width:100%;
height:250px;
float:left;
text-align: center;
position: relative;
font-family:lato, sans-serif;
}
/* Styling for prev and next buttons */
.btn-bar{
    max-width: 346px;
    margin: 0 auto;
    display: block;
    position: relative;
    top: 40px;
    width: 100%;
}

 #buttons {
padding:0 0 5px 0;
float:right;
}

#buttons a {
text-align:center;
display:block;
font-size:50px;
float:left;
outline:0;
margin:0 60px;
color:#b14943;
text-decoration:none;
display:block;
padding:9px;
width:35px;
}

a#prev:hover, a#next:hover {
color:#FFF;
text-shadow:.5px 0px #b14943;  
}

.quote-phrase, .quote-author {
font-family:sans-serif;
font-weight:300;
display: table-cell;
vertical-align: middle;
padding: 5px 20px;
font-family:'Lato', Calibri, Arial, sans-serif;
}

.quote-phrase {
height: 200px;
font-size:24px;
color:#FFF;
font-style:italic;
text-shadow:.5px 0px #b14943;  
}

.quote-marks {
font-size:30px;
padding:0 3px 3px;
position:inherit;
}

.quote-author {
font-style:normal;
font-size:20px;
color:#b14943;
font-weight:400;
height: 30px;
}

        </style>
    </head>
    <body id="page-top">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                    <a class="navbar-brand js-scroll-trigger" href="#page-top">Mr Barbershop</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars ml-1"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav text-uppercase ml-auto">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Why Us</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Informasi</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Testimoni</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Kapster</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Maps</a></li>
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item"><a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm text-uppercase js-scroll-trigger">Dashboard</a></li>
                                @else
                                    <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-primary btn-sm text-uppercase js-scroll-trigger">Booking Now</a></li>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
                
            </nav>        
            
            <!-- Masthead-->
            <header class="masthead">
                <div class="container">
                    <div class="wow fadeInUp">
                    <div class="masthead-subheading">Welcome To Our MRB Hair Studio!</div>
                    <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Selengkapnya</a>
                    </div>
                </div>
            </header>
            <!-- Services-->
            <section class="page-section" id="services">
                <div class="container wow fadeInUp">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Why Us</h2>
                        <h3 class="section-subheading text-muted">Mengapa memilih Mr Barbersop.</h3>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-money-bill fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">Good Value For Money</h4>
                            <p class="text-muted">Dengan fasilitas dan peralatan kami yang lengkap, kami tetap menawarkan harga yang bersaing dan terbilang terjangkau sehingga tidak memberatkan kantong kamu.</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-cut fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">Potongan Berkualitas</h4>
                            <p class="text-muted">Para kapster paham tentang bentuk wajah manusia, tekstur rambut, jenis rambut, dan kombinasi ketiga elemen tersebut untuk hasil potong yang terbaik dan sesuai dengan karakter & lifestyle kamu.</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">Sistem Booking Online</h4>
                            <p class="text-muted">Antri dan menunggu? Tidak perlu lagi. Mr Barbershop sangat menghargai waktu kamu. jadi, kamu bisa booking antrian potong rambut kamu via website kami ini.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Portfolio Grid-->
            <section class="page-section bg-dark" id="portfolio">
                <div class="container wow fadeInUp">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase text-white">Informasi</h2>
                        <h3 class="section-subheading text-muted">Informasi terbaru mengenai Mr Barbershop</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 mb-12">

{{-- text slider --}}
<div id="carousel">
  <div class="btn-bar" style="display: none">
    <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a> </div>
   </div>
   @if(count($informasi) > 0)
    <div id="slides">
        <ul>
            @if(count($informasi) > 1)
                @foreach($informasi as $info)
                    <li class="slide">
                        <div class="quoteContainer">
                            <p class="quote-phrase"><span class="quote-marks">"</span>{{ $info->text }}<class="quote-marks">"</span>
                            </p>
                        </div>
                    </li>
                @endforeach
            @else
                @for($i = 0; $i < 2; $i++)
                    <li class="slide">
                        <div class="quoteContainer">
                            <p class="quote-phrase"><span class="quote-marks">"</span>{{ $informasi[0]->text }}<class="quote-marks">"</span>
                            </p>
                        </div>
                    </li>
                @endfor
            @endif
        </ul>
    </div>
   @else
    <div class="text-center" style="color: white">        
        <h3 style="font-family: arial-black">Belum ada informasi terbaru!</h3>
    </div>
   @endif
{{-- text slider --}}

                        </div>
                    </div>
                </div>
            </section>
            <!-- About-->
            <section class="page-section" id="about">
                <div class="container wow fadeInUp">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Testimoni</h2>
                        <h3 class="section-subheading text-muted">Apa kata mereka mengenai Mr Barbersop.</h3>
                    </div>
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="" /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Desember 2021</h4>
                                    <h4 class="subheading">Fikratullah Nugraha  </h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="" /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Maret 2020</h4>
                                    <h4 class="subheading">Ainul Fikri</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="" /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Juni 2019</h4>
                                    <h4 class="subheading">Didit Amanda</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="" /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Oktober 2018</h4>
                                    <h4 class="subheading">Tyasno Hermawan</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>
                                    Be Part
                                    <br />
                                    Of Our
                                    <br />
                                    Story!
                                </h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- Team-->
            <section class="page-section bg-dark" id="team">
                <div class="container wow fadeInUp">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase text-light">Kapster</h2>
                        <h3 class="section-subheading text-muted">Kapster Mr Barbershop telah dibekali skill sehingga mampu memberikan potongan rambut secara baik dan profesional.</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="" />
                                <h4 class="text-light">Sandy</h4>
                                <p class="text-muted">Sandi </p>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="" />
                                <h4 class="text-light">Andi Munzir</h4>
                                <p class="text-muted">Unci</p>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="" />
                                <h4 class="text-light">Wandy</h4>
                                <p class="text-muted">Wandy</p>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/4.jpg" alt="" />
                                <h4 class="text-light">Hidayat</h4>
                                <p class="text-muted">Dayat</p>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/5.jpg" alt="" />
                                <h4 class="text-light">Ekky Rappan</h4>
                                <p class="text-muted">Jojo</p>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/6.jpg" alt="" />
                                <h4 class="text-light">Fikram Pratama</h4>
                                <p class="text-muted">Piko</p>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </section>
            <!-- Clients-->
            
            <!-- Contact-->
            <section class="page-section" id="contact">
                <div class="container wow fadeInUp">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Maps</h2>
                        <h3 class="section-subheading text-muted">Jl. Jend Sudirman No.128, Binturu, Wara Selatan, Kota Palopo, Sulawesi Selatan 91921.</h3>
                    </div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.2795850486514!2d120.20699871462394!3d-3.019372040823147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d915ed6e1df489d%3A0x21141e3d4fcc742!2sMr.%20BarberShop!5e0!3m2!1sid!2sid!4v1617524432459!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>     
                    </div> 
                </div>
            </section>
            <!-- Footer-->
            <footer class="footer py-4">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 text-lg-left">Copyright © Mr Barbershop 2021</div>
                        <div class="col-lg-4 my-3 my-lg-0">
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="col-lg-4 text-lg-right">
                            <a class="mr-3" href="#!">Privacy Policy</a>
                            <a href="#!">Terms of Use</a>
                        </div>
                    </div>
                    <br>
                    <Div>Develover by Fikratullah Nugraha</Div>
                </div>
            </footer>
            <!-- Portfolio Modals-->

            <!-- Bootstrap core JS-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Third party plugin JS-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
            <!-- Contact form JS-->
            <script src="assets/mail/jqBootstrapValidation.js"></script>
            <script src="assets/mail/contact_me.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
            <script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.6.0/jquery.marquee.min.js" type="text/javascript"></script>


            <script src="assets/js/topbar-virtual.js"></script>
            <script src="assets/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/wow/wow.min.js"></script>
            <script src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>
            <script src="assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>
            <script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>



    <script>
$(document).ready(function () {
    //rotation speed and timer
    var speed = 5000;
    
    var run = setInterval(rotate, speed);
    var slides = $('.slide');
    var container = $('#slides ul');
    var elm = container.find(':first-child').prop("tagName");
    var item_width = container.width();
    var previous = 'prev'; //id of previous button
    var next = 'next'; //id of next button
    slides.width(item_width); //set the slides to the correct pixel width
    container.parent().width(item_width);
    container.width(slides.length * item_width); //set the slides container to the correct total width
    container.find(elm + ':first').before(container.find(elm + ':last'));
    resetSlides();
    
    
    //if user clicked on prev button
    
    $('#buttons a').click(function (e) {
        //slide the item
        
        if (container.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container.stop().animate({
                'left': 0
            }, 1200, function () {
                container.find(elm + ':first').before(container.find(elm + ':last'));
                resetSlides();
            });
        }
        
        if (e.target.id == next) {
            container.stop().animate({
                'left': item_width * -2
            }, 1200, function () {
                container.find(elm + ':last').after(container.find(elm + ':first'));
                resetSlides();
            });
        }
        
        //cancel the link behavior            
        return false;
        
    });
    
    //if mouse hover, pause the auto rotation, otherwise rotate it    
    container.parent().mouseenter(function () {
        clearInterval(run);
    }).mouseleave(function () {
        run = setInterval(rotate, speed);
    });
    
    
    function resetSlides() {
        //and adjust the container so current is in the frame
        container.css({
            'left': -1 * item_width
        });
    }
    
});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {
    $('#next').click();
}
    </script>
    </body>
</html>

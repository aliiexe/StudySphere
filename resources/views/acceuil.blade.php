<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study sphere</title>
    <link rel="stylesheet" href="{{asset("css/acceuil.css")}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="maindiv">
            <header>
                <div class="mainheader">
                    <div class="img">
                        <img src="images/study sphere logo.png" alt="" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                    </div>
                    <div class="links">
                        <ul>
                            <li data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300"><a href="#">Acceuil</a></li>
                            <li data-aos="zoom-in" data-aos-duration="800" data-aos-delay="500"><a href="#">About</a></li>
                            <li data-aos="zoom-in" data-aos-duration="800" data-aos-delay="700"><a href="{{ route('login') }}">S'authentifier</a></li>
                            <a  data-aos="zoom-in" data-aos-duration="800" data-aos-delay="900"href="{{ route('register.step1') }}"><button>S'inscrire</button></a>
                        </ul>
                    </div>
                    <div id="menu-toggle" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                        <div class="hamburger-icon"></div>
                        <div class="hamburger-icon"></div>
                        <div class="hamburger-icon"></div>
                    </div>
                </div>
            </header>

            <img class="img1" src="images/2.png" data-aos="zoom-out-up" data-aos-duration="1000" alt="">

            <div class="maintext" >
                <p class="mainp" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300" > 
                    <span data-aos="fade-up" data-aos-duration="800" data-aos-delay="100" >Bienvenue</span> <br> sur <span data-aos="fade-up" data-aos-duration="800" data-aos-delay="900" >Study Sphere</span>, la plateforme n°1 pour le réseau éducatif international.</p>

                <button data-aos="fade-up" data-aos-duration="800" data-aos-delay="700"><a href="{{ route('register.step1') }}">S'inscrire</a></button>
            </div>
            
            <img class="svgg" src="images/vector1.svg" alt="" data-aos-duration="800" data-aos="fade-up">
    
            <div class="content" data-aos="fade-up" data-aos-duration="800">
                <p>Fonctionnalités Principales</p>
                <p>de Study sphere</p>
                <div class="elts">
                    <div class="elt" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                        <img src="images/cloud.svg" alt="">
                        <span>Partage de Ressources</span>
                        <p>Facilite le partage de documents, de liens, de vidéos et d'autres ressources éducatives entre les
                            utilisateurs.</p>
                    </div>
                    <div class="elt" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                        <img src="images/message.svg" alt="">
                        <span>Chat Direct</span>
                        <p>Permet aux utilisateurs de communiquer instantanément, facilitant la collaboration et le partage
                            d'informations.</p>
                    </div>
                    <div class="elt" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                        <img src="images/download.svg" alt="">
                        <span>Téléchargement de Cours</span>
                        <p>Offre la possibilité de télécharger des cours, des documents ou des ressources pédagogiques pour
                            un accès facile et hors ligne. </p>
                    </div>
                </div>
                
            </div>
    
            <div class="counter" data-aos-duration="800" data-aos="fade-up">
                <div class="cnt">
                    <p><span id="usersCount">{{ $usersCount }}</span>+<br> users</p>
                </div>
                <div class="cnt">
                    <p><span id="postsCount">{{ $postsCount }}</span>+<br> posts</p>
                </div>
                <div class="cnt">
                    <p><span id="coursesCount">{{ $coursesCount }}</span>+<br> courses</p>
                </div>
            </div>
    
            <div class="accordion" id="accordionFlushExample" data-aos-duration="800" data-aos="fade-up">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            + Quelle est la mission de Study Sphere ?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Notre mission chez Study Sphere est de révolutionner l'éducation en offrant une plateforme
                            dynamique qui favorise des connexions significatives, l'apprentissage collaboratif et l'échange
                            de connaissances. Nous visons à créer un espace inclusif où les apprenants, les éducateurs et
                            les experts peuvent se rassembler pour inspirer, partager et grandir.
                        </div>
                    </div>
                </div>
    
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            + Qu'est-ce qui distingue Study Sphere des autres réseaux éducatifs ?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Study Sphere se distingue par son emphase sur des fonctionnalités conviviales, des outils de
                            collaboration avancés et une communauté mondiale. Notre plateforme ne se contente pas de
                            connecter des individus sur la base d'intérêts éducatifs communs, mais offre également un
                            environnement unique pour l'apprentissage interactif, le partage de ressources et le
                            développement des compétences.
                        </div>
                    </div>
                </div>
    
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            + Quelles ressources et outils sont disponibles sur Study Sphere pour maximiser mon
                            apprentissage ?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Explorez nos bibliothèques de cours, utilisez nos outils de collaboration, et découvrez les
                            fonctionnalités avancées qui peuvent enrichir votre expérience éducative. Study Sphere offre une
                            gamme d'outils pour vous aider à atteindre vos objectifs d'apprentissage.
                        </div>
                    </div>
                </div>
            </div>
    
            <footer class="ftr" data-aos-duration="800" data-aos="fade-up">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.42
                    46260745904!2d-7.6038947248840385!3d33.594285373332795!2m3!1f0!2f0!3f0!3m2!1i1024!
                    2i768!4f13.1!3m3!1m2!1s0xda7cd65706e85d7%3A0x327a13462f2a3fc9!2sCentre%20Philips!5
                    e0!3m2!1sen!2sma!4v1701883527403!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="footer-content">
                    <img src="images/study sphere logo.png" alt="Your Logo" class="logo">
                    <div class="imgs">
                        <img src="images/appstore.png" alt="">
                        <img src="images/playstore.png" alt="">
                    </div>
                    <button><a href="{{ route('register.step1') }}">S'inscrire</a></button>
                </div>
            </footer>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        AOS.init();
    </script>    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menu-toggle');
            const links = document.querySelector('.links > ul');

            menuToggle.addEventListener('click', function () {
                links.classList.toggle('show');
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth > 600) {
                    links.classList.remove('show');
                }
            });
        });

        function startCounterOnScroll(elementId, targetCount) {
    let count = 0;
    const spanElement = document.getElementById(elementId);
    let isCounting = false;

        }
    </script>
</body>

</html>

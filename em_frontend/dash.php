<?php

  require ("../em_frontend/config/koneksi.php");
  session_start();

  if(isset($_SESSION['isLogin'])){
    $_SESSION['user'];
  }else{
    echo"Login dulu gan!";
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore mojokerto | Maari kita eksplor...</title>
    <link rel="stylesheet" href="./op.css">
</head>

<body>
    <div class="container">
        <div class="container-dashboard">
            <nav class="nav-dashboard">
                <div class="profil-nav-dashboard">
                    <img src="./assets/profil.png" alt="profil" width="60px" id="profil">
                </div>
                <?php
                    $nama = explode(" ", $_SESSION['user']['nama'])[0];
                ?>
                <h2 class="name-dashboard">hi.... <br><?php echo $nama?></h2>
                <button class="btn-nav-dashboard">
                    <img src="./assets/notif.png" alt="notif ico">
                </button>
            </nav>

            <div class="left-menu none">
                <div class="left-menu-main">
                    <img src="./assets/profil.png" alt="profil" class="profil">
                    <h2 class="left-menu-title"><?php echo $_SESSION['user']['nama']?></h2>
                </div>
                 <br>
                <a href="logout.php" class="logout">Logout</a>
            </div>

            <div class="bg-black none"></div>
            
            
            
                <div class="content-dashboard">
                    <h1 class="title-content-dashboard">
                        Kamu Ingin <br> Pergi Kemana <br> Hari Ini?
                    </h1>
            
                    <div class="jumbotron-dashboard">
                        <div class="banner">
                            <a href=""><img src="./assets/wisata1.png" alt="wisata1"></a>
                        </div>
                        <div class="banner">
                            <a href=""><img src="./assets/wisata2.png" alt="wisata1"></a>
                            
                        </div>
                        <div class="banner">
                            <a href=""><img src="./assets/wisata1.png" alt="wisata1"></a>
                            
                        </div>
                        <div class="nav-jumbotron">
                            <div class="bullet" id="1"></div>
                            <div class="bullet" id="2"></div>
                            <div class="bullet" id="3"></div>
                        </div>
                    </div>
                    <div class="outer-filter-dashboard">
                    <div class="filter-dashboard">
                        <div class="filter">
                            Candi
                        </div>
                        <div class="filter">
                            Air Terjun
                        </div>
                        <div class="filter">
                            Pemandian
                        </div>
                        <div class="filter">
                            Museum
                        </div>
                    </div>
                    </div>
            
                    <div class="fav-dashboard">
                        <h2 class="title-fav-dashboard">Tempat Favorit</h2>
                        <div class="img-wisata2">
                            <div class="banner2">
                                <a href=""><img src="./assets/wisata2.png" alt="wisata2"></a>
                            </div>
                            <div class="banner2">
                                <a><img src="./assets/wisata1.png" alt="wisata2"></a>
                            </div>
                            <div class="banner2">
                                <a href=""><img src="./assets/wisata2.png" alt="wisata2"></a>
                                
                            </div>
                            <div class="nav-jumbotron">
                                <div class="bullet2" id="1"></div>
                                <div class="bullet2" id="2"></div>
                                <div class="bullet2" id="3"></div>
                            </div>
                        </div>
                    </div>
            
                    <a type="submit" href="./initial.php" class="btn-dashboard">Mulai Berpetualang</a>
                </div>
            </div>
    </div>
</body>

<script>

        document.querySelectorAll(".bullet").forEach((e,i)=>{
            e.addEventListener("click",(e)=> {
                console.log(e.target);
            })
        })


        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("banner");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].style.display = "block";
             document.querySelectorAll(".bullet").forEach((e, i) => {
                if (e.getAttribute("id")  == slideIndex) {
                    e.classList.add("bullet-active")
                } else {
                    e.classList.remove("bullet-active")
                }

            })
            setTimeout(showSlides, 5000);
        }
        
        let slideIndex2 = 0;
        showSlides2();

        function showSlides2() {
            let i;
            let slides2 = document.getElementsByClassName("banner2");
            for (i = 0; i < slides2.length; i++) {
                slides2[i].style.display = "none";
            }
            if (slideIndex2 > (slides2.length-1)) {
                slideIndex2 = 0
            }   
            slides2[slideIndex2].style.display = "block";
            slideIndex2++;
            document.querySelectorAll(".bullet2").forEach((e, i) => {
                if (e.getAttribute("id") == slideIndex) {
                    e.classList.add("bullet-active")
                } else {
                    e.classList.remove("bullet-active")
                }
                // console.log(e.getAttribute("id") == slideIndex)

            })
            setTimeout(showSlides2, 3000);
        }

document.getElementById("profil").addEventListener("click",(e)=>{
    document.querySelector(".left-menu").classList.toggle("none")
    document.querySelector(".bg-black").classList.toggle("none")
})
document.querySelector(".bg-black").addEventListener("click",e => {
    document.querySelector(".left-menu").classList.toggle("none")
    document.querySelector(".bg-black").classList.toggle("none")
})
</script>
</html>
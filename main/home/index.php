<?php
include ("../db/connect/connect2db.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christian Horizon School Inc</title>
    <link rel="icon" type="image/x-icon" href="/images/CHS Logo1.png">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bamum:wght@400;500;600;700&family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
</head>

<body>
    

    <div id="Nav">
        <div id="SideNavbar">
            <div class="logoSchoolSide">
                <img src="../../images/image.png">
                <h2>CHSI</h2>
            </div>
            <div class="NavC" onclick="changeTabToHome()"><!--<img src="images/icons8-home-50.png">--><span
                    id="Home"></span></div>
            <div class="NavC" onclick="changeTabToLogin()"><!--<img src="images/icons8-student-64.png">--><span
                    id="Login"></span></div>
            <div class="NavC"><!--<img src="images/icons8-form-50.png">--><span id="Enrollment">Enrollment
                <img src="../../images/chevron-down.svg"></span></div>

            <div class="NavD" onclick="changeTabToKinder()"><span id="EnrollmentForKindergarten">Grade - 1 to Grade 10</span></div>
            <div class="NavD" onclick="changeTabToSHS()"><span id="EnrollmentForSHS">Senior High School</span> </div>
            <div class="NavD" onclick="changeTabToTesda()"><span id="EnrollmentForTesda">Tesda</span></div>
        </div>
    </div>

    <div id="NavbarMain">
        <div class="TopNavbar">
            <div class="logoSchool">
                <img src="../../images/CHS Logo2.png">
                <span>CHSI</span>
            </div>
            <div class="rightNavSection">
                <ul>
                    <li id="HomeTab">Home</li>
                    <li>Programs</li>
                    <li id="PrivacyPolicyTab">Privacy Policy</li>
                    <li id="UserLogin">My.CHSI</li>
                    <a href=""></a>
                </ul>
                <div class="hamburgerMenu" onclick="clickAvatar()"><img src="../../images/icons8-hamburger-menu-50.png">
                </div>
            </div>
        </div>
        
        <div class="EnrollmentCategoriesCont">
            <div id="EnrollmentCategories">
                <li onclick="changeTabToKinder()"><img src="../../images/icons8-form-50.png">Elementary</li>
                <li onclick="changeTabToKinder()"><img src="../../images/icons8-form-50.png">High School</li>
                <li onclick="changeTabToSHS()"><img src="../../images/icons8-form-50.png">Senior High
                </li>
                <li onclick="changeTabToTesda()"><img src="../../images/icons8-form-50.png">Tesda
                </li>
            </div>
            <div id="Extra"></div>
        </div>
    </div>
    <!-------------------------------Login ---------------------------------------->
    <div id="Loginbackground">
        <img class="backgroundimg" src="../../images/Layer 3 copy1.png" alt="">
        <img class="backgroundimg2" src="../../images/Layer 3 copy.png" alt="">

        <form id="loginForm">
            <div class="container">
                <div class="loginContainer">
                    <div class="Container4logo">
                        <img src="../../images/CHS Logo.jpg">
                    </div>
                    <h3>Account Login</h3>

                    <div class="inputcontainer">
                        <label id="EmailLabel">Email or School ID</label>
                        <input id="LogSchoolID" type="text" name="SchoolID">
                        <label id="PassLabel">Password</label>
                        <input id="LogPass" type="password" name="LogPass">
                    </div>

                    <button id="LoginButton" name="login" type="submit">Login</button>
                    <span id="LoginNotif"></span>
                    <span id="ForgotPass">Forgot Password?</span>
                </div>
            </div>

        </form>
    </div>
    <div id="MainDiv">
        <!-------------------------------HomePage ---------------------------------------->
        <div id="HomePagebackground">
            <section id="HomeSection">
                <div class="swiper">
                    <div class="swiper-wrapper">
                    <?php
                    $url_end_point = "https://ik.imagekit.io/mygh9x3hg/";

                    $query = "SELECT * FROM cover_photos";
                    $result = $connect2db->query($query);
                    $CoverPhoto_Path = array();

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $CPhoto_Name = $row['CPhoto_Name'];
                            $LowQuality = $CPhoto_Name . "/tr:w-1980,bl-30,q-50";
                            $Orig = $CPhoto_Name . "/tr:w-1980";
                            echo '
                                <div class="swiper-slide">
                                    <div class="CoverPhotos">
                                        <img class="lazy" src="' . $LowQuality . '" data-src="' . $Orig . '"> 
                                        <div class="swiper-lazy-preloader"></div>
                                    </div>
                                </div>
                                ';
                        }
                    }
                    ?>
                        
                        <div class="swiper-gradient-overlay"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>

            <!-- SecSection --->

            <section id="SecSection" class="DefaultCont">
                <div class="SecSectionTop">
                    <div class="CoverPhotos">
                        <?php
                        $SecPagePhoto = "https://ik.imagekit.io/mygh9x3hg/homepic3.png";
                        $SPP_low = $SecPagePhoto . "/tr:w-1980,bl-30,q-50";
                        $Orig = $SecPagePhoto . "/tr:w-1980";
                        ?>
                        <img class="lazy" src="<?php echo $SPP_low; ?>" data-src="<?php echo $Orig; ?>">
                    </div>
                </div>

                <div class="SecSection2">
                    <div class="SecSectionBotton">
                        <div class="HCContentTopHeader">
                            <h1>Be a Horizonian</h1>
                        </div>
                    </div>

                    <div class="HCContentTop2">
                        <p>Embark on a transformative journey of education and enlightenment at Christian Horizon School,
                                where the pursuit of knowledge is harmoniously woven with a foundation of faith. At our distinguished 
                                institution, we believe in cultivating not only brilliant minds but also compassionate hearts, creating
                                a unique environment where academic excellence thrives hand-in-hand with spiritual growth.
                        </p>
                    </div>
                </div>
            </section>

            <!-- ThirdSection --->

            <section id="ThirdSection">
                <div class="ACSpan">
                    <span>Create a better future with CHSI!</span>
                    <button id="EnrollNowCitation">Enroll Now</button>
                </div>
                <div class="ACRightContent">
                    <img src="https://ik.imagekit.io/mygh9x3hg/34430099_2569218163255555.png?updatedAt=1713072195474/tr:w-1280" alt="">
                </div>
            </section>

            <!-- FourthSection --->

            <section id="FourthSection" class="DefaultCont">
                <div class="FourthSecContent">
                </div>
            </section>

            <!-- FifthSection --->

            <section id="FifthSection" class="DefaultCont">
                
            </section>

            <section id="SixthSection">
                <div class="SSContent">
                    <div class="logoSchoolSide2">
                        <img src="../../images/image.png">
                        <h2>CHSI</h2>  
                    </div>

                    <div class="SixthSectionBottom">
                        <h4>Get in Touch</h4>
                        <span>Purok Mabinati-on, Ubaldo D. Laya, Iligan City, Philippines, 9200</span>
                        <span>Contact Us:228-0316 / 223-0200</span>
                        <br>
                        <div class="SixthImage">
                            <a href="https://web.facebook.com/ChristianHorizonSchoolInc"><img src="../../images/facebook-logo-1.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="SeventhSection">
                <div id="CopyrightArea">
                    <div class="CopyrightLeft">
                        <span>&#169; 2024 Christian Horizon School Incorporated</span>
                    </div>
                    <div class="CopyrightRight">
                        <span>Developed by Justine Cua</span>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script type="module" src="./homepage.js"></script>
    <script>
    const swiper = new Swiper('.swiper', {
        direction: 'horizontal',
        pagination: {
            el: ".swiper-pagination",
        },
        
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
        effect: "fade",
        autoplay: {
        delay: 4000,
        },
    });


    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);//prevents resubmission of data in DB while refreshing
    }
    </script>

</body>

</html>
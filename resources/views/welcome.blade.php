<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BAOBAO</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Aboreto' rel='stylesheet'>
    </head>

    <body>
        <header>
                <div class="logo">BAOBAO</div>
            <ul>
                <li> 
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">
                            <button class="buttonTrans ">Log In</button>
                    </a>
                    @endif
                </li>
                <li> 
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        <button class=" buttonTrans ">Sign Up</button>
                    </a>  
                    @endif
                </li>    
            </ul>
        </header>

        <!-- --------------------photo gallery 1------------------------------------ -->
            <div class="content">
            
            <div class="photo-gallery">
                <div class="text2" align="left">
                    <h3>Every day</h3>
                    <h3>every way</h3>
                </div> 
                <br>
                <div class="text1 " align="left">
                    <h2>BEST CLOTHES AROUND THE WORLD</h2>
                </div>     
                <br>
                <div class="text3" align="left">
                    <p>Experience unmatched comfort with our ultra-soft, stylish t-shirts! Perfect for any occasion, these tees are made to keep you cozy all day. Shop now for your perfect fit.</p>
                </div>   
            </div>

                <br>
                <br>
                <!-- Slideshow container -->
                <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <img src="{{ asset('pictures/starter.png') }}" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('pictures/starter2.png') }}" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('pictures/starter3.png') }}" style="width:100%">
                </div>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                </div>
                        
                        <br>
                        <!--go to display_product -->
                        <div>  
                            @if (Route::has('display_product'))
                                <a href="{{ route('display_product') }}">
                                    <button class="buttonTrans">Find out more</button>
                                </a>  
                            @endif
                        </div>     
            </div>    
                <br>

                
<!-- --------------------photo gallery 2------------------------------------ -->
        <div class="photo-gallery">
            <div class="container4">
                <img src="{{ asset('pictures/grey2.png') }}" alt="Avatar" class="image">
                <div class="overlay4">
                    <img src="{{ asset('pictures/sew.png') }}" alt="Avatar" class="image">
                </div>
            </div>

            <div class="container4">
                <img src="{{ asset('pictures/white.png') }}" alt="Avatar" class="image">
                <div class="overlay4">
                    <img src="{{ asset('pictures/wool.png') }}" alt="Avatar" class="image">
                </div>
            </div>

            <div class="container4">
                <img src="{{ asset('pictures/color.png') }}" alt="Avatar" class="image">
                <div class="overlay4">
                    <img src="{{ asset('pictures/fabric_texture.png') }}" alt="Avatar" class="image">
                </div>
            </div>
        </div>

            <br>
            <br>
            <br>
<!-- --------------------footer------------------------------------ -->
            <div class=”footer-content”>
                <footer class="footer">Copyright © 2024 BAOBAO.com. Ltd. All rights reserved.</footer>  
            </div>
                  
    </body>



<!------------------------------------ style ------------------------------->
    <style>
        *{
        margin: 0;
        padding:0;
        box-sizing: border-box;
        background : #FFFCF8;
        /* overflow: hidden; */
        }
        .photo-gallery {
            display: flex;
            gap: 10px; /* Adjusts spacing between the images */
            justify-content: center; /* Centers the row within its parent container */
            align-items: center; /* Aligns items vertically */
            margin-top: 20px; /* Adds space above the gallery if needed */
        }
        .container4 {
            position: relative;
            width: 50%;
        }

        .image {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay4 {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: opacity 0.5s ease;
            background-color: rgba(0, 0, 0, 0.6); /* Slight dark background to enhance overlay visibility */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Ensures the inner image overlay fits within the container */
        .image-overlay {
            width: 80%; /* Adjust size if needed */
            height: auto;
        }

        /* Show overlay on hover */
        .container4:hover .overlay4 {
            opacity: 1;
        }

        .logo {
            font-family: "Aboreto"; 
            font-size: 2rem;
            letter-spacing: 1px;
            font-weight: bold;
            transition: color 0.3s ease; /* Smooth transition for color change */
        }
        .buttonTrans {     
            background-color: Transparent;
            background-repeat:no-repeat;
            display: inline-block;
            cursor:pointer;
            overflow: hidden;
            font-family: "Aboreto";   
            border-radius: 5px;
            padding: 8px 16px;
            transition: background-color 0.3s, color 0.3s;   
        }
        header {
    position: fixed; /* Keep the header at the top */
    display: flex;
    top: 0;
    left: 0;
    width: 100%; /* Full width of the page */
    padding: 20px 20px;
    justify-content: space-between; /* Space between logo and buttons */
    align-items: center; /* Center items vertically */
    background-color: #FFFCF8; /* Adjust if needed */
    z-index: 1000; /* Ensure header is above other elements */
}
        header ul{
            background-color: Transparent;
            position: relative;
            display:flex;
            gap: 1px; /* Adds space between buttons */
        }
        header ul li{
            list-style: none;
        }
        header ul li a{
            display: inline-block;
            color: #fff;
            font-weight:400;
            margin-left: 40px;
        }
        /* section{
            position: relative;
            width: 100%;
            min-height: 100vh;
            padding:100px;
            display: flex;
            justify_content: space-between;
            align-item: center;
        } */
    
        header::after {
            content: '';
            position: absolute;
            bottom: 0; /* Position it at the bottom of the header */
            left: 0;
            right: 0;
            height: 2px; /* Height of the border */
            background-color: #e3e3e3; /* Color of the border */
            z-index: 1; /* Ensures the border is above the circle */
        }
        .buttonTrans:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Slightly darken on hover */
            color: #000; /* Change text color on hover for better contrast */
        }
        .text1 {
            color: #B99470;
            font-family: "Poppins";
            margin-top: 20px; 
            margin-bottom: 10px;
            /* overflow: hidden; */
            margin-left: 20px;
            margin-right: 20px;
 
        }

        .text2 {
            font-family: "Copperplate";
            color: #776B5D;
            font-size: 3rem;
            margin-top: 15px; 
            margin-bottom: 15px;
            /* overflow: hidden; */
            margin-left: 20px;
            margin-right: 20px;
 
        }

        .text3 {
            font-family: "Poppins";
            color: #5E6282;
            margin-top: 20px; 
            margin-bottom: 30px; 
            line-height: 1.6;
            overflow: hidden;
            margin-left: 20px;
            margin-right: 20px;
 
        }
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 80px); /* Adjust height to account for the header */
            text-align: center;
            padding-top: 80px; /* Ensure space for the fixed header */
            z-index: 10;
        }
        footer {
            justify-content: center;
            background: #776B5D;
            height: auto;
            width: 100vw;
            padding-top: 40px;
            text-align: center;
            color: #fff;
            text-align: center;
            /* position: relative; Position relative to allow it to flow */
        }
        .footer-content{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }
        .socials{
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1rem 0 3rem 0;
        }
        .socials li{
            margin: 0 10px;
            color: white;
        }
        .socials a{
            text-decoration: none;
            color: white;
            border: 1.1px solid white;
            padding: 5px;
            border-radius: 50%;
        }
        .socials a i{
            font-size: 1.1rem;
            width: 20px;
            transition: color .4s ease;
            color: white;
        }
        .socials a:hover i{
            color: aqua;
        }
        .image {

        }

        .image img {
            width: 100%; /* Make the image fit the full width of the container */
            height: auto; /* Maintain the aspect ratio */
            display: block; /* Remove bottom space caused by inline-block */
        }
        /* Slideshow container */
        .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
    width: 100%; /* Make the container full width */
    overflow: hidden; /* Hide any overflow */
}

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }
    </style>



<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) { slideIndex = 1 }
      if (n < 1) { slideIndex = slides.length }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";  
      dots[slideIndex - 1].className += " active";
    }

    setInterval(() => {
      plusSlides(1);
    }, 10000); // Change image every 5 seconds
    </script>
</html>
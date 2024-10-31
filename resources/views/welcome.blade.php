<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DataBase Project</title>

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
                
                    <div class="content">
                        <div class="text1">
                            <h2>BEST CLOTHES AROUND THE WORLD</h2>
                        </div>     
                        <br>
                        <div class="text2">
                            <h3>"Every day, every way "</h3>
                        </div> 
                        <br>
                        
                        <div class="text3">
                            <p>Experience unmatched comfort with our ultra-soft, stylish t-shirts! Perfect for any occasion, these tees are made to keep you cozy all day. Shop now for your perfect fit.</p>
                        </div> 
                        
                        <br>

                        <div class="image">
                            <img src="{{ asset('pictures/starter.png') }}" alt="Product Image">
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
                </div>          
            </div>
                    
            <div class=”footer-content”>
                <footer class="footer">Copyright © 2024 BAOBAO.com. Ltd. All rights reserved.</footer>  
        </div>
            </div>       
    </body>




    <style>
        *{
        margin: 0;
        padding:0;
        box-sizing: border-box;
        background : #FFFCF8;
        /* overflow: hidden; */
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
        header{
            position: fixed; /* Keep the header at the top */
            display: flex;
            top: 0;
            left: 0;
            width: 100%; /* Full width of the page */
            padding: 20px 20px;
            justify-content: space-between; /* Space between logo and buttons */
            align-items: center; /* Center items vertically */
            background-color: #FFFCF8; /* Adjust if needed */
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
        .text1{
            color: #B99470;
            font-family: "Poppins";
        }
        .text2{
            font-family: "Copperplate",;
            color: #776B5D;
            font-size: 3rem;

        }
        .text3{
            font-family: "Poppins";
            color: #5E6282;

        }
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            padding: 100px 20px; /* Added padding-top for header space */
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
            width: 100%; /* Make the container full width */
            overflow: hidden; /* Hide any overflow */
        }

        .image img {
            width: 100%; /* Make the image fit the full width of the container */
            height: auto; /* Maintain the aspect ratio */
            display: block; /* Remove bottom space caused by inline-block */
        }



    </style>
</html>
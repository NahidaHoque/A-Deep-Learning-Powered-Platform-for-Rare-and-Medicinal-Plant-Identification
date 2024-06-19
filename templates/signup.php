<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Medicinal plant website</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <style>
      :root {
        --green: rgb(70, 180, 19);
        --black: white;
        --light-color: white;
        --box-shadow: 0 0.5rem 1.5rem rgba(73, 11, 11, 0.1);
      }

      * {
        font-family: "Nunito Sans", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        outline: none;
        border: none;
        text-transform: capitalize;
        transition: all 0.2s linear;
      }

      html {
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-padding-top: 5.5rem;
        scroll-behavior: smooth;
      }

      .banner {
        width: 100%;
        height: 100vh;
        position: relative;
        overflow: hidden;
      }

      .slider {
        width: 100%;
        height: 100vh;
        position: absolute;
      }

      #slideimg {
        width: 100%;
        height: 100%;
        animation: zoom 3s linear infinite;
      }

      @keyframes zoom {
        0% {
          transform: scale(1.3);
        }
        15% {
          transform: scale(1);
        }
        85% {
          transform: scale(1);
        }

        100% {
          transform: scale(1.3);
        }
      }

      .overlay {
        width: 100%;
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8));
        position: absolute;
        top: 0;
      }

      section {
        padding: 2rem 9%;
      }

      section:nth-chile(even) {
        background: #eee;
      }

      .sub-heading {
        text-align: center;
        color: var(--green);
        font-size: 2rem;
        padding-top: 1rem;
      }

      .heading {
        text-align: center;
        color: var(--black);
        font-size: 3rem;
        padding-bottom: 2rem;
        text-transform: uppercase;
      }

      .btn {
        margin-top: 1rem;
        display: inline-block;
        font-size: 1.7rem;
        color: #fff;
        background: var(--black);
        border-radius: 0.5rem;
        cursor: pointer;
        padding: 0.8rem 3rem;
      }

      .btn:hover {
        background: var(--green);
        letter-spacing: 0.1rem;
      }
      header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.233);
        padding: 1rem 7%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 1000;
        box-shadow: var(--box-shadow);
      }

      header .logo {
        color: rgba(122, 235, 70, 0.699);
        font-size: 2.5rem;
        font-weight: bolder;
        margin-left: 10px;
      }

      header .logo i {
        color: var(--green);
      }

      header .navbar a {
        font-size: 1.7rem;
        border-radius: 0.5rem;
        padding: 0.5rem 1.5rem;
        color: var(--light-color);
      }

      header .navbar a.active {
        color: rgb(77, 218, 64);
      }

      header .navbar a:hover {
        color: #fff;
        background: rgb(64, 104, 5);
      }

      header .icons i,
      header .icons a {
        cursor: pointer;
        margin-left: 0.5rem;
        height: 4.5rem;
        line-height: 4.5rem;
        width: 4.5rem;
        text-align: center;
        font-size: 1.7rem;
        color: var(--black);
        border-radius: 50%;
        background: black;
      }

      header .icons #menu-bars {
        display: none;
      }

      .content {
        width: 60%;
        margin: 80px auto 0;
        text-align: center;
        color: #5fbb14;
      }

      .content h1 {
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
      }

      .content h3 {
        width: 80%;
        margin: 20px auto 100px;
        font-weight: 100;
        line-height: 20px;
      }

      .signin-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 500px;
            background-color: rgba(0, 0, 0, 0.637);
            margin-top: 20px;
            
            
        }

        .signin-box {
            background-color: rgba(1, 30, 39, 0.945);
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        .signin-title {
            
            font-size: 24px;
            margin-bottom: 15px;
            text-align: center;
            /*background-color: rgba(2, 49, 63, 0.945);*/
            font-family: Arial, Helvetica, sans-serif;
        }

        .input-group {
            margin-bottom: 2px;
        }

        .input-label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: left;
        }

        .input-field {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .signin-button {
            width: 100%;
            padding: 10px;
            background-color:green;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left:0px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .signin-button:hover {
            background-color: rgb(2, 54, 2);
        }

      .sub-menu-wrap {
        position: absolute;
        top: 100%;
        right: 10%;
        width: 320px;
        max-height: 0px;
        overflow: hidden;
        transition: max-height 0.5s;
      }

      .sub-menu-wrap.open-menu {
        max-height: 400px;
      }

      .sub-menu {
        background: rgba(0, 0, 0, 0.637);
        padding: 20px;
        margin: 10px;
      }

      .user-info {
        display: flex;
        align-items: center;
      }

      .user-info h2 {
        font-weight: 500;
        color: #ccc;
      }

      .user-info img {
        width: 40px;
        border-radius: 50%;
        margin-right: 15px;
      }

      .sub-menu hr {
        border: 0;
        height: 1px;
        width: 100%;
        background: #ccc;
        margin: 15px 0 10px;
      }

      .sub-menu .sub-menu-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #525252;
        margin: 12px 0;
      }

      .sub-menu .sub-menu-link p {
        align-items: center;
        font-size: small;
        color: #ccc;
        margin-right: 15px;
        white-space: nowrap;
      }

      .sub-menu .sub-menu-link img {
        width: 40px;
        background: #e5e5e5;
        border-radius: 50%;
        padding: 8px;
        margin-right: 15px;
        transition: transform 0.5s;
      }

      .sub-menu .sub-menu-link span {
        font-size: 20px;
        transition: transform 0.5s;
        padding-left: 90px;
      }

      .sub-menu .sub-menu-link:hover span {
        transform: translateX(5px);
      }

      .body {
        background-color: none;
        width: 100%;
        height: 600px;
      }

      #imageInput {
        margin-top: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        margin-left: 20px;
      }

      button {
        margin-top: 10px;
        margin-left: 20px;
        padding: 10px 20px;
        background-color: #4caf50;
        color: rgb(255, 255, 255);
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      button:hover {
        background-color: #45a049;
      }

      #messageBox {
        margin-left: 20px;
        margin-right: 100px;
        padding: 10px;
        background-color: #1b5006;
        color: white;
        border-radius: 5px;
        display: none; 
        font-size: medium;
      }

      #predictionBox{
        background-color: #1b5006;
        color: white;
        border-radius: 5px;
        margin-left: 20px;
        font-size: medium;
        padding: 10px;
      }

      #previewContainer {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      #preview {
        max-width: 100%;
        max-height: 580px;
        margin-top: 20px;
        border: 1px solid #ddd;
        padding: 10px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      #preview img {
        max-width: 200px;
        max-height: 200px;
        border: 1px solid #ddd;
        border-radius: 5px;
      }

      /* Footer Styles */
      footer {
        background-color: #333;
        color: #fff;
        padding: 30px 0;
        text-align: center;
      }

      .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
      }

      .footer-logo a {
        color: rgb(64, 104, 5);
        text-decoration: none;
        font-size: 24px;
        text-align: left;
      }

      .footer-links ul {
        list-style: none;
        padding-left: 0;
      }

      .footer-links li {
        margin-bottom: 10px;
      }

      .footer-links a {
        color: #fff;
        text-decoration: none;
        font-size: 12px;
      }

      .footer-links h2 {
        color: #ffffff5b;
        text-decoration: none;
        font-size: 16px;
        margin-bottom: 10px;
      }

      .footer-contact h2 {
        color: #ffffff5b;
        margin: 5px 0;
        font-size: 14px;
        margin-bottom: 10px;
      }
      .footer-contact p {
        color: #fff;
        margin: 5px 0;
        font-size: 12px;
      }
      .footer-legal ul {
        list-style: none;
        padding-left: 0;
      }

      .footer-legal li {
        margin-bottom: 16px;
      }

      .footer-legal h2 {
        color: #ffffff5b;
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 10px;
      }

      .footer-legal a {
        color: #fff;
        text-decoration: none;
        font-size: 12px;
      }

      .footer-social a {
        display: inline-block;
        margin: 0 10px;
        color: #fff;
        font-size: 20px;
      }

      .footer-social h2 {
        color: #ffffff5b;
        text-decoration: none;
        font-size: 20px;
        margin-bottom: 10px;
      }

      .footer-bottom {
        margin-top: 20px;
      }

      .footer-bottom p {
        margin: 0;
      }
    </style>
  </head>
  <body onload="slider()">
    <header>
      <a href="#" class="logo"
        ><i class="fa-solid fa-leaf"></i>MedicinalPlant</a
      >

      <nav class="navbar">
        <a class="active" href="home.html">home</a>
        <a href="#about">About Us</a>
        <a href="#plant">Plant</a>
        <a href="signup.html">Sign Up</a>
        <a href="login.html">log In</a>
      </nav>

      <a href="#"></a>
      <a href="#"></a>
    </header>

    <div class="banner">
        <div class="slider">
            <img src="images/slide1.jpg" id="slideimg">
            
        </div>
        <div class="overlay">
           <div class="content">
            <div class="sub-heading">Join us for a healthier life</div>
            <div class="signin-container">
                <div class="signin-box">
                    <h3 class="signin-title">Sign UP</h3>
                    <form>
                        <div class="input-group">
                            <label class="input-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="input-field" placeholder="Enter your username">
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="input-field" placeholder="Enter your password">
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="confpassword">Password</label>
                            <input type="password" id="confpassword" class="input-field" name="confpassword" placeholder="Enter your password">
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="user">User Type</label>
                            <select id="user" class="input-field" name="usertype" style="background-color: #212120;color:white">
                                <option value="hidden" style="color:white" disabled selected hidden>--Please select user type--</option>
                                <option value="admin" style="color:white">Admin</option>
                                <option value="photographer" style="color:white">Researcher</option>
                                <option value="normaluser" style="color:white">User</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="email">Email</label>
                            <input type="email" id="email" class="input-field" placeholder="Enter your Email">
                        </div>
                        <button type="submit" class="signin-button">Sign In</button>
                    </form>
                </div>
            </div>
           </div>
        </div>
    </div>

    <footer>
      <div class="footer-content">
        <div class="footer-logo">
          <a href="#" class="logo"><i class="fas fa-leaf"></i>Plant</a><br />
        </div>
        <div class="footer-links">
          <h2>Explore</h2>
          <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="#plant">Plant</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="signup.html">Sign Up</a></li>
            <li><a href="login.html">Log In</a></li>
          </ul>
        </div>
        <div class="footer-contact">
          <h2>Contact Us:</h2>
          <p>Email: info@plantwebsite.com</p>
          <p>Phone: +123-456-7890</p>
          <p>Address: 123 Street, Dhaka, Bangladesh</p>
        </div>
        <div class="footer-legal">
          <ul>
            <h2>Legal</h2>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy</a></li>
          </ul>
        </div>
        <div class="footer-social">
          <h2>Follow US</h2>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
          <a href="#"><i class="fa-brands fa-telegram"></i></a>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2023 MedicinalPlant Website. All rights reserved.</p>
      </div>
    </footer>

    <script>
      
      var slideimg = document.getElementById("slideimg");

      var images = new Array(
        "images/slide1.jpg",
        "images/slide2.jpeg",
        "images/slide3.jpg",
        "images/slide4.jpg",
        "images/slide5.jpg",
        "images/slide6.jpg"
      );
      var len = images.length;
      var i = 0;

      function slider() {
        if (i > len - 1) {
          i = 0;
        }
        slideimg.src = images[i];
        i++;
        setTimeout("slider()", 3000);
      }
    </script>
  </body>
</html>

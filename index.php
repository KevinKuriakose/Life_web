<?php

include('connection.php');

$adminusr="admin@lifemace.xyz";
$adminpass="admin";
  if(isset($_POST['btn_login']))
  {
      $usr=$_POST['us_name'];
      $usrpass=$_POST['pass'];
      if($usr==$adminusr)
      {
        if($usrpass==$adminpass)
        {
          
          header("location:HomePage.php");  
        }
        else
        { 
          echo '<script language="javascript">';
            echo 'alert("INVALID PASSWORD")';  //not showing an alert box.
            echo '</script>';
        }
      }
      
      
  }
?>


<!DOCTYPE html>
  <html>
    <head>
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
      <!--Import materialize.css-->
       <link rel="stylesheet" href="materialize/materialize.min.css">
<link rel="icon" type="image/png" href="images/logolife.png"></link>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<title>L I F E</title>
    </head>
    <body >

 
         <nav>
      <div class="nav-wrapper light-blue darken-1">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#home" >Home</a></li>
    <li><a href="#about" >About Life</a></li>
    <li><a href="#contact" >Contact</a></li>
    <li><a href="" onclick="$('#login').modal('open');"><button data-target="login"  class="btn modal-trigger waves-effect waves-light light-blue lighten-1" style="border: 2px solid #fff;">Login</button></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><div class="user-view">
      <div class="background">
        <img src="images/logolife.png" width="220px" height="170px">
      </div>
      </div></li>
          <li><a href="#home" class="waves-effect"><i class="material-icons">album</i>Home</a></li>
    <li><a href="#about" class="waves-effect"><i class="material-icons">all_inclusive</i>About Life</a></li>
    <li><a href="#contact" class="waves-effect"><i class="material-icons">contacts</i>Contact</a></li>
    <li><a href="#login" onclick="$('#login').modal('open');" class=" btn modal-trigger light-blue lighten-1"><i class="material-icons">account_box</i>Login</a></li>
    
    <li><div class="divider"></div></li>
        </ul>
      </div>
    </nav>

<div class="parallax-container" data-aos="fade-up-right">
    <div class="parallax" id="home"><img src="images/logolife.png"></div>
  </div>
  <div class="section  white" data-aos="fade-up-right">
    <div class="row container">
      <h2 class="header" id="about">About Life</h2>
      <p class="grey-text flow-text text-darken-3 lighten-3">Intelligent Traffic System is one of the recent research topics in the Internet of Things (Iot).
The ever increasing number of vehicles in modern cities is creating heavy traffic congestion. Not
only the time and money is wasted behind traffic lights, but also many people lose their lives in
emergencies due to delayed services.</p><p class="grey-text flow-text text-darken-3 lighten-3">
To address this issue, we propose an application to manage emergencies and ensure success
rate. The LIFE: Emergency Traffic Scheduler is an android application. The authorised users can
login to the application and initiate a routine in case of emergency. The server issues permissions
and manages the entire traffic system. LIFE furnishes the most scant route to the safe destination
using Google Maps supported by a stable internet connection and GPS service. An android based
micro-controller, along with GPS sensor and WiFi hotspot will be installed at the traffic signal
systems which continually monitor the normal and emergency lighting patterns.
Using Google APIs, Geo-fencing is done around the traffic signals. When a location-aware
device enters or exits these geographic barriers, it gets notified. Once an active device enters the
region, interrupt lighting pattern is triggered which glows green signal over the device trajectory
and on exit from the region, it gets switched back to normal lighting pattern.</p><p class="grey-text flow-text text-darken-3 lighten-3">
The application not only helps ambulances and fire brigades, but is a boon for the common
people to comfortably deal with emergencies. To maximize the benefits and minimize frauding,
the users have to submit valid proofs within a time span. The entire system monitored by a higher
authority, can look into the genuinity and take actions against fraud users.</p>
    </div>
  </div>
  <div class="section light-blue lighten-2" data-aos="fade-up-right">
  
    <div class="row container">
      <h2 class="header white-text" id="contact">Contact Us</h2>
      <div class="video-container">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.5470139393037!2d76.6170001143029!3d10.05418789281404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b07e6154a2133e5%3A0x2c26b2d532bb30ea!2sMar+Athanasius+College+Of+Engineering!5e0!3m2!1sen!2sin!4v1518889369950" width="600" height="450"  frameborder="0" style="border:0" allowfullscreen></iframe></div>
       
      

    </div>
  </div>
  <div class="fixed-action-btn toolbar">
    <a class="btn-floating btn-large light-blue darken-1 pulse">
      <i class="large material-icons">email</i>
    </a>
    <ul>
      <li class="waves-effect waves-light light-blue darken-1"><h4 class="white-text flow-text">Drop an email to admin@lifemace.xyz</li>
      
    </ul>
  </div>
  <div id="login" class="modal">
    <div class="modal-content">
      <h4>Login</h4>
      <p><form class="col s12" method="post" action="">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='us_name' id='us_name' />
                <label for='email'>Enter your email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='pass' id='pass' />
                <label for='password'>Enter your password</label>
              </div>
              
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect light-blue darken-1'>Login</button>
              </div>
            </center>
          </form></p>
    </div>
    
  </div>
      <footer class="page-footer light-blue darken-1">
      <div class="footer-copyright ">
            <div class="container">
            <span style="font-size: 20px;">&copy;</span>&nbsp;<span style="font-family:cursive; font-size: 20px;">2018 Copyright LifeMace</span>
            <a class="white-text text-lighten-4 right" href="#!"><span style="font-family:cursive;font-size: 20px;">Crafted by KK</span></a>
            </div>
          </div>
        </footer>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
        
        <script type="text/javascript" src="materialize/jquery-2.1.1.min.js"></script>
       <script src="materialize/materialize.min.js"></script>

       <script>

  $('.button-collapse').sideNav({
      menuWidth: 220, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true, // Choose whether you can drag to open on touch screens,
      //onOpen: function(el) { /* Do Stuff* / }, // A function to be called when sideNav is opened
     // onClose: function(el) { /* Do Stuff* / }, // A function to be called when sideNav is closed
    }
  );
        
    $(document).ready(function(){
      $('.parallax').parallax();
      $('.modal').modal();
      $(function() {
  AOS.init();
});

$(window).on('load', function() {
  AOS.refresh();
});
    });
   
        
       </script>
    </body>
    </html>
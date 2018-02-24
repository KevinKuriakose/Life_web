<?php

include('connection.php');

$adminusr="admin";
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
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->
       <link rel="stylesheet" href="materialize/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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

<div class="parallax-container">
    <div class="parallax" id="home"><img src="images/logolife.png"></div>
  </div>
  <div class="section  white">
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
  <div class="section light-blue lighten-2">
  
    <div class="row container">
      <h2 class="header" id="contact">Contact Us</h2>
       <div class="row">
       <div class="col s4"><div class="card small">
          <div class="card-image">
            <img src="http://materializecss.com/images/sample-1.jpg">
            <span class="card-title">Card Title</span>
          </div>
          <div class="card-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, voluptatum soluta aspernatur quod quaerat saepe accusamus ducimus dolore commodi, rem.</p>
          </div>
          <div class="card-action">
            <a href="#">This is a link</a>
          </div>
        </div></div>
       <div class="col s4"><div class="card small">
          <div class="card-image">
            <img src="http://materializecss.com/images/sample-1.jpg">
            <span class="card-title">Card Title</span>
          </div>
          <div class="card-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, voluptatum soluta aspernatur quod quaerat saepe accusamus ducimus dolore commodi, rem.</p>
          </div>
          <div class="card-action">
            <a href="#">This is a link</a>
          </div>
        </div></div>
       <div class="col s4"><div class="card small">
          <div class="card-image">
            <img src="http://materializecss.com/images/sample-1.jpg">
            <span class="card-title">Card Title</span>
          </div>
          <div class="card-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, voluptatum soluta aspernatur quod quaerat saepe accusamus ducimus dolore commodi, rem.</p>
          </div>
          <div class="card-action">
            <a href="#">This is a link</a>
          </div>
        </div></div>
     </div>
    </div>
  </div>
  <div id="login" class="modal">
    <div class="modal-content">
      <h4>Login</h4>
      <p><form class="col s12" method="post">
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
    });
   
        
       </script>
    </body>
    </html>
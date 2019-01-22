<?php

// Core Initialization
require_once 'core/init.php';

echo "<div class='maincontact'>";

// Header
include 'includes/header.php';
?>
<style>
.contact {
    width:900px;
    margin:250px auto 0;
    display:flex;
}
.contact .box {
    position:relative;
    width: 300px;
    height:100px;
    box-sizing:border-box;
    text-align:center;
    margin:0 10px;
    background:#00171d;
    overflow:hidden;
    border-radius:4px;
    box-shadow:0 0 0 2px rgba(0,7,10,1);
}
.contact .box .icon {
    width:100%;
    height:100%;
    background:#00171d;
    transition: 0.5s;
}
.contact .box .icon .fa {
    font-size: 4em;
    line-height:100px;
    color: #0ff;
}
.contact .box:hover .icon {
    transform:scale(0);
}
.contact .box .details {
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:#03a9f4;
    transition:0.5s;
    transform:scale(2);
    opacity:0;
}
.contact .box:hover .details {
    transform:scale(1);
    opacity:1;
}
.contact .box .details h3 {
    margin:0;
    padding:0;
    line-height:100px;
    font-size:22px;
    color:#fff;
}
.contact .box .details:nth-child(2) .details {
    background:#e91e63;
}
.contact .box .details:nth-child(2) .details {
    background:#607d8b;
}
</style>

    <div class="contact">

    	<div class="box" id="name">
            <label for="name" style="color: white; font-size:25px; text-align: center; vertical-align:middle; margin-top: 30px;">Fullname</label>
    		<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
    		<div class='details'><h3>Radosław Czapp</h3></div>
    	</div>

    	<div class="box" id="number">
            <label for="number" style="color: white; font-size:25px; text-align: center; vertical-align:middle; margin-top: 30px;">Phone number</label>
    		<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
    		<div class='details'><h3>+48 505 153 346</h3></a></div>
    	</div>

    	<div class="box" id="email">
            <label for="email" style="color: white; font-size:25px; text-align: center; vertical-align:middle; margin-top: 30px;">Email adress</label>
    		<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    		<div class='details'><h3>czappradoslaw@gmail.com</h3></div>
    	</div>
    </div>

  <?php

  echo "</div> <!-- //maincontact -->";
  include 'includes/footer.php';

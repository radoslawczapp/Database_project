<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Reviews</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="shortcut icon" href="https://icons-for-free.com/free-icons/png/512/1055107.png" />

    <style media="screen">
      .maincontainer {
        margin-top: 70px;
      }
    </style>
  </head>
  <body>

    <div class="container">
    <div class="row">

      <nav class="navbar navbar-inverse navbar-fixed-top bg-dark">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="index.php">

              Book Reviews
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>

          </ul>

          <?php $user = new User(); if ($user->isLoggedIn()) { ?>
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo escape($user->data()->name); ?> <span class="caret"></span></a>

              <ul class="dropdown-menu">
                <li><a href="add.php">Add review</a></li>
                <li><a href="profile.php?user=<?php echo escape($user->data()->username); ?>">Profile </a></li>
                <li><a href="update.php">Update Name</a></li>
                <li><a href="changepassword.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>

              </ul>

            </li>
          </ul>
          <?php } // end isLoggedIn
          else { ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
            </ul>
            <?php } // end else  ?>

        </div><!--/.nav-collapse -->

      </div>
    </nav>

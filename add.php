<?php

require_once 'core/init.php';

echo "<div class='maincontainer'>";

include 'includes/header.php';

// if (!$username = Input::get('user')) {
//     Redirect::to('index.php');
// } else {
//   $user = new User($username);
  if (!$user->exists()) {
    Redirect::to(404);
  } else {
    $data = $user->data();
  // }
if(Input::exists()){
  try {
      $author = Input::get('author');
      $title = Input::get('title');
      $review = Input::get('review');
      DB::getInstance()->query("INSERT INTO bookstand VALUES(NULL, '$author', '$title', '$review')");

    Session::flash('home', '<p class="label label-success">You added a new review!</p>');
    // Redirect::to('index.php');

  } catch (Exception $e) {
    die($e->getMessage());
  }
  Redirect::to('index.php');
}
  ?>

  <div class="form-group ml-md-auto">
  <form method="post" action="add.php" class="form-group">
      <label for="author">Author</label>
      <input type="text" name="author" class="form-control" id="author"><br>
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" id="title"><br>
      <label for="review">Review</label>
      <textarea name="review" class="form-control" cols="30" rows="15" id="review"></textarea><br>
      <input type="submit" value="Add" class="btn btn-primary">
  </form>
  </div>


  <?php
}


  echo "</div> <!-- //maincontainer -->";
  include 'includes/footer.php';

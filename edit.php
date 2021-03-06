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

  ?>
  <?php
  $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
  echo $id;
  if(Input::exists()){

    try {
        $author = Input::get('author');
        $title = Input::get('title');
        $review = Input::get('review');

        DB::getInstance()->query("UPDATE `bookstand` SET `author` = '$author', `title` = '$title', `review` = '$review' WHERE id = '$id'");

      Session::flash('home', '<p class="label label-success">Review had been edited!</p>');
      // Redirect::to('index.php');

    } catch (Exception $e) {
      die($e->getMessage());
    }
    // Redirect::to('index.php');
  }

$sths = DB::getInstance()->query("SELECT * FROM bookstand WHERE id = '$id'");
// print_r($sths->results());

foreach ($sths->results() as $sth) {  ?>

  <div class="form-group ml-md-auto">
  <form method="post" action="edit.php" class="form-group">
      <label for="author">Author</label>
      <input value="<?php echo $sth->author; ?>" type="text" name="author" class="form-control" id="author"><br>
      <label for="title">Title</label>
      <input value="<?php echo $sth->title; ?>" type="text" name="title" class="form-control" id="title"><br>
      <label for="review">Review</label>
      <textarea name="review" class="form-control" cols="30" rows="15" id="review"><?php echo $sth->review; ?></textarea><br>
      <input type="submit" value="Edit" class="btn btn-success">
  </form>
  </div>
<?php } ?>




  <?php
}

  echo "</div> <!-- //maincontainer -->";
  include 'includes/footer.php';

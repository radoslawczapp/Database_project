<?php

require_once 'core/init.php';

echo "<div class='maincontainer'>";

include 'includes/header.php';

try {
    $id = $_GET['id'];
    echo $id;

    DB::getInstance()->query("DELETE FROM bookstand WHERE id = '$id'");

    Session::flash('home', '<p class="label label-danger">You deleted a review!</p>');
    Redirect::to('index.php');
} catch (Exception $e) {
    die($e->getMessage());
}

  echo "</div> <!-- //maincontainer -->";
  include 'includes/footer.php';

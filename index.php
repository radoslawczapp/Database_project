<?php
require_once 'core/init.php';

include 'includes/header.php';

echo "<div class='maincontainer'>";

if (Session::exists('home')) {
  echo '<p>' . Session::flash('home') .  '</p>';
}

$user = new User();
if ($user->isLoggedIn()) {

  // echo "<p class='label label-success'>Success! You are logged in!</p><br><br>";
}
echo "</div> <!-- //maincontainer -->";
$reviews = DB::getInstance()->query('SELECT * FROM bookstand');

// foreach($reviews->results() as $review){
//     echo $review->author, '<br>';
// }
?>

    <table class="table table-striped table-bordered mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col" width="15%">Title</th>
                <th scope="col" width="15%">Author</th>
                <th scope="col">Review</th>
<?php if($user->isLoggedIn()){ ?>
                <th scope="col" colspan="2" class="text-center" width="20%">Options</th>
                <?php } ?>
            </tr>
        </thead>
<?php foreach($reviews->results() as $review){ ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $review->title ?></td>
                <td><?php echo $review->author ?></td>
                <td><?php echo $review->review ?></td>
<?php if($user->isLoggedIn()){ ?>
                <td style="text-align: center;"><a href="delete.php?id=<?php echo $review->id; ?>" class="btn btn-danger m-2" onclick="return checkDelete()">Delete</a></td>
                <td style="text-align: center;"><a href="add.php?id=<?php echo $review->id; ?>" class="btn btn-success m-2">Edit</a></td>
<?php } ?>
            </tr>
        </tbody>
<?php } ?>
    </table>


<?php
include 'includes/footer.php';
?>

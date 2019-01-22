<?php

require_once 'core/init.php';

echo "<div class='maincontainer'>";

include 'includes/header.php';

  if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'username' => array(
          'required' => true,
          'min' => 2,
          'max' => 20,
          'unique' => 'users'
        ),
        'password' => array(
          'required' => true,
          'min' => 6
        ),
        'password_again' => array(
          'required' => true,
          'matches' => 'password'
        ),
        'name' => array(
          'required' => true,
          'min' => 2,
          'max' => 50
        )
      ));

      if ($validation->passed()) {
          $user = new User();
          try {

            $salt = Hash::salt(32);

            $user->create(array(
              'username' => Input::get('username'),
              'password' => Hash::make(Input::get('password'), $salt),
              'salt' => $salt,
              'name' => Input::get('name'),
              'joined' => date('Y-m-d H:i:s'),
              'group' => 1
              //'' => '',
            ));

            Session::flash('home', '<p class="label label-success">You have been registered and can now log in!</p>');
            //header('Location: index.php');
            Redirect::to('index.php');

          } catch (Exception $e) {
            die($e->getMessage());
          }

      } else {
        //print_r($validation->errors());
        foreach ($validation->errors() as $error) {
          echo $error, '<br>';
        }
      }
    }
  }
?>

<form class="" action="" method="post">
  <div class="field form-group">
    <label for="name">Your Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name" autocomplete="off">
  </div>

  <div class="field form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo escape(Input::get('username')); ?>" id="username" autocomplete="off">
  </div>

  <div class="field form-group">
    <label for="password">Choose a password</label>
    <input type="password" class="form-control" name="password" value="" id="password" autocomplete="off">
  </div>

  <div class="field form-group">
    <label for="password_again">Enter your password again</label>
    <input type="password" class="form-control" name="password_again" value="" id="password_again" autocomplete="off">
  </div>
  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
  <input type="submit" class="btn btn-success" value="Register">

</form>

<?php
  echo "</div> <!-- //maincontainer -->";
  include 'includes/footer.php';
?>

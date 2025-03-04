<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['first'] ) )
{
  
  if( $_POST['first'] and $_POST['last'] and $_POST['email'] and $_POST['password'] )
  {
    
    $submitUser = 'INSERT INTO users (
        first,
        last,
        email,
        password,
        status
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['first'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['last'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
        "'.md5( $_POST['password'] ).'",
        "'.$_POST['status'].'"
      )';
    mysqli_query( $connect, $submitUser );
    
    set_message( 'User has been added' );
    
  }

  header( 'Location: users.php' );
  die();
  
}

?>

<h2>Add User</h2>

<form method="post">
  
  <label for="first" class="label-primary">First Name:</label>
  <input type="text" name="first" id="first" class="input-primary">
  
  <br>
  
  <label for="last" class="label-primary">Last Name:</label>
  <input type="text" name="last" id="last" class="input-primary">
  
  <br>
  
  <label for="email" class="label-primary">Email:</label>
  <input type="email" name="email" id="email" class="input-primary">
  
  <br>
  
  <label for="password" class="label-primary">Password:</label>
  <input type="password" name="password" id="password" class="input-primary">
  
  <br>
  
  <label for="active" class="label-primary">Active:</label>
  <?php
  
  $values = array( 'Yes', 'No' );
  
  echo '<select name="active" id="active">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <input type="submit" value="Add User">
  
</form>

<p><a href="users.php"><i class="fas fa-arrow-circle-left"></i> Return to User List</a></p>


<?php

include( 'includes/footer.php' );

?>
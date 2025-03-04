<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: users.php' );
  die();
  
}

if( isset( $_POST['first'] ) )
{
  
  if( $_POST['first'] and $_POST['last'] and $_POST['email'] )
  {
    
    $userEdit = 'UPDATE users SET
      first = "'.mysqli_real_escape_string( $connect, $_POST['first'] ).'",
      last = "'.mysqli_real_escape_string( $connect, $_POST['last'] ).'",
      email = "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
      active = "'.$_POST['active'].'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $userEdit );
    
    if( $_POST['password'] )
    {
      
      $pwd = 'UPDATE users SET
        password = "'.md5( $_POST['password'] ).'"
        WHERE id = '.$_GET['id'].'
        LIMIT 1';
      mysqli_query( $connect, $pwd );
      
    }
    
    set_message( 'User has been updated' );
    
  }

  header( 'Location: users.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM users
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: users.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit User</h2>

<form method="post">
  
  <label for="first" class="label-primary">First Name:</label>
  <input type="text" name="first" id="first" value="<?php echo htmlentities( $record['first'] ); ?>" class="input-primary">
  
  <br>
  
  <label for="last" class="label-primary">Last Name:</label>
  <input type="text" name="last" id="last" value="<?php echo htmlentities( $record['last'] ); ?>" class="input-primary">
  
  <br>
  
  <label for="email" class="label-primary">Email:</label>
  <input type="email" name="email" id="email" value="<?php echo htmlentities( $record['email'] ); ?>" class="input-primary">
  
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
    if( $value == $record['active'] ) echo ' selected="selected"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <input type="submit" value="Edit User">
  
</form>

<p><a href="users.php"><i class="fas fa-arrow-circle-left"></i> Return to User List</a></p>


<?php

include( 'includes/footer.php' );

?>
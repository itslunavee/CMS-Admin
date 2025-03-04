<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['content'] )
  {
    // CHANGED TO GAMES TABLE.
    $query = 'INSERT INTO games (
        title,
        metascore,
        userscore,
        url
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['metascore'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['userscore'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Game has been added' );
    
  }
  
  header( 'Location: games.php' );
  die();
  
}

?>

<h2>Add Game</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="content">Metascore:</label>
  <input type="text" name="metascore" id="metascore">
      
  
  <br>
  
  <label for="url">Userscore:</label>
  <input type="text" name="userscore" id="userscore">
  
  <br>
  
  <label for="url">URL</label>
  <input type="text" name="url" id="url">
  
  
  <br>
  
  <input type="submit" value="Add Game">
  
</form>

<p><a href="games.php"><i class="fas fa-arrow-circle-left"></i> Return to Game List</a></p>


<?php

include( 'includes/footer.php' );

?>
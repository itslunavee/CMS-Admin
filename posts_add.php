<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['content'] )
  {
    
    $query = 'INSERT INTO projects (
        title,
        content,
        date,
        type
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'",
         "project"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Post has been submitted' );
    
  }
  
  header( 'Location: posts.php' );
  die();
  
}

?>

<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Website Admin</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet"/>
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>
<h2 class="project-title">Create Post</h2>
<main class="form-main">
<form method="post" class="post-container">
  
  <label for="title" class="form-label">Title:</label>
  <input type="text" name="title" id="title" class="form-input">
  
    
 
  
  <label for="content" class="content-label">Content:</label>
  <textarea type="text" name="content" id="content" rows="10"></textarea>
  
  <script>

  ClassicEditor
    .create( document.querySelector( '#content' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
 
  
  <label for="date" class="form-label">Date:</label>
  <input type="date" name="date" id="date">

  <br>

  <input type="submit" value="Submit Post">
  
</form>

<p><a href="posts.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>

</main>

<?php

include( 'includes/footer.php' );

?>
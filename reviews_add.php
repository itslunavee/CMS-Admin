<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();


if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['content'] )
  {
    
    $reviewSubmit = 'INSERT INTO reviews (title, content, rating, date, type) VALUES 
    (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['rating'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'",
         "review"
      )';

    mysqli_query( $connect, $reviewSubmit );
    
    set_message( 'Review has been submitted' );
    
  }
  
  header( 'Location: reviews.php' );
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
  <script src="https://kit.fontawesome.com/1f37d1bb22.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  
</head>
<body>
<h2 class="project-title">Create Review</h2>
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


  <input class="rating-input" type="hidden" name="rating" id="rating" value="setRating">
      <i class="fa fa-star fa-2x" data-index="0"></i>
      <i class="fa fa-star fa-2x" data-index="1"></i>
      <i class="fa fa-star fa-2x" data-index="2"></i>
      <i class="fa fa-star fa-2x" data-index="3"></i>
      <i class="fa fa-star fa-2x" data-index="4"></i>
  </input>

  <script>

    var ratingValue = -1;

     $(document).ready(function() {

         $('.fa-star').on('click', function () {
            ratingValue = parseInt($(this).data('index'));
            postRating();

         });

        $('.fa-star').mouseover(function () {
            var currentIndex = parseInt($(this).data('index'));
            

            for (var i=0; i <= currentIndex; i++)
                $('.fa-star:eq('+i+')').css('color', '#f2e053');
        });

        $('.fa-star').mouseleave(function () {
            $('.fa-star').css('color', 'whitesmoke');
            
            if (ratingValue != -1)
            for (var i=0; i <= ratingValue; i++)
                $('.fa-star:eq('+i+')').css('color', '#f2e053');
        });
     });

     function postRating() {
      document.getElementById("rating").value = ratingValue + 1;
     }

   </script>
  
  <label for="date" class="form-label">Date:</label>
  <input type="date" name="date" id="date">

  <br>

  <input type="submit" value="Submit Post">
  
</form>

<p><a href="reviews.php"><i class="fas fa-arrow-circle-left"></i> Return to Review List</a></p>

</main>

<?php

include( 'includes/footer.php' );

?>
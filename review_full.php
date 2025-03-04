<?php

include( 'admin/includes/database.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: review_feed.php' );
  die();
  
}

if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM reviews
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: review_feed.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include  'admin/includes/wideimage/WideImage.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyles.css">
    <script src="https://kit.fontawesome.com/1f37d1bb22.js" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <title><?php echo htmlentities( $record['title'] ); ?></title>
</head>

<body>

<nav>
<div class="nav-container">
    <a href="index.php" class="logo">Movie<span>.</span>Reviews</a>
    <div class="menu-icon">
        <i class="fas fa-bars"></i>
    </div>

<ul class="nav-ul">
    <li><a href="index.php">Home</a></li>
    <li><a href="review_feed.php">Reviews</a></li>
    <li><a href="#">Coming Up</a></li>
</ul>
</div>
</nav>

<main class="blog-main">
        <h2> <?php echo htmlentities( $record['title'] ); ?> </h2>
        <img src="admin/image.php?type=review&id=<?php echo $record['id']; ?>">
        <span class="rating"><?php echo htmlentities( $record['rating']); ?>/5</span>
        <p> <?php echo htmlentities( $record['content'] ); ?> </p>
</main>
</body>
</html>
<?php

include( 'admin/includes/database.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: index.php' );
  die();
  
}

if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM projects
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: index.php' );
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
        <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>">
        <p> <?php echo htmlentities( $record['content'] ); ?> </p>
</main>
</body>
</html>
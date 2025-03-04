<?php

include( 'admin/includes/database.php' );

$query = 'SELECT *
  FROM reviews
  ORDER BY id';
$result = mysqli_query( $connect, $query );

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
    <title>Movie Review Blog</title>
</head>
<body>

<!-- navigation elements -->
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

<main>

<h1> Reviews </h1>

<section class="post-feed">
<?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <div class="card">
    <img src="admin/image.php?type=review&id=<?php echo $record['id']; ?>">
    <div class="post-info">
    <span><?php echo htmlentities( $record['title'] ); ?>, </span>
    <span><?php echo htmlentities( $record['date'] ); ?></span>
    </div>
    <div class="post-content">
        <p><?php echo substr($record['content'], 0, 500); ?></p>
        <span> ...</span>
    </div>
    <a class="read-more" href="review_full.php?id=<?php echo $record['id']; ?>"> Read More </a>
    </div>
<?php endwhile ?>
</section>
    
</body>
</html>
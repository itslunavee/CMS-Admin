<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

$query = "SELECT * FROM visitor_logs";
if ($result = mysqli_query($connect,$query))
  {
  $rows = mysqli_num_rows($result);
  }

  $server_path = "/home1/ryanvonb";
  $remainder = floor(100 * disk_free_space($server_path) / disk_total_space($server_path));

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet"/>
  <title>Dashboard</title>
</head>
<body>
  <nav class="navbar">
    <ul class="navbar-nav">
      <li class="logo">
        <a href="#" class="nav-link">
          <span class="link-text logo-text">Welcome</span>
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="angle-double-right"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
            class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
        </a>
      </li>

      <li class="nav-item">
        <a href="users.php" class="nav-link">
          <svg> 
            <?php echo file_get_contents('icons/users.svg');?>
          </svg>
          <span class="link-text">Users</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="posts.php" class="nav-link">
        <svg>
        <?php echo file_get_contents('icons/posts.svg');?>
        </svg>
          <span class="link-text">Posts</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="reviews.php" class="nav-link">
          <svg>
          <?php echo file_get_contents('icons/reviews.svg');?>
          </svg>
          <span class="link-text">Reviews</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="games.php" class="nav-link">
          <svg>
          <?php echo file_get_contents('icons/calendar.svg');?>
          </svg>
          <span class="link-text">Games</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="logout.php" class="nav-link">
          <svg>
          <?php echo file_get_contents('icons/log-out.svg');?>
          </svg>
          <span class="link-text">Logout</span>
        </a>
      </li>
    </ul>
  </nav>
<main>
<div class="top">
<div class="count-container">
<span class="hits"> <?php echo "$rows"; ?> </span>
<br>
<p> Vistors to this site! <p>
</div>
</div>

<div class="bottom">
<section class="bottom-left">
<p>Disk Space Remaining</p>
<div class="bar-container">
<?php echo" <div class='bar-disk' style='width: $remainder%;'> $remainder% </div>"; ?>
</div>
</section>
<section class="bottom-right">
  <button class="visitor-log-link"> Visitor Data </button>
</section>
</div>

</main>
</body>

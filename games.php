<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  // CHANGES TO GAMES TABLE
  $query = 'DELETE FROM games 
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Game has been deleted' );
  
  header( 'Location: games.php' );
  die();
  
}

// CHANGES TO GAMES TABLE
$query = 'SELECT *
  FROM games 
  ORDER BY date DESC';
$result = mysqli_query( $connect, $query );

include 'includes/wideimage/WideImage.php';

?>

<h2>Manage Games</h2>

<table>
  <tr id="row-1">
    <th></th>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="center">Metascore</th>
    <th align="center">User Score</th>
    <th align="left">Link</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=project&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center">
        <?php echo htmlentities( $record['title'] ); ?>
        <small><?php echo $record['metascore']; ?></small>
      </td>
      <td align="center"><?php echo $record['userscore']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['link'] ); ?></td>
      <td align="center">
        <a href="games.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this game?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="games_add.php"><i class="fas fa-plus-square"></i>+ Add Game</a></p>
<p><a href="games_export.php">Export to API </a></p>


<?php

include( 'includes/footer.php' );

?>
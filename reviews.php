<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM reviews
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Review has been deleted' );
  
  header( 'Location: reviews.php' );
  die();
  
}

$query = 'SELECT *
  FROM reviews
  ORDER BY id';
$result = mysqli_query( $connect, $query );

include  'includes/wideimage/WideImage.php';

?>

<h2>Manage Reviews</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="center">Rating</th>
    <th align="center">Date</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center">
        <img src="image.php?type=review&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['title'] ); ?>
        <small><?php echo $record['content']; ?></small>
      </td>
      <td align="center"><?php echo $record['rating']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['date'] ); ?></td>
      <td align="center"><a href="reviews_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="reviews_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="reviews.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this review?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>


<p><a href="reviews_add.php"><i class="fas fa-plus-square"></i> New Review</a></p>

<?php

include( 'includes/footer.php' );

?>
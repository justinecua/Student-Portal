<?php
include ('../../connect/connect2db.php');

?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php
  $url_end_point = "https://ik.imagekit.io/mygh9x3hg/";

  $query = "SELECT * FROM cover_photos";
  $result = $connect2db->query($query);
  $CoverPhoto_Path = array();

  if ($result && $result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $CPhoto_Name = $row['CPhoto_Name'];
      $CustomDimensions = $CPhoto_Name . "/tr:w-450";

      echo '<div class="CPhotos_Preview"><img class="lazy" src="../../../../images/1495.gif" data-src="' . $CustomDimensions . '"></div>';

    }
  } else {
    echo '<div class="NoPhotos"><img src="path/to/placeholder-image.jpg" alt="No photos available"></div>';
  }

  ?>
</body>

</html>

<?php 
require_once('./v5/connect.php');

$sql = "SELECT * FROM `3000` WHERE status = 0 LIMIT 5";
$query = mysqli_query($conn, $sql);
$mean = array();

 while ($r= mysqli_fetch_assoc($query)) {
				$id[] = $r['id'];
                $words[] = $r['word'];
                $mean[strtolower($r['word'])]['word'] = $r['word'];
                $mean[strtolower($r['word'])]['sentence'] = $r['exmp'];
            }
			
			
			 $updateQuery = "UPDATE `3000` SET status = 1 where id in (" . implode(",", $id) . ")";
			 
			 
			 if (mysqli_query($conn, $updateQuery)) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . mysqli_error($conn);
   }
          

?>
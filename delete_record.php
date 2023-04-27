<?php
  $conn = mysqli_connect("localhost", "root", "", "st_hanahs_db");
  $id = $_POST["id"];
  $sql = "DELETE FROM student_records WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
    echo "success";
  } else {
    echo "error";
  }
  mysqli_close($conn);
?>

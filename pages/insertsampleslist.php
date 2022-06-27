<?php
//subject_number study_name visit_date visit_type visit_number next_visit missed_visit reason
$connect = mysqli_connect("localhost", "root", "", "freezers");
if(isset($_POST["subject_id"], $_POST["sample_label"], $_POST["freezer_number"], $_POST["boxid_storage"], $_POST["shelf"], $_POST["box_number"]
, $_POST["position"], $_POST["comment"]))
{$subject_id = mysqli_real_escape_string($connect, $_POST["subject_id"]);
    $sample_label = mysqli_real_escape_string($connect, $_POST["sample_label"]);
    $freezer_number = mysqli_real_escape_string($connect, $_POST["freezer_number"]);
    $boxid_storage = mysqli_real_escape_string($connect, $_POST["boxid_storage"]);
    $shelf = mysqli_real_escape_string($connect, $_POST["shelf"]);
    $box_number = mysqli_real_escape_string($connect, $_POST["box_number"]);
    $position = mysqli_real_escape_string($connect, $_POST["position"]);
    $comment = mysqli_real_escape_string($connect, $_POST["comment"]);
 
 $query = "INSERT INTO samples(subject_id, sample_label, freezer_number, boxid_storage, shelf, box_number, position, comment) 
 VALUES('$subject_id', '$sample_label' '$freezer_number','$boxid_storage', '$shelf' '$box_number','$position', '$comment')";
 
 if(mysqli_query($connect, $query))
 {
  echo 'Data Added Successfully';
 }
}
?>
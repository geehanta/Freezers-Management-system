
<?php
//insert.php  
$connect = mysqli_connect("localhost", "root", "", "freezers");
if(!empty($_POST))
{
 $output = '';
    $subject_id = mysqli_real_escape_string($connect, $_POST["subject_id"]);
    $sample_label = mysqli_real_escape_string($connect, $_POST["sample_label"]);
    $freezer_number = mysqli_real_escape_string($connect, $_POST["freezer_number"]);
    $boxid_storage = mysqli_real_escape_string($connect, $_POST["boxid_storage"]);
    $shelf = mysqli_real_escape_string($connect, $_POST["shelf"]);
    $box_number = mysqli_real_escape_string($connect, $_POST["box_number"]);
    $position = mysqli_real_escape_string($connect, $_POST["position"]);
    $comment = mysqli_real_escape_string($connect, $_POST["comment"]); 
    $query =  "INSERT INTO samples(subject_id, sample_label, freezer_number, boxid_storage, shelf, box_number, position, comment) 
    VALUES('$subject_id', '$sample_label', '$freezer_number','$boxid_storage', '$shelf', '$box_number','$position', '$comment')";
    
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success"> Sample Data Inserted Succesfully! </label>';
     $select_query = "SELECT * FROM samples ORDER BY id DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                <tr> 
                <th width="5%" style="background-color:grey; color:white;"> ID</th>
                        <th width="15%" style="background-color:grey; color:white;">Subject ID</th>
                        <th width="auto" style="background-color:grey; color:white;">Sample Label</th>  
                        <th width="auto" style="background-color:grey; color:white;">Freezer Number</th>
                        <th width="auto" style="background-color:grey; color:white;">Box ID Storage</th> 
                        <th width="auto" style="background-color:grey; color:white;">Shelf</th>
                        <th width="auto" style="background-color:grey; color:white;">Box Number</th>
                        <th width="auto" style="background-color:grey; color:white;">Position</th> 
                        <th width="auto" style="background-color:grey; color:white;">Comment</th>   
                        <th width="5%" style="background-color:grey; color:white;">Action</th>
                </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["id"] . '</td>
                         <td>' . $row["subject_id"] . '</td>  
                         <td>' . $row["sample_label"] . '</td>  
                         <td>' . $row["freezer_number"] . '</td> 
                         <td>' . $row["boxid_storage"] . '</td> 
                         <td>' . $row["shelf"] . '</td>  
                         <td>' . $row["box_number"] . '</td>  
                         <td>' . $row["position"] . '</td> 
                         <td>' . $row["comment"] . '</td>     
                         <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;
}
?>

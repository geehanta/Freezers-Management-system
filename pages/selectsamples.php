<?php  
//select.php  
if(isset($_POST["sample_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "freezers");
 $query = "SELECT * FROM samples WHERE id = '".$_POST["sample_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>Subject ID</label></td>  
            <td width="70%">'.$row["subject_id"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Sample Label</label></td>  
            <td width="70%">'.$row["sample_label"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Freezer Number</label></td>  
            <td width="70%">'.$row["freezer_number"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Box ID storage</label></td>  
            <td width="70%">'.$row["boxid_storage"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Shelf</label></td>  
            <td width="70%">'.$row["shelf"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Box</label></td>  
            <td width="70%">'.$row["box_number"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Position</label></td>  
            <td width="70%">'.$row["position"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Comment</label></td>  
            <td width="70%">'.$row["comment"].'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>


<?php
session_start();
?>

<?php  
$connect = mysqli_connect("localhost", "root", "", "freezers");
$query = "SELECT * FROM samples ORDER BY id DESC";
$result = mysqli_query($connect, $query);
 ?>
<!DOCTYPE Html>
<html>
    <head>
        <title>USAMRU-K</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="crudPageStyles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
            <style>
                .box
                {
                width:94%;
                margin:0 auto;
                }
                .active_tab1
                {
                background-color:#2f323a;;
                color:white;
                font-weight: 600;
                }
                .inactive_tab1
                {
                background-color: #f5f5f5;
                color: #333;
                cursor: not-allowed;
                }
                .has-error
                {
                border-color:#cc0000;
                background-color:#ffff99;
                }
             </style>
    </head>
<body>
     <main>
            <input type="checkbox" id="check" visibility="hidden">
            <header class="mainhead">
                <!-- header area start -->
                <label for="check">
                <i class="fa-solid fa-bars" id="sidebar_btn"></i>
                </label>
                <div class="left_area">
                <h2>FREEZER <span> MANAGEMENT</span>  </h2>
                </div>
                <div class="class">
                    <a href="logout.php" class="logout_btn">Logout</a>
                </div>   
            </header>
            <!-- header area end -->
            <!-- sidebar start -->
            <div class="sidebar">
                <center>
                    <img src="assets/kemri-logo.png" class="profile_image" alt="">
                        <h4>
                        <?php echo "Hello ". $_SESSION["USERNAME"];?>
                        </h4>
                    <br>
                </center>
                <a data-bs-toggle="tooltip" data-bs-placement="right"  
                title="Dashboard" href="frzrsdashboard.php"><i class="fa-solid fa-tachometer"></i></i> <span>Dashboard</span></a>
                <a data-bs-toggle="tooltip" data-bs-placement="right" class="current"
                title="Samples" href="#"><i class="fa-solid fa-flask" ></i> <span>Freezers</span></a>
                
            </div>
            <!-- sidebar end -->


        <article class="content">
            <br>
            <br>
            <br>
            <br>
            <div class="calendarContainer">
                <br/>
                <div class="container box">
                    <br />
                    <h3 align="center"><b> Samples Storage</b></h3>
                    <p align="center"> Strictly Authorized Access only</p>
                    <br />
                    <div align="right">
                    <a href="sampleslist.php" class="btn btn-info " tabindex="-1" role="button" aria-disabled="true"><i class="fa-solid fa-list"></i>   <strong>  All Samples </strong> </a>
                    </div>
                  <br /> 
                 <div class="container">  
                      
                        <div class="table-responsive">
                            <div align="left">
                                <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="fa-solid fa-plus"></i>  <strong>  Add  New Sample </strong> </button>
                            </div>
                            <br />
                            <div id="employee_table">
                                <table class="table table-bordered" >
                                <tr>
                                    <th width="5%" style="background-color:grey; color:white;"> ID</th>   
                                    <th width="15%" style="background-color:grey; color:white;">Subject ID</th>
                                    <th width="auto" style="background-color:grey; color:white;">Sample Number</th>  
                                    <th width="auto" style="background-color:grey; color:white;">Freezer Number</th>
                                    <th width="auto" style="background-color:grey; color:white;">Boxid Storage</th> 
                                    <th width="auto" style="background-color:grey; color:white;">Shelf</th>
                                    <th width="auto" style="background-color:grey; color:white;">Box</th>
                                    <th width="auto" style="background-color:grey; color:white;">Position</th> 
                                    <th width="auto" style="background-color:grey; color:white;">Comment</th>   
                                    <th width="5%" style="background-color:grey; color:white;">Action</th>
                                    </tr>
                                    <?php
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                    <tr>
                                    <td><?php echo $row["id"];?></td>   
                                    <td><?php echo $row["subject_id"];?></td>
                                    <td><?php echo $row["sample_label"]; ?></td>
                                    <td><?php echo $row["freezer_number"]; ?></td>
                                    <td><?php echo $row["boxid_storage"]; ?></td>
                                    <td><?php echo $row["shelf"]; ?></td>
                                    <td><?php echo $row["box_number"]; ?></td>
                                    <td><?php echo $row["position"]; ?></td>
                                    <td><?php echo $row["comment"]; ?></td>
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </table>
                                    </div>
                                </div>  
                </div>
              </div>      
                
            

        </article>
    </main>
</body>  
</html>
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header" style="background-color:grey; color:grey;">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title" style="color:white;"> Insert Samples Data</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter Subject ID</label>
     <input type="text" name="subject_id" id="subject_id" class="form-control" />
     <br />
     <label>Enter Sample Label</label>
     <input type="text" name="sample_label" id="sample_label" class="form-control" />
     <br />
     <label>Enter Freezer Number</label>
     <input type="text" name="freezer_number" id="freezer_number" class="form-control" />
     <br />
     <label>Box ID Storage</label>
     <select name="boxid_storage" id="boxid_storage" class="form-control">
      <option value="Immediate_testing">Immediate Testing</option>  
      <option value="Backup/Archive">Backup/ Archive</option>
     </select>
     <br /> 
     <label>Shelf</label>
     <input type="text" name="shelf" id="shelf" class="form-control" />
     <br /> 
     <label>Box</label>
     <input type="text" name="box_number" id="box_number" class="form-control" /> 
    <br />
    <label>Position</label>
     <input type="text" name="position" id="position" class="form-control" />
     <br />
     <label>Comment</label>
     <input type="text" name="comment" id="comment" class="form-control" />
     <br />  
     <br />
     <input type="submit" name="insert" id="insert" value="Add Sample" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Sample Details</h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#subject_id').val() == "")  
  {  
   alert("Subject ID is required");  
  }  
  else if($('#sample_label').val() == '')  
  {  
   alert("Sample label is required");  
  }  
  else if($('#freezer_number').val() == '')
  {  
   alert("Freezer Number is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"pages/insertsamples.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });

 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var sample_id = $(this).attr("id");
  $.ajax({
   url:"pages/selectsamples.php",
   method:"POST",
   data:{sample_id:sample_id},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>



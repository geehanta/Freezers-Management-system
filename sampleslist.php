<?php
session_start();
?>

<!DOCTYPE Html>
<html>
    <head>
        <title>USAMRU-K</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        
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
                <h2>FREEZER  <span> MANAGEMENT</span>  </h2>
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
                        <?php echo "Hi". $_SESSION["USERNAME"];?>
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
                <h3 align="center"><b> Samples Storage</b></h3>
                    <p align="center"> Strictly Authorized Access only</p>
                    <br />
                    <div align="right">
                    <button style="display:none;" type="button" name="add" id="add" class="btn btn-info disabled"><i class="fa-solid fa-plus"></i> Add Samples </button>
                    <a style="margin-left: 500px;" href="usamruksamples.php" class="btn btn-info " tabindex="-1" role="button" aria-disabled="true"><i class="fa-solid fa-plus"></i> <strong> Add new sample </strong></a>
                    </div>
                    <div class="table-responsive">
                        
                        <br>
                    
                        <div id="alert_message"></div>
                            <table id="user_data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>  
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
                                </thead>
                            </table>
                    </div>  
                    
                   
                </div>
            </div>

        </article>
    </main>
</body>  
</html>
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"pages/fetchsampleslist.php",
     type:"POST"
    },
    dom: 'lBfrtip',
   buttons: [
    'excel', 'csv',
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });

  }
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"pages/updatesampleslist.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="data5"></td>';
   html += '<td contenteditable id="data6"></td>';
   html += '<td contenteditable id="data7"></td>';
   html += '<td contenteditable id="data8"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var subject_id = $('#data1').text();
   var sample_label = $('#data2').text();
   var freezer_number = $('#data3').text();
   var boxid_storage = $('#data4').text();
   var shelf = $('#data5').text();
   var box_number = $('#data6').text();
   var position = $('#data7').text();
   var comment = $('#data8').text();

   if(subject_id != '' && sample_label != '' && freezer_number != '' && boxid_storage != '' && shelf != '' && box_number != '' && position != '' && comment != '' )
   {
    $.ajax({
     url:"pages/insertsampleslist.php",
     method:"POST",
     data:{subject_id:subject_id,sample_label:sample_label,freezer_number:freezer_number,boxid_storage:boxid_storage,shelf:shelf,box_number:box_number,position:position,comment:comment},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("All Fields are required");
   }
  });
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?"))
   {
    $.ajax({
     url:"pages/deletesampleslist.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>






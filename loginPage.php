
<!DOCTYPE Html>
<html>
    <head>
        <title>LOGIN</title>
        <meta charset="utf-8">
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <!--Bootstrap-->				
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" >
		<script src="assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="crudPageStyles.css"> 
          <link rel="stylesheet" href="usamrustylesheet.css">
    </head>
    <body>
        <main>
        <header class="mainhead">
                <!-- header area start -->
                <br>
                <div class="left_area">
                <h2 align="center"> USAMRU-K  KISUMU FREEZERS MANAGEMENT SYSTEM   </h2>
                
                </div>       
            </header>


            <article class="cardContainer">
            
                <div class="card1" id="card1shadow"> 
                
                <div class="form-container">
                    <form class="form-horizontal" method="post" action="#">
                            <h3 class="title"> Login</h3>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                <input class="form-control" type="text" name="name" id="name" autocomplete="off" placeholder=" Username" required>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control"  name="pwd" id="pwd" type="password" placeholder="Password" required>
                            </div>
                            <button class="btn signin" type="submit" id="buttonshadow">Login</button>
                            <span class="forgot-pass"><a href="indexusr.php">Forgot Username/Password?</a></span>
                            <br>
                            <center>
                            <?php
                                $host="localhost";
                                $user="root";
                                $password="";
                                $db="freezers";

                                session_start();

                                $data=mysqli_connect($host,$user,$password,$db);
                                if($data===false)
                                    {
                                        die ("Connection to  user database failed!");
                                    }

                                if($_SERVER["REQUEST_METHOD"]=="POST")
                                    {
                                        $username=$_POST["name"];
                                        $password=$_POST["pwd"];

                                        //To prevent sql injection
                                        $username=stripcslashes($username);
                                        $password=stripcslashes($password);
                                    


                                        $sql="select * from users where username='".$username."'AND password='".$password."'";

                                        $result=mysqli_query($data,$sql);
                                        $row=mysqli_fetch_array($result);

                                    if( $row["usertype"]=="admin")
                                            {  $_SESSION["USERNAME"]=$username;
                                                header("location:usamruksamples.php");
                                            }
                                        
                                
                                    else
                                        {    $_SESSION["USERNAME"]=$username;
                                    
                                        echo "Incorrect login Credentials!";
                                        }
                                    }

                            ?> </center>
                    </form>
                            
                </div>
                    <div class="box2"></div>
                    <div class="box3" class="clearfix">
                    
                        <div>
                            <br>
                            <img src="assets/usamru-logo.png" alt="usamru-k logo" align="top">
                            <br>
                            
                            
                        </div>
   

            
                    </div>
                        </div>
            </article>
            <footer class="main-footer">
    <small> <strong>Copyright &copy; 2022 <a href="https://www.spac3bar.com/">USAMRU-KENYA.</a></strong>
      All rights reserved. </small>
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
        </main>
    </body>
</html>
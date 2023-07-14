<?php require ('includes/header.php'); ?>
<?php include ('includes/session.php')  ?>
<?php 

    $query = "SELECT * FROM users WHERE id = '$_SESSION[id]' ";
    $show_account_query = mysqli_query($connection,$query);

    if (!$show_account_query) {
        die("Query Failed" . mysqli_error($connection) );
    }

    while ($row = mysqli_fetch_array($show_account_query) ) {
        $db_username = $row['username'];
        $db_password = $row['password']; 
        $db_email = $row['email'];
        $db_wallet_address = $row['btc_address'];
        $db_date = $row['date']; 
        $db_password = $row['password']; 

   




 ?>


<?php  //UPDATING ACCOUNT 

    if (isset($_POST['update'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $btc_address = $_POST['btc_address'];





        if (!empty($username) && !empty($email) && !empty($btc_address) ) {


            // $query = "SELECT randSalt FROM users";
            // $randsalt_query = mysqli_query($connection, $query);

            // $row = mysqli_num_rows($randsalt_query);
            // $salt = $row['randSalt'];
            // $hashed_password = crypt($password,$salt);

            $query = "UPDATE users SET ";
            $query .= "username = '$username', ";
            $query .= "email = '$email', ";
            $query .= "btc_address = '$btc_address' ";
            $query .= "WHERE id = '$_SESSION[id]' ";

            $update_query = mysqli_query($connection, $query);


            if(!$update_query) { //query validation
                die("Query Failed" . mysqli_error($connection) );
            }

            $message = "Account Updated<a href='account_overview.php' style='text-decoration:none;' class='cyan-text' > View Account</a>";




        }// nested if not empty ends

        else {//if empty
            $message = "<p class='red-text'> Fields Cannot Be Empty </p>";
        }

    } //main iffset ends


    else { //default
        $message = "";
    }
  




 ?>


<body>

    <header>

   

    <!-- overlay -->
    <div class="view" id="intro">
    <div class="container-fluid mask flex-center rgba-black-strong d-flex align-items-center justify-content-center"> </div>
    <?php include ('includes/user_navbar.php'); ?>
    <br><br> 
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            
    <p class="h6 white-text text-center ">Account Settings</p>
                            <p class="white-text text-center"> Note: For security purposes, You can only change <br> your password by contacting the support team <span class="font-italic">zmine@support</span> </p>

     <div class="row">
                    <div class="offset-md-4 col-md-4">

                        <form method="post" action="">
                           <p class="h4 text-center mb-4 white-text"></p>

                           <p class="white-text"> <?php echo $message; ?> </p>
                            <div class="md-form form-sm">
                                 <!-- <i class="fa fa-user prefix grey-text mr-3"></i> -->
                                <input type="text" class="form-control white-text" name="username" id="username" value="<?php echo $db_username; ?>"> 
                                <label for="username">
                                </label>
                            </div>

                            <div class="md-form form-sm">
                            <input type="text" class="form-control white-text" name="email" id="email" value="<?php echo $db_email; ?>">
                                <label for="email"></label>
                            </div>

                            <div class="md-form form-sm">
                            <input type="text" class="form-control white-text" name="btc_address" id="btc_address" value="<?php echo $db_wallet_address;?>">
                                <label for="btc_address"></label>
                            </div>



                           


                            <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-default mt-4" data-toggle="modal" data-target="#submitModal">
                        Login
                    </button>
 -->

    
                    <button type="submit" class="btn btn-default float-right" name="update">Update</button>
                 

                        </form>         

 <?php } ?>


                    </div>
                </div>
   

        </div>


    </div>
   
    
</div>


    </header>
  

    



    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>

<?php require ('includes/header.php'); ?>

<?php 

    if (isset($_POST['register'])) {

            $username = $_POST['username'];
            echo $password = $_POST['password'];
            $email = $_POST['email'];
            $alias = $_POST['alias'];
            

            if (!empty($username) && !empty($password) && !empty($email) && !empty($alias) ) { //if fields not are empty

            $username = mysqli_real_escape_string($connection,$username);
            $password = mysqli_real_escape_string($connection,$password);
            $email = mysqli_real_escape_string($connection,$email);
            $alias = mysqli_real_escape_string($connection,$alias);
            


            $query = "SELECT randSalt FROM admin   ";
            $select_randsalt = mysqli_query($connection,$query);

            if(!$select_randsalt) {//Query Validation
             die("Query Failed" . mysqli_error($connection) );
            }

            $row = mysqli_fetch_array($select_randsalt);
            $salt = $row['randSalt'];
            $password = crypt($password,$salt);

            $query = "INSERT INTO admin (admin_username,admin_password,admin_email,admin_alias) ";
            $query .= "VALUES ('$username','$password','$email','$alias') ";
            $register_query = mysqli_query($connection,$query);

            if(!$register_query) {//Query Validation
                die("Query Failed" . mysqli_error($connection) );
            }

            $message = "Account Created <a href='index.php' style='text-decoration:none;' class='cyan-text' >Login</a>";


            } //if fields are empty 

            else {
                $message = "<p class='red-text'> Fields Cannot Be Empty </p>";
            }


        }//Main isset ends

        //predefined var
        else { //message default
            $message = "";
        } //message default end

 ?>





<body>

    <header>

   

    <!-- overlay -->
    <div class="view" id="intro">
    <div class="container-fluid mask flex-center rgba-black-strong d-flex align-items-center justify-content-center"> </div>
    <?php include ('includes/navbar.php'); ?>
    


<br><br><br><br>
    <div class="container">

            <section id="login" class="text-center"> <!-- create -->
                

                <div class="row">
                    <div class="offset-md-4 col-md-4">

                        <form method="post" action="">
                           <p class="h4 text-center mb-4 white-text">Register</p>

                           <p class="white-text"> <?php echo $message; ?> </p>
                            <div class="md-form form-sm">
                                 <!-- <i class="fa fa-user prefix grey-text mr-3"></i> -->
                                <input type="text" class="form-control white-text" name="username" id="username">
                                <label for="username">Username</label>
                            </div>


                            <div class="md-form form-sm">
                                <input type="password" name="password" id="password" class="form-control">
                                <label for="password">Password</label>
                            </div>


                            <div class="md-form form-sm">
                            <input type="text" class="form-control white-text" name="email" id="email">
                                <label for="email">Email</label>
                            </div>

                            <div class="md-form form-sm">
                            <input type="text" class="form-control white-text" name="alias" id="btc_address">
                                <label for="btc_address">Alias</label>
                            </div>

                            
                           

                            <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-default mt-4" data-toggle="modal" data-target="#submitModal">
                        Login
                    </button>
 -->

    
                    <button type="submit" class="btn btn-default" name="register">Register</button>
                 

                        </form>         




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

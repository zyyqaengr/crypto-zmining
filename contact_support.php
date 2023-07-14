<?php require ('includes/header.php'); ?>
<?php include ('includes/session.php')  ?>


    <?php 

        if (isset($_POST['send'])) {
            
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $date = date('d-m-y');

            if (!empty($subject) && !empty($message) ) {

                
                $subject = mysqli_real_escape_string($connection,$subject);
                $message = mysqli_real_escape_string($connection,$message);


                 $query = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                 $show_user_query = mysqli_query($connection,$query);

        if (!$show_user_query) {//Query Validation
            die("Query Failed" . mysqli_error($connection) );
        }

        while ($row = mysqli_fetch_array($show_user_query) ) {
            $db_username = $row['username'];
            $db_email = $row['email'];
}

                $query = "INSERT INTO message (user_id,username,email,subject,message, date ) ";
                $query .= "VALUES ('$_SESSION[id]', '$db_username', '$db_email', '$subject', '$message', now() ) ";
                $send_query = mysqli_query($connection,$query);
                


                if (!$send_query) {//Query Validation
                    die("Query Failed" . mysqli_error($connection) );
                }
           
                else { //if sent
                $alert = "<p class='green-text'> Message Sent </p>";
                }
                
            }//if not empty  

              else { //if sent
                $alert = "<p class='red-text'> Fields cannot be empty! </p>";
            }


        }//isset ends

         
      else { //if sent
        $alert = "";
    }    


     ?>








<body>

    <header>

   

    <!-- overlay -->
    <div class="view" id="intro">
    <div class="container-fluid mask flex-center rgba-black-strong d-flex align-items-center justify-content-center"> </div>
    <?php include ('includes/user_navbar.php'); ?>
    



    <div class="container">

            <section id="login" class="text-center"> <!-- create -->
                

                <div class="row">
                    <div class="offset-md-3 col-md-6">

 <form class="p-5" action="" method="post">
    <p class="text-center mb-4 white-text">Tell us your concerns</p>
                        
                        <?php echo $alert ?>
                        
                        <div class="md-form form-sm">
                            <input type="text" name="subject" id="subject" class="form-control white-text" placeholder="Please Specify Your Subject">
                            <label for="subject">Subject</label>
                        </div>


                       <div class="md-form form-sm">
                            <input type="text" name="message" id="subject" class="form-control white-text">
                            <label for="subject">Message</label>
                        </div>

                            <div class="text-center">
                                <button class="btn btn-default mt-5" type="submit" name="send">Send</button>
                            </div>

                        </div>
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

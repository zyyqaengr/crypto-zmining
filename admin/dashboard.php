<?php require ('includes/header.php'); ?>
<?php include ('includes/session.php')  ?>



    <!-- overlay -->
    <div class="view" id="intro">
    <div class="container-fluid mask flex-center rgba-black-strong"> </div>
    <?php include ('includes/user_navbar.php'); ?>
    <br>
    <div class="row d-flex justify-content-center">
    <div class="col-md-10 text-center">
    <!-- overlay -->
    

    <?php //echo credentials

        $query = "SELECT * FROM admin WHERE admin_id = '$_SESSION[id]'";
        $show_user_query = mysqli_query($connection,$query);

        if (!$show_user_query) {//Query Validation
            die("Query Failed" . mysqli_error($connection) );
        }

        while ($row = mysqli_fetch_array($show_user_query) ) {
            $db_username = $row['admin_username'];
            $db_email = $row['admin_email'];
            $db_alias = $row['admin_alias'];
          
    

     ?>


<?php 

    $query = "SELECT satoshi FROM main_balance "; //RETRIEVING SYSTEM BALANCE
    $main_balance_query = mysqli_query($connection,$query);



    $row = mysqli_fetch_array($main_balance_query);
    $db_satoshi = $row['satoshi'];

    echo "<p class='h5 green-text'>System Balance: $db_satoshi Satoshi</p>";


     ?>
             


   <h4 class="white-text">Welcome <?php echo $db_username; ?> </h4>
   <p class="white-text">email: <?php echo $db_email; ?> </p>
   <p class="white-text">Alias: <?php echo $db_alias; ?> </p>

<?php } //end of while loop  ?>

  <?php  //count users

    $query = "SELECT * FROM users ";
    $select_users_query = mysqli_query($connection, $query);
    $count_users = mysqli_num_rows($select_users_query);

    echo "<p class='white-text font-italic'>$count_users Registered Users</p>";

?>


   
  







        </div>

    </div>
   
    
</div> <!-- End of Overlay -->


    </header>
  

    



    <!-- SCRIPTS -->
    <!-- JQuery -->
    
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>

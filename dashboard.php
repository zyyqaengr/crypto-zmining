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

        $query = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
        $show_user_query = mysqli_query($connection,$query);

        if (!$show_user_query) {//Query Validation
            die("Query Failed" . mysqli_error($connection) );
        }

        while ($row = mysqli_fetch_array($show_user_query) ) {
            $db_id = $row['id'];
            $db_username = $row['username'];
            $db_email = $row['email'];
            $db_btc_address = $row['btc_address'];
            $db_balance = $row['balance'];
            $db_date = $row['date'];

    

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
   <p class="white-text">Wallet Address: <?php echo $db_btc_address; ?> </p>
    <p class="white-text">Member Since: <?php echo $db_date; ?> </p>
    <p class="white-text">Your Balance: <?php echo $db_balance . " Satoshi" ; ?> </p>

<?php } //end of while loop  ?>


   
             
        <br><br>
            <marquee width="180" behavior="alternate" ><h2 class="white-text">ADS HERE</h2> </marquee>
            <!-- LOL HAHAHA -->
        <br><br>
     <!-- CLAIM FUNCTION -->
     <?php Claim() ?>
    <!-- CLAIM FUNCTION -->
     <form method="post" action="">
         <button id="click" type="submit" name="claim" class="btn btn-default" >Claim</button>
     </form>


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

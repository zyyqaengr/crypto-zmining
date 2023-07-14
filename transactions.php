<?php require ('includes/header.php'); ?>
<?php include ('includes/session.php')  ?>




<body>

    <header>

   

    <!-- overlay -->
    <div class="view" id="intro">
    <div class="container-fluid mask flex-center rgba-black-strong d-flex align-items-center justify-content-center"> </div>
    <?php include ('includes/user_navbar.php'); ?>
    <br><br> 
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            
    
    <table class="table table-hover mt-4 table-bordered white-text text-center">
                            
                            <thead>
                                <tr>
                                    <th>Last Claimed</th>
                                </tr>
                            </thead>

<?php 

    $query = "SELECT last_claim FROM users WHERE id = '$_SESSION[id]' ";
    $last_claim_query = mysqli_query($connection,$query);

    if (!$last_claim_query) {
        die("Query Failed" . mysqli_error($connection) );
    }

    while ($row = mysqli_fetch_array($last_claim_query) ) {
        $db_last_claim = $row['last_claim'];
        
   

 ?>


                            <tbody>
                                <tr>
                                    <td> <?php echo $db_last_claim; ?> </td>
                                </tr>
                                 


                                 

                            </tbody>




                        </table>
                        



<?php } ?>

   

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

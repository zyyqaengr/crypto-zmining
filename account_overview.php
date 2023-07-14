<?php require ('includes/header.php'); ?>
<?php include ('includes/session.php')  ?>


<?php //show user info

    $query = "SELECT * FROM users ";
    $show_user = mysqli_query($connection,$query);

    $row = mysqli_fetch_array($show_user);
    $db_user_balance = $row['balance'];
    $db_user_address = $row['btc_address'];

    
    $query = "SELECT * FROM main_balance ";
    $sys_bal = mysqli_query($connection,$query);

    $row = mysqli_fetch_array($sys_bal);
    $db_sys_bal = $row['satoshi'];
    

    

    


 ?>


 <?php 


   if (isset($_POST['withdraw'])) {

        if ($db_user_balance >= 100) {

                $query = "UPDATE users SET balance = balance - '$db_user_balance' WHERE id = '$_SESSION[id]' ";
                $withdraw_query = mysqli_query($connection,$query);


                if (!$withdraw_query) {
                    die("Query Failed" . mysqli_error($connection) );
                }

                $sys_query = "UPDATE main_balance SET satoshi = satoshi - '$db_user_balance' ";
                $system_update = mysqli_query($connection,$sys_query);

                if (!$system_update) {
                    die("Query Failed" . mysqli_error($connection) );
                }
        } //if

        else {
            header('Location: account_overview.php');
        }



   }//main isset


  ?>




<!-- WITHDRAW BUTTON -->
<form action="" method="post">
<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="submitModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submitModalLabel">Withdraw</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-bold">Please make sure information is correct</p>
                <p> System Balance: <?php echo $db_sys_bal ?> </p>
                            
                        <p> Your Balance: <?php echo $db_user_balance ?> </p>

                                <br>
                                 <p> Wallet Address: <?php echo $db_user_address ?> </p>

                           <!--  CONFIRM PASSWORD FEATURE
                            <div class="md-form form-sm">
                                <input type="password" name="password" id="password" class="form-control">
                            </div> -->
            </div>
            <div class="modal-footer" id="withdraw">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-default" name="withdraw">Withdraw</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- WITHDRAW BUTTON -->


<body>

    <header>

   

    <!-- overlay -->
    <div class="view" id="intro">
    <div class="container-fluid mask flex-center rgba-black-strong d-flex align-items-center justify-content-center"> </div>
    <?php include ('includes/user_navbar.php'); ?>
    <br><br> 
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            
    
    <table class="table table-bordered mt-4 table-striped white-text">
                            
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Wallet Address</th>
                                    <th>Date Registered</th>
                                    <th>Balance</th>
                                    <th>Withdraw</th>
                                    
                                </tr>
                            </thead>

<?php 

    $query = "SELECT * FROM users WHERE id = '$_SESSION[id]' ";
    $show_account_query = mysqli_query($connection,$query);

    if (!$show_account_query) {
        die("Query Failed" . mysqli_error($connection) );
    }

    while ($row = mysqli_fetch_array($show_account_query) ) {
        $db_username = $row['username'];
        $db_email = $row['email'];
        $db_wallet_address = $row['btc_address'];
        $db_balance = $row['balance'];
        $db_date = $row['date']; 
   




 ?>


                            <tbody>
                                <tr>
                                    <td> <?php echo $db_username; ?> </td>
                                    <td> <?php echo $db_email; ?> </td>
                                    <td> <?php echo $db_wallet_address ?> </td>
                                    <!-- <td> <button class="btn btn-primary" data-toggle="modal" data-target="#updateModal">Update</button></td>
                                    <td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button></td> -->
                                    <td> <?php echo $db_date; ?> </td>
                                    <td> <?php echo "<p id='table'>" . $db_balance . " Satoshi </p>" ;?> </td>
                                    
                                    <td> <?php echo "
    <button type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#submitModal'>Withdraw</button>";?> </td>
                                </tr>
                                    

<script>
    
    $("#withdraw").click(function(){

        $("#table").load(" #table");

    });





</script>

                                 

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

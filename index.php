<?php require ('includes/header.php'); ?>




<body>

    <header>

   

    <!-- overlay -->
    <div class="view" id="intro">
    <div class="container-fluid mask flex-center rgba-black-strong d-flex align-items-center justify-content-center"> </div>
    <?php include ('includes/navbar.php'); ?>
    <br><br> <br><br><br>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 text-center">
            
 <h5 class="display-4 white-text mb-2">Z Mining</h5>

    <hr class="hr-light">

    <h4 class="white-text my-2 font-italic">Where You Can Get Satoshi For Free With 24/7 Support</h4>

    <?php  //count users

    $query = "SELECT * FROM users ";
    $select_users_query = mysqli_query($connection, $query);
    $count_users = mysqli_num_rows($select_users_query);

    echo "<p class='white-text font-italic'>$count_users Registered Users</p>";


     ?>

     <br><br>
    




    <br>
    <a href="register.php" class="btn btn-default">JOIN</a>


        </div>


    </div>
   
    
</div>


    </header>
  
    
</body>

</html>

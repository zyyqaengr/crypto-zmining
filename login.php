<?php require ('includes/header.php'); ?>
<?php session_start(); ?>

<body>

    <header>

   

    <!-- overlay -->
    <div class="view" id="intro">
    <div class="container-fluid mask flex-center rgba-black-strong d-flex align-items-center justify-content-center"> </div>
    <?php include ('includes/navbar.php'); ?>
    <!-- overlay -->
    

<br><br><br><br>
    <div class="container">

            <section id="login" class="text-center"> <!-- create -->
                

                <div class="row">
                    <div class="offset-md-4 col-md-4 ">

                        
                        <form method="post" action="process_login.php">
                           <p class="h4 text-center mb-4 white-text">Login</p>
                            <div class="md-form form-sm">
                                 <!-- <i class="fa fa-user prefix grey-text mr-3"></i> -->
                                <input type="text" class="form-control white-text" name="username" id="username">
                                <label for="username">Username</label>
                            </div>

                            
                            <div class="md-form form-sm">
                                <input type="password" name="password" id="password" class="form-control">
                                <label for="password">Password</label>
                            </div>


                            
                            <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-default mt-4" data-toggle="modal" data-target="#submitModal">
                        Login
                    </button>
 -->

    <button type="submit" class="btn btn-default mt-4" name="login" >
                        Login
                    </button>

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

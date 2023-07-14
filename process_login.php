<?php include "includes/connect.php"; ?>
<?php session_start(); ?>

<?php 

    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty($username && !empty($password)) ) { //if fields are not empty

            $username = mysqli_real_escape_string($connection,$username);
            $password = mysqli_real_escape_string($connection,$password);


            $query = "SELECT * FROM users WHERE username = '$username' ";
            $user_query = mysqli_query($connection,$query);

            if (!$user_query) { //query validation
                die("Query Failed" . mysqli_error($connection) );
            } 

            while ($row = mysqli_fetch_array($user_query) ) { //pulling data from DB
                $db_id = $row['id'];
                $db_username = $row['username'];
                $db_password = $row['password'];
              


            } //end pulling data from DB


            $password = crypt($password, $db_password); //password hash returning

            if ($username !== $db_username && $password !==  $db_password) { //if credentials aren't valid back to index
                header("Location: login.php");

            } 

            else if ($username == $db_username && $password !==  $db_password) { //if user is correct but password is wrong
                    header("Location: login.php");
            }

             else if ($username !== $db_username && $password ==  $db_password) { //if password is correct but username is wrong
                    header("Location: login.php");
            }

            else if ($username == $db_username && $password ==  $db_password) { //if credentials are valid set a session

                $_SESSION['id'] = $db_id; 
                header("Location: dashboard.php");
            } else { //if not
                header("login.php"); //go back to index
            }


        }//if validation ends

         else {//if fields are empty
            header("Location: login.php");
        }


    } //main isset



 ?>
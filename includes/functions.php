<?php 

	function Claim () {

		global $connection;
		if (isset($_POST['claim'])) { //claiming


        $query = "SELECT * FROM users WHERE id = '$_SESSION[id]' "; //pulling user balance from db
        $user_query_balance = mysqli_query($connection,$query);
        
        $row = mysqli_fetch_array($user_query_balance);
        $db_user = $row['id'];
        $db_user_query_balance = $row['balance'];
        $db_last_claim = date("d-m-y");


        $query = "SELECT satoshi FROM main_balance "; //pulling system balance from db
        $main_balance_query = mysqli_query($connection,$query);
        $row = mysqli_fetch_array($main_balance_query);
        $db_main_balance_query = $row['satoshi'];



        $query = "UPDATE users SET balance = $db_user_query_balance + 20 WHERE id = '$_SESSION[id]' "; //updating user balance in db
        $claim_query = mysqli_query($connection,$query);

        $last_claim = "UPDATE users SET last_claim = now() WHERE id = '$_SESSION[id]' ";
        $last_claim_query = mysqli_query($connection,$last_claim);

         $query_main_balance = "UPDATE main_balance SET satoshi = $db_main_balance_query - 20 "; //updating system balance in db
        $claim_query_from_main = mysqli_query($connection,$query_main_balance);



         echo "<p class='yellow-text'>New Balance: $db_user_query_balance Satoshi</p>";
    }
} //function end


   

 ?>
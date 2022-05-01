<?php 

  
  // Add more security features to this script
  // It has maximum execution time of 30 seconds
  
  // Written by: Emmanuel Scandling
  // Last Updated: March 20, 2020.
  
  
  if(isset($_POST["amount"]) && !empty($_POST["operator"]) && !empty($_POST["user_number"]) && !empty($_POST["orderId"])){
	  
	  $amount = $_POST["amount"];
	       if ($amount && strlen($amount = trim($amount)) >0) {
		       $amount = stripslashes($amount);
	    }
		
	  $operator = $_POST["operator"];
	       if ($operator && strlen($operator = trim($operator)) >0) {
		       $operator = stripslashes($operator);
	     }
		 
	  $user_number = $_POST["user_number"];
	       if ($user_number && strlen($user_number = trim($user_number)) >0) {
		       $user_number = stripslashes($user_number);
	     }

		 $orderID = $_POST["orderId"];
	       if ($orderID && strlen($orderID = trim($orderID)) >0) {
		       $orderID = stripslashes($orderID);
	     }
	   
	    if($operator == "MTN"){
		   
		   $operator = "mtn";
		   $option = "rmtm";

	   }
	   else if($operator == "AirtelTigo"){
		   
		   $operator = "airtel";
		   $option = "ratm";
		     
	   } 
	   else{
		   echo" Please select your operator network "; // do your error checkings here
		   die("");  // do your error chechings here
	   }
	    // generate randon number plus current userID
	   
               $url = "https://client.teamcyst.com/api_call.php";


$additional_headers = array(
   "Content-Type: application/json"
);

$data = array(
  "price"=> $amount,       // Total amount being paid ( $amount )
  "network"=> $operator,      // Sender network type ( $operator)
  "recipient_number"=> "0547293451",    // MTN number to receive all transaction 
  "sender"=> $user_number,     // Sender Number ( $user_number )
  "option"=> $option,      // set if amount is being sent from mtn or airteltigo ( $option )
  "apikey"=> "7782996370e7c3a783d0cffa52ea35b47b9d465b443f9fe7c885cd798206b44c",  // Insert your API key from your mazzzuma dashboard
  "orderID"=> $orderID     // order Id of the transaction. We will use it to confirm the transaction if its pending or successful ($orderID)
  );
$data = json_encode($data);

$ch = curl_init($url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // $data is the request payload in JSON format                                                                 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers); 

$server_output = curl_exec ($ch);

  // Send the orderID and the user details to the admin email and your email as a notification of a new subscriber
  // also send the same details to the database
  // Use the oderId to find out if the order is pending or successful at the mazzuma dashboard
  // or use this link " https://client.teamcyst.com/checktransaction.php?orderID=<orderID> " , with the orderID parameter set to the orderID. 
  // and confirm the user manually to avoid intruders gaining free subscription 

   header("location: https://client.teamcyst.com/checktransaction.php?orderID=".$orderID.""); // direct the user to his or her dashboard

  } else {
	  echo" Transaction failed "; // do your error checkings here
		   die("");  // do your error checkings here
  }
?>

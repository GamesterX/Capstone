<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <title>Geodud</title>
</head>
<body>
  <div class="container" >
    <h2 id="text-center"> Location: </h2>
  </div>
  <form action="" method="post">
    <input type='text' name='address'/>
    <input type='submit' value='submit' />
</form>
  <input type = "button" onclick = "location.href='localCins.php'" value = "cinima" />
  <?php 
  $address = $_POST['address'];
function geocode($address){
  
    $address = urlencode($address);
      
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBWrn0_cBtbWJ35omI8UcYPD5cj7QfQyiQ";
  
    $resp_json = file_get_contents($url);
      

    $resp = json_decode($resp_json, true);
  
    if($resp['status']=='OK'){
  
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
          
        if($lati && $longi && $formatted_address){
          
            $data_arr = array();            
              
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
              
            return $data_arr;
              
        }else{
            return false;
        }
          
    }
  
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}
?>

<?php
if($_POST){
  

    $data_arr = geocode($_POST['address']);
  

    if($data_arr){
          
        $lati = $data_arr[0];
        $long = $data_arr[1];
    $geo =   $lati . ";". $long;           
    
   }else{
        echo "No map found.";   }

}
require_once('dbConnect.php');
            
$conn = db_connect();
 

 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 
 

 
 $sql = "INSERT INTO geocode (geocode, address)";
 $sql .= " VALUES   ( ";  
 $sql .= "'" . $geo . "','". $formatted_address."'); "; 

 $result1 = mysqli_query($conn,$sql);



     mysqli_free_result($result1,$result3);
 


 db_close($conn);  

 $conn = db_connect();
 

 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 $sql3 = "SELECT geocode FROM geocode ORDER BY id DESC LIMIT 1";
 
 
$result3 = mysqli_query($conn,$sql3);
$contact = mysqli_fetch_array($result3);

$api = 'cinemasNearby/?n=5';

$api_endpoint = 'https://api-gate2.movieglu.com/';
$username = 'ROWA_5'; // Example: $username = 'ABCD';
$api_key = 'n6moBcaOD279KBDn7en2PsTWCPjNJBh5IrqonzUh';  //Example: $api_key = 'AbCdEFG7CuTTc6KX76mI5aAoGtqbrGW2ga6B4jRg';
$basic_authorization = '		Basic Uk9XQV81X1hYOnZFbkFjTGtJcHB3cA=='; // Example: $basic_authorization = 'Basic UHSYGF4xNTpNOHdJQllxckYyN3y=';
$territory = 'XX'; // Territory chosen as part of your evaluation key request  (Options: UK, FR, ES, DE, US, CA, IE, IN)
$api_version = 'v200'; // API Version for evaluation - check documentation for later versions
$device_datetime = (new DateTime())->format('Y-m-d H:i:s'); // Current device date/time 
$geolocation = '-22.0;14.0'; 


$ch = curl_init();

// Assign cURL Settings
curl_setopt($ch, CURLOPT_URL, $api_endpoint . $api);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Authorization: ' . $basic_authorization, 
  'client: ' . $username,
  'x-api-key: ' . $api_key,  
  'territory: ' . $territory,
  'api-version: ' .$api_version,
  'device-datetime: ' . $device_datetime,
  'geolocation: ' .$geolocation 
 ]
);


$ret = curl_exec($ch);


$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

$body = substr($ret, $header_size);

curl_close($ch);


$response = json_decode($body, true);
for($i = 0;$i<3; $i++){

$cinema_name[$i] =  $response['cinemas'][$i]['cinema_name'];
$address[$i] =  $response['cinemas'][$i]['address'];
$city[$i] =  $response['cinemas'][$i]['city'];
$cinema_id[$i] = $response['cinemas'][$i]['cinema_id'];
$fullAddress[$i] = $address[$i] . ", " . $city[$i];
}

$conn = db_connect();
 

 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }




$x = 0;
  if($http_code == 200){
      echo "<ol>";
while($x < $i){
      echo "<li>" . $cinema_id[$x] . ": ". $cinema_name[$x] . ", ". $address[$x] .", " . $city[$x] . "</li>";
      
      $sql3 = "INSERT INTO LocalCins (cin_id, name, address) value ('".$cinema_id[$x]. "', '".$cinema_name[$x]."', '".$fullAddress[$x]. "')";
      
      $result3 = mysqli_query($conn,$sql3);
      mysqli_free_result($result3);
    $x++;
    }
    mysqli_close($conn);
    echo"</ol>";
  }elseif($http_code == 204){
      echo 'No results for request';
      echo "<pre>" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "</pre>";
  }else{
    echo "fail";
      exit();
  }?>

?>


</body>

</html>

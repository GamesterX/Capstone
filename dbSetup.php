<!DOCTYPE html>
<!-- file: dbeSetup
 by: Ray Jaconski
date: 7/12/21
class: INTRO TO WEB DEVELOPMENT - 1
 purpose: <Description of the Class -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ray Jaconski Lab7</title>
	<link title="style" href="style/tableTop.css" rel="stylesheet" type="text/css">
  
</head>
<body>
    <?php
           $geo = $_POST['geometro'];
           require_once('dbConnect.php');
            
           $conn = db_connect();
            
            // Step #1.2: Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            
            // Step #2: Query Database
            
            $sql = "INSERT INTO geocode (geocode)";
            $sql .= " VALUES   ( ";  
            $sql .= "'" . $geo . "'); "; 
           
            $result1 = mysqli_query($conn,$sql);
   
         
            $sql3 = "SELECT * FROM geocode
            ORDER BY geocode.geocode ASC";
            
            
            $result3 = mysqli_query($conn,$sql3);
            // Step #3: Use results   
            ?>
            <table>
                <tr class = "t1">
                    <th class = "t2">
                            geocode
                    </th>
                    
                
                          
                        
                </tr>
                
                
                <?php
               
                   while( $contact = mysqli_fetch_array($result3)){
                   $geocode = $contact['geocode'];
                   
                    echo "<tr><td>". $geocode . "</td></tr>";
                }?>
            </table>
               <?php // Step #4: Free result set
                mysqli_free_result($result1,$result3);
            

            // Step #5: Close connection
            db_close($conn);    
    ?>
</body>
</html>
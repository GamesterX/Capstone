<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <?php
    $x = $_POST['movies'];
    require_once('dbConnect.php');
            
    $conn = db_connect();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM MovieDB
    WHERE title= '$x'";
  

     $result = mysqli_query($conn,$sql);
     $contact = mysqli_fetch_array($result);
     $title = $contact[0];
     $release = $contact[1];
     $length = $contact[2];
     $id = $contact[3];
     $pop = $contact[4];
     mysqli_free_result($result);
db_close($conn);
    echo '
<h1><a href="file:///C:\Programs\Home.html"><strong>Home</strong></a></h1>
<h1> '. $title . ' </h1>
<p>Release Date: '.$release.'</p>
<p>Length: '. $length .'</p>
<p>Popularity: '. $pop .'</p>
<p>Synopsis:</p>
<p>TMDB ID:<a href="http://www.themoviedb.org/movie/'.$id.'-the-movie-3">'.$id.'</a></p>
<p>IMDB ID:<a href="http://www.imdb.com/title/tt13544716/">tt13544716 </a></p>';
?>
<ul>
<li><a href="file:///C:\Users\Sam\Documents\GitHub\Capstone\Dune.html">Dune</a></li>
<li><a href="file:///C:\Users\Sam\Documents\GitHub\Capstone\Clifford.html">Clifford the Big Red Dog</a></li>
<li><a href="file:///C:\Users\Sam\Documents\GitHub\Capstone\venom.html">Venom: Let There Be Carnage</a></li>
<li><a href="file:///C:\Users\Sam\Documents\GitHub\Capstone\Eternals.html">Eternals</a></li>
<li><a href="file:///C:\Users\Sam\Documents\GitHub\Capstone\Spencer.html">Spencer</a></li>
<li><a href="file:///C:\Users\Sam\Documents\GitHub\Capstone\Soho.html">Last Night in Soho</a></li>
<li><a href="file:///C:\Users\Sam\Documents\GitHub\Capstone\MyHero.html">My Hero Academia: World Heroes Mission</a></li>
</ul>;
</body>
</html>
<?php
$servername = "sql2.njit.edu";
$username = "gg297";
$password = "IKgzb60IH";

try {
    $conn = new PDO("mysql:host=$servername;dbname=gg297", $username, $password);
    // set the PDO error mode to exception
    echo "Connected successfully"; 
    echo "<br>";
      $stmt = $conn->prepare("SELECT id,email, fname, lname, phone, birthday, gender           ,password FROM accounts ORDER BY id LIMIT 0,5"); 
    $stmt->execute();
    $results = $stmt->fetchAll();
    foreach($results as $a)
   {
   echo "<br>";
   print_r($a);
   echo "<br>";
   }
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    echo"<br>";
    echo"<br>";
    if(count($results) > 0)
{
	echo "<table
border=\"1\"><tr><th>ID</th><th>Email</th><th>FName</th><th>Lname</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";
foreach ($results as $row) 
{
echo"<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["phone"]."</td><td>".$row["birthday"]."</td><td>".$row["gender"]."</td><td>".$row["password"]."</td></tr>";
}
}
else
{
echo "No results";
}

?>
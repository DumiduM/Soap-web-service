<!DOCTYPE html>
<html>
<head>
	<title>New movie Releases</title>
</head>
<body style="background: url('https://wallpapers.walldevil.com/wallpapers/w02/preview/604156-iron-man-silhouettes-superheroes-the-avengers-movie-white-background.jpg'); background-repeat: no-repeat; background-size: 100%;">
<form action=""  method="GET">
<select class="form-control" id="movietype" name="movie" >
                                  <option value="Thriller">Thriller</option>
                                  <option value="Action">Action</option>
                                  <option value="Drama">Drama</option>
                                  <option value="Sci-fi">Sci-fi</option>
                                  <option value="Documantary">Documantary</option>
</select>


<!-- <script>
	function run(){
		var e = document.getElementById("movietype");
		var movietype = e.options[e.selectedIndex].text;
		// alert(strUser);	
	}
</script>
 -->

<input type="submit" name="submit" value="submit">
</form>
</body>
</html>

<?php
require_once "nusoap.php";
$type="";
if(isset($_GET['submit'])){
	// echo "string";
	$type=$_GET["movie"];
	// echo "$type";

}

$client = new nusoap_client("http://172.16.16.70/webServiceSOAP/productlist.php?wsdl", true);

// $client = new nusoap_client("products.wsdl", true);

$error = $client->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

$result = $client->call("getProd", array("category" => "$type"));

if($result!= ""){
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
        echo "<h2>New Releases</h2><pre>";
        echo "<h4>$type</h4><pre>";
        echo $result;
        echo "</pre>";
    }
}
}
else{

}

// $result2 = array(
//             "Spider-man", //http://t1.gstatic.com/images?q=tbn:ANd9GcQkBgGCS74dHRSe3i0fkEsdaC1jJPU4px6Pyv9-TOipm13gOprI
//             "Bat-man", //http://t1.gstatic.com/images?q=tbn:ANd9GcQSGF8_VbDqKF0B_4IQ0NF87VMDSy7_MPKryawR-qLnSIPQwo5z
//             "Tomb-rider"); //http://t1.gstatic.com/images?q=tbn:ANd9GcQGBx-FI1Xp1Xk9raKVhCrW2pj-vBUpbjfY5liEfDmU2DzKV-Uf
//         echo $result2[0];

// echo "<h2>Request</h2>";
// echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
// echo "<h2>Response</h2>";
// echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";

?>


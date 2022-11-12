<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas</title>
</head>
<body>
<!-- Token clientify: d0b93d57f44241ba962888a24334ee41a0ac9d5b / id: 81241-->
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.clientify.net/v1/contacts/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token d0b93d57f44241ba962888a24334ee41a0ac9d5b'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$arre = json_decode($response, true);

for ($i=0; $i < count($arre["results"]); $i++) { 
    echo($arre["results"][$i]["first_name"]);
    echo("<a href='cliente.php?id=".$arre["results"][$i]["id"]."'><button>".$arre["results"][$i]["id"]."</button></a>");
    echo("<br>");
}

?>

</body>
</html>
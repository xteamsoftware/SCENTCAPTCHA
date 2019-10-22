
<?php

// we connect to server
$conn = mysqli_connect('', '', '');
if (!$conn ) 
{
    die('ERROR:Could not connect: ' . mysqli_error($conn));
}


if( !isset($_GET['id'] ) )
{
	die('ERROR:id not found');
}


//prelevo il giocatore
$userID 		= $_GET['id'];


//-----------------------------------------------
// CONTROLLO SE GIA' PRESENTE ID
//-----------------------------------------------
// Query to select an int column
$query = "SELECT * FROM SCENTUser WHERE userID=".$userID ;


//visualizzo
$result = mysqli_query($conn, $query);

//prelevo la row
$row = mysqli_fetch_assoc($result);

//prelevo i dati
$monsters		=	$row['monsters'];	


//scrivo
print(trim($monsters));

// Free the resources associated with the result set
// This is done automatically at the end of the script
mysqli_free_result($result );


mysqli_close($conn);

//-----------------------------------------------
?>





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
$newMonsters 		= $_GET['monsters'];


//-----------------------------------------------
// CONTROLLO SE GIA' PRESENTE ID
//-----------------------------------------------
// Query to select an int column
$query = "SELECT * FROM tabSCENTUser WHERE userID=".$userID ;

//visualizzo
$result = mysqli_query($conn, $query);

//esiste una email
if ( mysqli_num_rows($result) == 0  )
{
	die('ERROR:users not exist');
}

//prelevo la row
$row = mysqli_fetch_assoc($result);


//prelevo l'id
$id			=	$row['id'];
$monsters 		=	$row['monsters'];

//divido le 2 stringhe
$dato_old = explode(";", $monsters );
$dato_new = explode(";", $newMonsters );

//setto il valore
$valore = "";

//cerco il massimo
$number =  count($dato_old);
if ( count( $dato_new ) > count($dato_old) )
	$number =  count($dato_new );

//print( $number ."<br>" );

//eseguo il controllo
for ( $t = 0; $t < $number; $t++ )
{
	//controllo se ci sono tutti e 2
	if (( count($dato_new) > $t ) && ( count($dato_old) > $t ))
	{

		//verifico il valore
		if ( intval( $dato_new[ $t ] ) > intval( $dato_old[ $t ] ) )
			$valore = $valore.intval($dato_new[ $t ]).";";
		else
			$valore = $valore.intval($dato_old[ $t ]).";";
	}
	else if ( ( count($dato_new) > $t ) )
	{
		$valore = $valore.intval($dato_new[ $t ]).";";
	}
	else if	( ( count($dato_old) > $t ) )
	{
		$valore = $valore.intval($dato_old[ $t ]).";";
	}
	else
	{
		$valore = $valore."0;";
	}

}

//elimino l'ultima ,
$valore = substr($valore, 0, -1);

//stampo
//echo $valore;

//eseguo l'update

$sql 	= 	"UPDATE tabSCENTUser SET"; 
$sql	=	$sql." monsters='".$valore."' ";

$sql	=	$sql." WHERE id=".$id;


//aggiorno
if (!mysqli_query($conn, $sql)) 
{
    die("error: " . mysqli_error($conn));
}



// Free the resources associated with the result set
// This is done automatically at the end of the script
mysqli_free_result($result );


//chiudo la connessione
mysqli_close($conn);

//-----------------------------------------------
//-----------------------------------------------
?>
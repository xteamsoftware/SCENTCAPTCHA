
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
$userNickname 		= $_GET['nickname'];


//-----------------------------------------------
// CONTROLLO SE GIA' PRESENTE ID
//-----------------------------------------------
// Query to select an int column
$query = "SELECT * FROM SCENTUser WHERE userID=".$userID ;


//visualizzo
$result = mysqli_query($conn, $query);

//esiste non esiste ID lo creo
if ( mysqli_num_rows($result) == 0  )
{
	//-----------------------------------------
	//creo il campo
	//-----------------------------------------------

	$sql = "INSERT INTO SCENTUser (userID, nickname, picturesUploaded, picturesTagged, tags, validations, score, level, pois, campaigns, 		m_picturesUploaded, m_picturesTagged, m_tags, m_validations, m_score, m_level, m_pois, m_campaigns,
		w_picturesUploaded, w_picturesTagged, w_tags, w_validations, w_score, w_level, w_pois, w_campaigns,
		timestamp, m_timer, w_timer )
	VALUES (";

	$sql	=	$sql.$userID.",";
	$sql	=	$sql."'".$userNickname."',";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0,";

	$sql	=	$sql."0,";
	$sql	=	$sql."0,";
	$sql	=	$sql."0"." )";

	//creo
	mysqli_query($conn, $sql);

	//chiudo
	mysqli_close($conn);
	//-----------------------------------------
	
	//-----------------------------------------
	//scrivo i dati per le app
	//creo il json
	$str=	"";

	//$str= $str."&lbrace;";
	$str= $str."{";

	$str = $str."\"nickname\":\"".$userNickname."\",";

	$str= $str."\"picturesUploaded\":0,";

	$str= $str."\"picturesTagged\":0,";

	$str= $str."\"tags\":0,";

	$str= $str."\"validations\":0,";
	
	$str= $str."\"score\":0,";

	$str= $str."\"level\":0,";

	$str= $str."\"pois\":0,";

	$str= $str."\"campaigns\":0,";

	$str= $str."\"m_picturesUploaded\":0,";

	$str= $str."\"m_picturesTagged\":0,";

	$str= $str."\"m_tags\":0,";

	$str= $str."\"m_validations\":0,";

	$str= $str."\"m_score\":0,";

	$str= $str."\"m_level\":0,";

	$str= $str."\"m_pois\":0,";

	$str= $str."\"m_campaigns\":0,";

	$str= $str."\"w_picturesUploaded\":0,";

	$str= $str."\"w_picturesTagged\":0,";

	$str= $str."\"w_tags\":0,";

	$str= $str."\"w_validations\":0,";
	
	$str= $str."\"w_score\":0,";

	$str= $str."\"w_level\":0,";

	$str= $str."\"w_pois\":0,";

	$str= $str."\"w_campaigns\":0";

	$str= $str."}";

	//$str= $str."&rbrace;";

	//scrivo
	print ( $str );

	//-----------------------------------------

	//esco
	return;
}

//prelevo la row
$row = mysqli_fetch_assoc($result);

//prelevo i dati
$nickname		=	$row['nickname'];	
$PicturesUploaded	= 	$row['picturesUploaded'];
$PicturesTagged		= 	$row['picturesTagged'];
$Tags			= 	$row['tags'];
$Validations		= 	$row['validations'];
$Score			= 	$row['score'];
$Level			= 	$row['level'];
$Pois			= 	$row['pois'];
$Campaigns		= 	$row['campaigns'];

$m_PicturesUploaded	= 	$row['m_picturesUploaded'];
$m_PicturesTagged	= 	$row['m_picturesTagged'];
$m_Tags			= 	$row['m_tags'];
$m_Validations		= 	$row['m_validations'];
$m_Score		= 	$row['m_score'];
$m_Level		= 	$row['m_level'];
$m_Pois			= 	$row['m_pois'];
$m_Campaigns		= 	$row['m_campaigns'];

$w_PicturesUploaded	= 	$row['w_picturesUploaded'];
$w_PicturesTagged	= 	$row['w_picturesTagged'];
$w_Tags			= 	$row['w_tags'];
$w_Validations		= 	$row['w_validations'];
$w_Score		= 	$row['w_score'];
$w_Level		= 	$row['w_level'];
$w_Pois			= 	$row['w_pois'];
$w_Campaigns		= 	$row['w_campaigns'];

//creo il json
$str=	"";

$str= $str."{";

$str = $str."\"nickname\":\"".$row['nickname']."\",";

$str= $str."\"picturesUploaded\":".$row['picturesUploaded'].",";

$str= $str."\"picturesTagged\":".$row['picturesTagged'].",";

$str= $str."\"tags\":".$row['tags'].",";

$str= $str."\"validations\":".$row['validations'].",";

$str= $str."\"score\":".$row['score'].",";

$str= $str."\"level\":".$row['level'].",";

$str= $str."\"pois\":".$row['pois'].",";

$str= $str."\"campaigns\":".$row['campaigns'].",";

$str= $str."\"m_picturesUploaded\":".$row['m_picturesUploaded'].",";

$str= $str."\"m_picturesTagged\":".$row['m_picturesTagged'].",";

$str= $str."\"m_tags\":".$row['m_tags'].",";

$str= $str."\"m_validations\":".$row['m_validations'].",";

$str= $str."\"m_score\":".$row['m_score'].",";

$str= $str."\"m_level\":".$row['m_level'].",";

$str= $str."\"m_pois\":".$row['m_pois'].",";

$str= $str."\"m_campaigns\":".$row['m_campaigns'].",";

$str= $str."\"w_picturesUploaded\":".$row['w_picturesUploaded'].",";

$str= $str."\"w_picturesTagged\":".$row['w_picturesTagged'].",";

$str= $str."\"w_tags\":".$row['w_tags'].",";

$str= $str."\"w_validations\":".$row['w_validations'].",";

$str= $str."\"w_score\":".$row['w_score'].",";

$str= $str."\"w_level\":".$row['w_level'].",";

$str= $str."\"w_pois\":".$row['w_pois'].",";

$str= $str."\"w_campaigns\":".$row['w_campaigns']."";


$str= $str."}";


//scrivo
echo	$str;

// Free the resources associated with the result set
// This is done automatically at the end of the script
mysqli_free_result($result );


mysqli_close($conn);

//-----------------------------------------------
?>




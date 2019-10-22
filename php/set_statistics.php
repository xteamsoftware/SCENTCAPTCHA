
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

$addPicturesUploaded	= 0;
$addPicturesTagged	= 0;
$addTags		= 0;
$addValidations		= 0;
$addScore		= 0;
$addLevel		= 0;
$addPois		= 0;
$addCampaigns		= 0;


if(!empty($_GET['picturesUploaded']))
	$addPicturesUploaded	= $_GET['picturesUploaded'];
if(!empty($_GET['picturesTagged']))
	$addPicturesTagged	= $_GET['picturesTagged'];
if(!empty($_GET['tags']))
	$addTags		= $_GET['tags'];
if(!empty($_GET['validations']))
	$addValidations		= $_GET['validations'];
if(!empty($_GET['score']))
	$addScore		= $_GET['score'];
if(!empty($_GET['level']))
	$addLevel		= $_GET['level'];
if(!empty($_GET['pois']))
	$addPois		= $_GET['pois'];
if(!empty($_GET['campaigns']))
	$addCampaigns		= $_GET['campaigns'];

/*
print( $addPicturesUploaded."\n");
print( $addPicturesTagged."\n");
print( $addTags."\n");
print( $addValidations."\n");
print( $addScore."\n");
print( $addLevel."\n");
print( $addPois."\n");
print( $addCampaigns."\n");
*/

//-----------------------------------------------
// SE NULLI AZZERO
//-----------------------------------------------
if(is_null($addPicturesUploaded))
	$addPicturesUploaded	= 0;
if(is_null($addPicturesTagged))
	$addPicturesTagged	= 0;
if(is_null($_GET['tags']))
	$addTags		= 0;
if(is_null($_GET['validations']))
	$addValidations		= 0;
if(is_null($_GET['score']))
	$addScore		= 0;
if(is_null($_GET['level']))
	$addLevel		= 0;
if(is_null($_GET['pois']))
	$addPois		= 0;
if(is_null($_GET['campaigns']))
	$addCampaigns		= 0;

//-----------------------------------------------
// AGGIUNGO NEL SISTEMA CENTRALE
//-----------------------------------------------
// Query to select an int column
$query = "SELECT * FROM SCENTUser WHERE userID=0";

//visualizzo
$result = mysqli_query($conn, $query);

//esiste una email
if ( mysqli_num_rows($result) == 0  )
{
	die('ERROR:main users not exist');
}

//prelevo la row
$row = mysqli_fetch_assoc($result);


//prelevo l'id
$id			=	$row['id'];
$picturesUploaded 	=	$row['picturesUploaded'];
$picturesTagged 	=	$row['picturesTagged'];
$tags			= 	$row['tags'];
$validations		= 	$row['validations'];
$score			= 	$row['score'];
$level			= 	$row['level'];
$pois			= 	$row['pois'];
$campaigns		= 	$row['campaigns'];

$m_picturesUploaded 	=	$row['m_picturesUploaded'];
$m_picturesTagged 	=	$row['m_picturesTagged'];
$m_tags			= 	$row['m_tags'];
$m_validations		= 	$row['m_validations'];
$m_score		= 	$row['m_score'];
$m_level		= 	$row['m_level'];
$m_pois			= 	$row['m_pois'];
$m_campaigns		= 	$row['m_campaigns'];
$m_timer		= 	$row['m_timer'];

$w_picturesUploaded 	=	$row['w_picturesUploaded'];
$w_picturesTagged 	=	$row['w_picturesTagged'];
$w_tags			= 	$row['w_tags'];
$w_validations		= 	$row['w_validations'];
$w_score		= 	$row['w_score'];
$w_level		= 	$row['w_level'];
$w_pois			= 	$row['w_pois'];
$w_campaigns		= 	$row['w_campaigns'];
$w_timer		= 	$row['w_timer'];

//---------------------------------------------
$date = new DateTime($ddate);
$month = $date->format("m");
$week = $date->format("W");

//print("Month ".$month );
//print("Week ".$week );

//---------------------------------------------
//valutiamo se azzerare i month
//controllo il mese
if ( $m_timer != $month )
{
	$m_picturesUploaded 	=	0;
	$m_picturesTagged 	=	0;
	$m_tags			= 	0;
	$m_validations		= 	0;
	$m_score		= 	0;
	$m_level		= 	0;
	$m_pois			= 	0;
	$m_campaigns		= 	0;

	//modifico	
	$m_timer 		= 	$month;
}

//controllo la settimana
if ( $w_timer != $week )
{
	$w_picturesUploaded 	=	0;
	$w_picturesTagged 	=	0;
	$w_tags			= 	0;
	$w_validations		= 	0;
	$w_score		= 	0;
	$w_level		= 	0;
	$w_pois			= 	0;
	$w_campaigns		= 	0;

	//modifico
	$w_timer 		= 	$week;
}

//---------------------------------------------

// Free the resources associated with the result set
// This is done automatically at the end of the script
mysqli_free_result($result );

//aggiorno
$picturesUploaded 	=	$picturesUploaded + $addPicturesUploaded;
$picturesTagged 	=	$picturesTagged + $addPicturesTagged;
$tags			= 	$tags + $addTags;
$validations		= 	$validations + $addValidations;
$score			= 	$score + $addScore;
$level			= 	$level + $addLevel;
$pois			= 	$pois + $addPois;
$campaigns		= 	$campaigns + $addCampaigns;

//aggiorno
$m_picturesUploaded 	=	$m_picturesUploaded + $addPicturesUploaded;
$m_picturesTagged 	=	$m_picturesTagged + $addPicturesTagged;
$m_tags			= 	$m_tags + $addTags;
$m_validations		= 	$m_validations + $addValidations;
$m_score		= 	$m_score + $addScore;
$m_level		= 	$m_level + $addLevel;
$m_pois			= 	$m_pois + $addPois;
$m_campaigns		= 	$m_campaigns + $addCampaigns;

//aggiorno
$w_picturesUploaded 	=	$w_picturesUploaded + $addPicturesUploaded;
$w_picturesTagged 	=	$w_picturesTagged + $addPicturesTagged;
$w_tags			= 	$w_tags + $addTags;
$w_validations		= 	$w_validations + $addValidations;
$w_score		= 	$w_score + $addScore;
$w_level		= 	$w_level + $addLevel;
$w_pois			= 	$w_pois + $addPois;
$w_campaigns		= 	$w_campaigns + $addCampaigns;


//---------------------------------------------
$sql 	= 	"UPDATE SCENTUser SET"; 
$sql	=	$sql." picturesUploaded=".$picturesUploaded.",";
$sql	=	$sql." picturesTagged=".$picturesTagged.",";
$sql	=	$sql." tags=".$tags.",";
$sql	=	$sql." validations=".$validations.",";
$sql	=	$sql." score=".$score.",";
$sql	=	$sql." level=".$level.",";
$sql	=	$sql." pois=".$pois.",";
$sql	=	$sql." campaigns=".$campaigns.",";

$sql	=	$sql." timestamp=".time().",";

$sql	=	$sql." m_picturesUploaded=".$m_picturesUploaded.",";
$sql	=	$sql." m_picturesTagged=".$m_picturesTagged.",";
$sql	=	$sql." m_tags=".$m_tags.",";
$sql	=	$sql." m_validations=".$m_validations.",";
$sql	=	$sql." m_score=".$m_score.",";
$sql	=	$sql." m_level=".$m_level.",";
$sql	=	$sql." m_pois=".$m_pois.",";
$sql	=	$sql." m_campaigns=".$m_campaigns.",";
$sql	=	$sql." m_timer=".$m_timer.",";

$sql	=	$sql." w_picturesUploaded=".$w_picturesUploaded.",";
$sql	=	$sql." w_picturesTagged=".$w_picturesTagged.",";
$sql	=	$sql." w_tags=".$w_tags.",";
$sql	=	$sql." w_validations=".$w_validations.",";
$sql	=	$sql." w_score=".$w_score.",";
$sql	=	$sql." w_level=".$w_level.",";
$sql	=	$sql." w_pois=".$w_pois.",";
$sql	=	$sql." w_campaigns=".$w_campaigns.",";
$sql	=	$sql." w_timer=".$w_timer."";

$sql	=	$sql." WHERE userID=0";

//echo $sql;

//aggiorno
if (!mysqli_query($conn, $sql)) 
{
    die("Error: " . mysqli_error($conn));
}

//controllo se l'id dello user è 0
if ( $userID == 0)
	return;

//-----------------------------------------------
// CONTROLLO SE GIA' PRESENTE ID
//-----------------------------------------------
// Query to select an int column
$query = "SELECT * FROM SCENTUser WHERE userID=".$userID ;

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
$picturesUploaded 	=	$row['picturesUploaded'];
$picturesTagged 	=	$row['picturesTagged'];
$tags			= 	$row['tags'];
$validations		= 	$row['validations'];
$score			= 	$row['score'];
$level			= 	$row['level'];
$pois			= 	$row['pois'];
$campaigns		= 	$row['campaigns'];

$m_picturesUploaded 	=	$row['m_picturesUploaded'];
$m_picturesTagged 	=	$row['m_picturesTagged'];
$m_tags			= 	$row['m_tags'];
$m_validations		= 	$row['m_validations'];
$m_score		= 	$row['m_score'];
$m_level		= 	$row['m_level'];
$m_pois			= 	$row['m_pois'];
$m_campaigns		= 	$row['m_campaigns'];
$m_timer		= 	$row['m_timer'];

$w_picturesUploaded 	=	$row['w_picturesUploaded'];
$w_picturesTagged 	=	$row['w_picturesTagged'];
$w_tags			= 	$row['w_tags'];
$w_validations		= 	$row['w_validations'];
$w_score		= 	$row['w_score'];
$w_level		= 	$row['w_level'];
$w_pois			= 	$row['w_pois'];
$w_campaigns		= 	$row['w_campaigns'];
$w_timer		= 	$row['w_timer'];

//---------------------------------------------
//valutiamo se azzerare i month
//controllo il mese
if ( $m_timer != $month )
{
	$m_picturesUploaded 	=	0;
	$m_picturesTagged 	=	0;
	$m_tags			= 	0;
	$m_validations		= 	0;
	$m_score		= 	0;
	$m_level		= 	0;
	$m_pois			= 	0;
	$m_campaigns		= 	0;

	//modifico	
	$m_timer 		= 	$month;
}

//controllo la settimana
if ( $w_timer != $week )
{
	$w_picturesUploaded 	=	0;
	$w_picturesTagged 	=	0;
	$w_tags			= 	0;
	$w_validations		= 	0;
	$w_score		= 	0;
	$w_level		= 	0;
	$w_pois			= 	0;
	$w_campaigns		= 	0;

	//modifico
	$w_timer 		= 	$week;
}

//---------------------------------------------


//aggiorno
$picturesUploaded	=	$picturesUploaded + $addPicturesUploaded;
$picturesTagged		=	$picturesTagged + $addPicturesTagged;
$tags			= 	$tags + $addTags;
$validations		= 	$validations + $addValidations;
$score			= 	$score + $addScore;
$level			= 	$level + $addLevel;
$pois			= 	$pois + $addPois;
$campaigns		= 	$campaigns + $addCampaigns;

//aggiorno
$m_picturesUploaded 	=	$m_picturesUploaded + $addPicturesUploaded;
$m_picturesTagged 	=	$m_picturesTagged + $addPicturesTagged;
$m_tags			= 	$m_tags + $addTags;
$m_validations		= 	$m_validations + $addValidations;
$m_score		= 	$m_score + $addScore;
$m_level		= 	$m_level + $addLevel;
$m_pois			= 	$m_pois + $addPois;
$m_campaigns		= 	$m_campaigns + $addCampaigns;

//aggiorno
$w_picturesUploaded 	=	$w_picturesUploaded + $addPicturesUploaded;
$w_picturesTagged 	=	$w_picturesTagged + $addPicturesTagged;
$w_tags			= 	$w_tags + $addTags;
$w_validations		= 	$w_validations + $addValidations;
$w_score		= 	$w_score + $addScore;
$w_level		= 	$w_level + $addLevel;
$w_pois			= 	$w_pois + $addPois;
$w_campaigns		= 	$w_campaigns + $addCampaigns;


$sql 	= 	"UPDATE Sql309546_1.tabSCENTUser SET"; 
$sql	=	$sql." picturesUploaded=".$picturesUploaded.",";
$sql	=	$sql." picturesTagged=".$picturesTagged.",";
$sql	=	$sql." tags=".$tags.",";
$sql	=	$sql." validations=".$validations.",";
$sql	=	$sql." score=".$score.",";
$sql	=	$sql." level=".$level.",";
$sql	=	$sql." pois=".$pois.",";
$sql	=	$sql." campaigns=".$campaigns.",";

$sql	=	$sql." timestamp=".time(). ",";

$sql	=	$sql." m_picturesUploaded=".$m_picturesUploaded.",";
$sql	=	$sql." m_picturesTagged=".$m_picturesTagged.",";
$sql	=	$sql." m_tags=".$m_tags.",";
$sql	=	$sql." m_validations=".$m_validations.",";
$sql	=	$sql." m_score=".$m_score.",";
$sql	=	$sql." m_level=".$m_level.",";
$sql	=	$sql." m_pois=".$m_pois.",";
$sql	=	$sql." m_campaigns=".$m_campaigns.",";
$sql	=	$sql." m_timer=".$m_timer.",";

$sql	=	$sql." w_picturesUploaded=".$w_picturesUploaded.",";
$sql	=	$sql." w_picturesTagged=".$w_picturesTagged.",";
$sql	=	$sql." w_tags=".$w_tags.",";
$sql	=	$sql." w_validations=".$w_validations.",";
$sql	=	$sql." w_score=".$w_score.",";
$sql	=	$sql." w_level=".$w_level.",";
$sql	=	$sql." w_pois=".$w_pois.",";
$sql	=	$sql." w_campaigns=".$w_campaigns.",";
$sql	=	$sql." w_timer=".$w_timer."";

$sql	=	$sql." WHERE userID=".$userID ;

//echo $sql;

//aggiorno
if (!mysqli_query($conn, $sql)) 
{
    die("error: " . mysqli_error($conn));
}

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


//scrivo il risultato
echo	$str;

// Free the resources associated with the result set
// This is done automatically at the end of the script
mysqli_free_result($result );


//chiudo la connessione
mysqli_close($conn);

//-----------------------------------------------
//-----------------------------------------------
?>
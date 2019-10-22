<?php
	function readJPGExifData($img, $directory)
	{
    		$imgDir = $directory . $img;
		
		print( $imgDir."\n" );

		/// No file given
    		if (!file_exists ($imgDir )) 
		{
			print( "File not exist\n" );
			return;
		}

    		//reading exif data
    		$exif = exif_read_data($imgDir, ANY_TAG, true);
    		//preparing the GPS coordinates
    		$gpsLat = $exif["GPS"]["GPSLatitude"];
    		$degLat = $gpsLat[0];
    		$minLat = $gpsLat[1];
    		$secLat = $gpsLat[2];
    		$gpsLng = $exif["GPS"]["GPSLongitude"];
    		$degLon = $gpsLng[0];
    		$minLon = $gpsLng[1];
    		$secLon = $gpsLng[2];
    		//converting GPS lat data to degree
    		$secLat = $secLat[0] . $secLat[1] . "," . $secLat[2] . $secLat[3] . $secLat[4];
    		$minLat2 = $minLat / 60;
    		$secLat2 = $secLat * (1 / 3600);
    		$lat = $degLat + $minLat2 + $secLat2;
    		//Lat coordinate - degree
    		//converting GPS long data to degree
    		$secLon = $secLon[0] . $secLon[1] . "," . $secLon[2] . $secLon[3] . $secLon[4];
    		$minLon2 = $minLon / 60;
    		$secLon2 = $secLon * (1 / 3600);
    		$lng = $degLon + $minLon2 + $secLon2;
    
		print( "EXIF<br />\n" );
		print( $gpsLat[0]." ". $gpsLat[1]." ". $gpsLat[2]."<br />\n" );
		print( $gpsLng[0]." ". $gpsLng[1]." ". $gpsLng[2]."<br />\n" );
		print( $lat."<br />\n" );
		print( $lng."<br />\n" );

		$timestamp = strtotime($exif["EXIF"]["DateTimeOriginal"]);

		print( $timestamp ."<br />\n" );

foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        echo "$key.$name: $val<br />\n";
    }
}
	}

	//voglio leggere gli exif
	readJPGExifData('IMG_4692.jpg', '' );	

?>
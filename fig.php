<?php
// Create a blank image
$img = imagecreatetruecolor(768,768);

// Allocate a color white
$colbg = imagecolorallocate($img, 255, 255, 255);

// Allocate a color black
$col = imagecolorallocate($img, 0, 0, 0);

// Fill background with above selected color. 
imagefill($img, 0, 0, $colbg); 

function regularPolygon($img,$x,$y,$radius,$sides,$color)
{
    $points = array();
    for($a = 0;$a <= 360; $a += 360/$sides)
    {
        $points[] = $x + $radius * cos(deg2rad($a));
        $points[] = $y + $radius * sin(deg2rad($a));
    }
    return imagepolygon($img,$points,$sides,$color);
}

regularPolygon($img,768/2,768/2,300,6,$col );
// draw the white ellipse
imageellipse($img, 768/2, 768/2, 400, 400,$col );
regularPolygon($img,768/2,768/2,150,4,$col );

header('Content-type: image/png');
imagepng($img);
imagedestroy($img);
?>
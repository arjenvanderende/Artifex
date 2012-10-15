<?php
  header("Content-type: image/png");
  header ("Cache-Control: no-cache");

  if( rand() % 2 == 1 )
  {
    $im = imagecreatefromjpeg("geenstijl-logo.jpg");
  }
  else
  {
    $im = imagecreatefromjpeg("geenstijl-logo2.jpg");
  }

  Imagepng( $im,'',100);

  // cleanup
  ImageDestroy($im);
?> 
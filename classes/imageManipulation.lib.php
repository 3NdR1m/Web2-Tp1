<?php
function createRescaledCopy($image_path, $width, $height, $output=null)
{
    $img_src = imagecreatefromjpeg($image_path);
    $img_dest = imagescale($img_src, $width, $height);
    $name = $output ?? basename($image_path, ".jpg")."-".$width."x".$height.".jpeg";

    imagejpeg($img_dest, $name);
    imagedestroy($img_src);
    imagedestroy($img_dest);
}
?>
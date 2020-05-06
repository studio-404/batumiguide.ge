<?php 
//echo __DIR__; 
//exit;

function is_image($path)
    {
    $a = getimagesize($path);
    $image_type = $a[2];

    if (in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
    {
        return true;
    }
    return false;
}


// unlink($dir."/".$object); 
function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($dir."/".$object)){
           rrmdir($dir."/".$object);
       	}else{
       		$arr = explode(".", $object);
       		$ex = strtolower(end($arr));
       		if(is_image($dir."/".$object)){
       			echo "IMAGE:".$dir."/".$object;
       		}else{
       			echo "Error:".$dir."/".$object;
       		}
       		echo "<br>";
       		// if($ex=="php" || $ex=="py" || $ex=="zip" || $ex=="rar"){
       		// 	echo $dir."/". $object."<br>";
       		// 	//unlink($dir."/".$object); 
       		// }
       	}
       } 
     }
     //rmdir($dir); 
   } 
 }

rrmdir("/home/batumiguide/public_html/files");
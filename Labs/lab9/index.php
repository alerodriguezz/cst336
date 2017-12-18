<?php

/** settings **/
$images_dir = '../lab9/gallery/';
$thumbs_dir = '../lab9/thumbs/';
$thumbs_width = 200;
$images_per_row = 3;

/** generate photo gallery **/
$image_files = get_files($images_dir);
if(count($image_files)) {
	$index = 0;
	foreach($image_files as $index=>$file) {
		$index++;
		$thumbnail_image = $thumbs_dir.$file;
		if(!file_exists($thumbnail_image)) {
			$extension = get_file_extension($thumbnail_image);
			if($extension) {
				make_thumb($images_dir.$file,$thumbnail_image,$thumbs_width);
			}
		}
		echo '<a href="',$images_dir.$file,'" class="photo-link smoothbox" rel="gallery"><img src="',$thumbnail_image,'" /></a>';
		if($index % $images_per_row == 0) { echo '<div class="clear"></div>'; }
	}
	echo '<div class="clear"></div>';
}
else {
	echo '<p>There are no images in this gallery.</p>';
}
?>
<html>
      <head>
          <title>Lab 9</title>
           <link href="css/styles.css" rel="stylesheet" type="text/css"/>
             <meta charset="utf-8">
      </head>
      <body class="container-fluid">
       <center>
           <h1>
               File Upload 
           </h1>
           <div>
               <form method="post" enctype="multipart/form-data">
                   
                  Select a file: <input type="file" class ="jelly" name="fileName"><br>
                  
                  <input type="submit"  class="jelly" name="uploadForm" value="Upload File" /> 

               </form>
           </div>
           
       </center>   
      </body>
     
</html>
<?php
$target_dir = "../lab9/gallery/";
$target_file = $target_dir . basename($_FILES["fileName"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (isset($_POST['uploadForm'])) {
    //errors
    if ($_FILES["fileName"]["error"] > 0) {
      echo "Error: " . $_FILES["fileName"]["error"] . "<br>";
    }
    else {
      echo "Upload: " . $_FILES["fileName"]["name"] . "<br>";
      echo "Type: " . $_FILES["fileName"]["type"] . "<br>";
      echo "Size: " . ($_FILES["fileName"]["size"] / 1024) . " KB<br>";
      echo "Stored in: " . $target_file . "<br>";
     
      
       if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
        move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file);
        echo "The file ". basename( $_FILES["fileName"]["name"]). " has been uploaded.";
        //put file in folder 
      make_thumb($target_file,"../lab9/thumbs/".basename($_FILES["fileName"]["name"]),$desired_width);
              }
        else {
        echo "Sorry, there was an error uploading your file.";
             }
        }

    }  

function filterUploadedFile() {
   $allowedTypes = array("image/jpg","image/png");
  $allowedExtensions = array("jpg", "png");
  $allowedSize = 1000;
  $filterError = "";
  if (!in_array($_FILES["fileName"]["type"],  $allowedTypes ) ) {
        $filterError = "Invalid type. <br>";
   }

  $fileName = $_FILES["fileName"]["name"];
   if (!in_array(substr($fileName,strrpos($fileName,".")+1), $allowedExtensions) ) {
       $filterError = "Invalid extension. <br>"; 
    }
   
   if ($_FILES["fileName"]["size"]  > $allowedSize  ) {
        $filterError .= "File size too big. <br>";
    }
     // Check if file already exists
    if (file_exists($target_dir.$_FILES["fileName"]["name"])) {
         $filterError .= "Sorry, file already exists.. <br>";
    }
    return $filterError;

}

/* function:  generates thumbnail */
function make_thumb($src,$dest,$desired_width) {
	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height*($desired_width/$width));
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width,$desired_height);
	/* copy source image at a resized size */
	imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image,$dest);
}

/* function:  returns files from dir */
function get_files($images_dir,$exts = array('jpg','png')) {
	$files = array();
	if($handle = opendir($images_dir)) {
		while(false !== ($file = readdir($handle))) {
			$extension = strtolower(get_file_extension($file));
			if($extension && in_array($extension,$exts)) {
				$files[] = $file;
			}
		}
		closedir($handle);
	}
	return $files;
}

/* function:  returns a file's extension */
function get_file_extension($file_name) {
	return substr(strrchr($file_name,'.'),1);
}




?>

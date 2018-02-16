<?php

//if($_SERVER['REQUEST_METHOD'] == "POST" &&
 if( isset($_FILES["post_video"]["type"]) ){
		echo "file";
	var_dump($_FILES["file"]);
	var_dump($_FILES['post_video']);
	var_dump($_FILES['size']);
	$msg = 'upploading';
	$uploaded = FALSE;
	$extensions = array("mp4", "Avi", "Ogg", "Webm", "Vob"); // file extensions to be checked
	$fileTypes = array("video/mp4","video/avi","video/ogg"); // file types to be checked
	$file = $_FILES["post_video"];
	$file_extension = strtolower(end(explode(".", $file["name"])));

	//file size condition can be included here   -- && ($file["size"] < 100000)
	if (in_array($file["type"],$fileTypes) && in_array($file_extension, $extensions)) {
		if ($file["error"] > 0)
		{
			$msg = 'Error Code: ' . $file["error"];
			//echo "error";
		}
		else
		{
			if (file_exists("../../WIMedia/Vid/blog/" . $file["name"])) {
				$msg = $file["name"].' already exist.';	
				//echo "exists";			
			}
			else
			{
				$sourcePath = $file['tmp_name']; //  source path of the file
				$targetPath = '../../WIMedia/Vid/blog/'.$file['name']; // Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				$msg = $file['name'];
				$uploaded = TRUE;
				//echo "uploaded";
			}
		}
	}
	else
	{
		$msg = '***Invalid file Size or Type***';
	}
	echo ($uploaded ? $msg : '<span class="msg-error">'.$msg.'</span>');
}


die();
?>
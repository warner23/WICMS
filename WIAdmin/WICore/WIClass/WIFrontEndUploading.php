<?php 

/**
* 
*/
class WIFrontEndUploading
{
	
	function __construct(argument)
	{
		 $this->WIdb = WIdb::getInstance();
	}

	public function ImageUploading($formData, $dir)
	{
		echo "form". $formData;
		echo "dir". $dir;

		if (isset($_FILES)) {
	if (isset($_FILES['file'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$imgs     = "../../WIMedia/Img/" . basename($_FILES['file']['name']);
		$vids     = "../../WIMedia/Vid/" . basename($_FILES['file']['name']);
		$error    = $_FILES['file']['error'];
		
		if ($error === UPLOAD_ERR_OK) {
			$imgextension = pathinfo($imgs, PATHINFO_EXTENSION);
			$vidextension = pathinfo($vids, PATHINFO_EXTENSION);

			if (!in_array($imgextension, $acceptList)) {
				$error = 'Invalid file image uploaded.';
			}

			if (!in_array($vidextension, $acceptList)) {
				$error = 'Invalid file Video uploaded.';
			}

			//echo "vid" . $vidextension;
			//echo "black" . $blacklist;

			if (in_array($vidextension,$blacklist)) {
	move_uploaded_file($tmp_name, $vids);
				echo json_encode(array(
	'name'  => $vids,
	'error' => $error,
));
			}else if(in_array($imgextension, $whitelist)) {
				move_uploaded_file($tmp_name, $imgs);
				//echo $name;
				echo json_encode(array(
	'name'  => $imgs,
	'error' => $error,
));
			}

		  }
	   }
     }
	}




}


?>
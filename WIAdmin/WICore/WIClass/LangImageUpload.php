<?php
/**
 * This is just an example of how a file could be processed from the
 * upload script. It should be tailored to your own requirements.
 */

// Only accept files with these extensions
$whitelist = array('jpg', 'jpeg', 'png', 'gif', 'JPEG','JPG', 'PNG');
$blacklist = array('avi', 'wmv', 'mov', 'WMV', 'mp4');
$imgs      = null;
$vids      = null;
$error     = 'No file uploaded.';

$acceptList = array_merge($whitelist, $blacklist);


if (isset($_FILES)) {
	if (isset($_FILES['file'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$imgs     = "../../WIMedia/Img/lang/" . basename($_FILES['file']['name']);
		$vids     = "../../WIMedia/Vid/lang/" . basename($_FILES['file']['name']);
		$error    = $_FILES['file']['error'];
		$imgups     = "WIMedia/Img/lang/" . basename($_FILES['file']['name']);
		$imgThumb     = basename($_FILES['file']['name']);
		
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
	'name'  => $imgups,
	'id'  => $imgThumb,
	'error' => $error,
));
			}

		}
	}
}


die();

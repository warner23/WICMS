<?php
/**
 * This is just an example of how a file could be processed from the
 * upload script. It should be tailored to your own requirements.
 */

// Only accept files with these extensions
$whitelist = array('jpg', 'jpeg', 'png', 'gif', 'JPEG','JPG', 'PNG',);
$blacklist = array('avi', 'wmv', 'mov', 'WMV', 'mp4');
$audiolist = array('avi', 'wmv', 'mov', 'WMV', 'mp3');
$imgs      = null;
$vids      = null;
$audio      = null;
$error     = 'No file uploaded.';

$acceptList = array_merge($whitelist, $blacklist, $audiolist);


if (isset($_FILES)) {
	if (isset($_FILES['file'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$imgs     = dirname(dirname(dirname(dirname(__FILE__)))) . "/WIAdmin/WIMedia/Img/blog/revslider/" . basename($_FILES['file']['name']);
		$imgname = basename($_FILES['file']['name']);
		$vids     = dirname(dirname(dirname(dirname(__FILE__)))) . "/WIAdmin/WIMedia/Vid/blog/revslider/" . basename($_FILES['file']['name']);
		$vidname = basename($_FILES['file']['name']);

		$audio     = dirname(dirname(dirname(dirname(__FILE__)))) . "/WIAdmin/WIMedia/Audio/blog/revslider/" . basename($_FILES['file']['name']);
		$audioname = basename($_FILES['file']['name']);
		$error    = $_FILES['file']['error'];
			//echo $error;
			//echo "ok". UPLOAD_ERR_OK;
		if ($error === UPLOAD_ERR_OK) {
			//echo "ok";
			$imgextension = pathinfo($imgs, PATHINFO_EXTENSION);
			$vidextension = pathinfo($vids, PATHINFO_EXTENSION);
			$audioextension = pathinfo($audio, PATHINFO_EXTENSION);

			if (!in_array($imgextension, $acceptList)) {
				$error = 'Invalid file image uploaded.';
			}

			if (!in_array($vidextension, $acceptList)) {
				$error = 'Invalid file Video uploaded.';
			}

			if (!in_array($audioextension, $acceptList)) {
				$error = 'Invalid file audio uploaded.';
			}

			//echo "vid" . $vidextension;
			//echo "black" . $blacklist;

			if (in_array($vidextension,$blacklist)) {
	move_uploaded_file($tmp_name, $vids);
				$msg = "Successfully uploaded";
				$res = array(
					'status' => "completed",
					'type' => "video",
					'name'  => $vidname,
	                'mes' => $msg
				);
				echo json_encode($res);
			}else if(in_array($imgextension, $whitelist)) {
				move_uploaded_file($tmp_name, $imgs);
				//echo $name;
				$msg = "Successfully uploaded";
				$res = array(
					'status' => "completed",
					'type' => "img",
					'name'  => $imgname,
	                'mes' => $msg
				);
				echo json_encode($res);
			}else if(in_array($audioextension, $audiolist)) {
				move_uploaded_file($tmp_name, $audio);
				//echo $name;
				$msg = "Successfully uploaded";
				$res = array(
					'status' => "completed",
					'type' => "audio",
					'name'  => $audioname,
	                'mes' => $msg
				);
				echo json_encode($res);
			}

		}else{
			$msg = "problem uploading";
				$res = array(
					'status' => "incompleted",
					'type' => "slider",
					'error' => $error,
					'name'  => $imgname,
	                'mes' => $msg
				);
				echo json_encode($res);
		}
	}
}


die();

<?php		

class WIUpload
{
	public function uploadFile($data)
	{

		 $Destination = 'WIMedia/Img/header/';
    if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name']))
    {
        die('Something went wrong with Upload!');
    }

    $RandomNum   = rand(0, 9999999999);
    
    $ImageName      = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
    $ImageType      = $_FILES['ImageFile']['type']; //"image/png", image/jpeg etc.

    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);

    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);

    //Create new image name (with random number added).
    $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    
    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");

	$id = 1
	$sql = "UPDATE `wi_header` SET  `header_image` = :header WHERE `header_id` =:id";
    $stmt = $this->WIdb->prepare($sql);
    $stmt->bindParam(':header', $NewImageName, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();


	}
}


?>
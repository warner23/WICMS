<?php

/**
* image Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIImage
{
	   private $WIdb = null;

	    function __construct() 
	    {
       $this->WIdb = WIdb::getInstance();
    	}


    	public function AllPics()
    	{
    	$dir = dirname(dirname(dirname(__FILE__))) . '/WIMedia/Img/';
        $images = scandir($dir);

        $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');

		// init result
		$result = array();

		// directory to scan
		$directory = new DirectoryIterator($dir);

        foreach ($images as $Img => $value) {
        if ($value === '.' or $value === '..') continue;
        if (is_dir($dir.$value)) {
        //code to use if directory
                echo '<div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $value . '</div>
        <div class="panel-body">Folder </div>
        <div class="panel-footer"></div>
        </div></div>';
        }
        
        }

        // iterate
		foreach ($directory as $fileinfo) {
		    // must be a file
		    if ($fileinfo->isFile()) {
		        // file extension
		        $extension = strtolower(pathinfo($fileinfo->getFilename(), PATHINFO_EXTENSION));
		        // check if extension match
		        if (in_array($extension, $extensions)) {
		            // add to result
		            $result[] = $fileinfo->getFilename();
		        }
		    }
		}
		// print result
		//print_r($result);
		foreach ($result as $key => $value) {
			                echo '<div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $value . '</div>
        <div class="panel-body"><img src="WIMedia/Img/' . $value .'" class="img-responsive" style="width:50px; height:50px;"></div>
        <div class="panel-footer"></div>
        </div></div>';
		}


    	}
}

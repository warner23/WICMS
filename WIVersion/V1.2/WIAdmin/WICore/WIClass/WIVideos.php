<?php

/**
* image Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIVideos
{
	   private $WIdb = null;

	    function __construct() 
	    {
       $this->WIdb = WIdb::getInstance();
    	}


    	public function AllVideos()
    	{
    	$dir = dirname(dirname(dirname(__FILE__))) . '/WIMedia/Vid/';
        $video = scandir($dir);

        $extensions = array('jpg', 'jpeg', 'avi', 'wmv', 'mov', 'WMV', 'mp4');

		// init result
		$result = array();

		// directory to scan
		$directory = new DirectoryIterator($dir);

        foreach ($video as $vids => $value) {
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
        <div class="panel-body"><video src="WIMedia/Vid/' . $value .'" class="img-responsive" style="width:50px; height:50px;"></video></div>
        <div class="panel-footer"></div>
        </div></div>';
		}


    	}
}

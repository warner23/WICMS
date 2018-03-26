<?php

class WISystem
{


	public function __construct() {
        $this->WIdb = WIdb::getInstance();
    }

    // Function to remove folders and files 
    public function rrmdir($dir) {
        if (is_dir($dir)) {

            $files = scandir($dir);
            foreach ($files as $file)
                if ($file != "." && $file != "..") self::rrmdir("$dir/$file");
             rmdir($dir);
        }
        else if (file_exists($dir)) unlink($dir);
    }

    // Function to Copy folders and files       
    public function rcopy($src, $dst) {
        if (file_exists ( $dst ))
            //echo "Folder Already Exitsts";
        if (is_dir ( $src )) {
            mkdir ( $dst );
            $files = scandir ( $src );
            print_r($files) ;
            foreach ( $files as $file )
                if ($file != "." && $file != "..")
                    self::rcopy ( "$src/$file", "$dst/$file" );
        } else if (file_exists ( $src ))
            copy ( $src, $dst );
    }

    public function recurse_copy($src,$dst) {
        //echo $src;

    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

    public function file_copy($src, $dst)
    {
        //echo $src;
        //echo $dst;
        if(file_exists($dst)){
            //echo "file exists";
        }else{
            copy($src, $dst);
        }
    }


    // function used to copy full directory structure from source to target
public function full_copy( $source, $target )
{
   // echo "sou ". $source;
    //echo "tar ". $target;
    if ( is_dir( $source ) )
    {
        //echo "dir";
        if(!file_exists($target)){
            //echo "mk";
            mkdir( $target, 0777 );
        $d = dir( $source );

        while ( FALSE !== ( $entry = $d->read() ) )
        {
            //echo "entry";
            if ( $entry == '.' || $entry == '..' )
            {
                continue;
            }

            $Entry = $source . '/' . $entry;           
            if ( is_dir( $Entry ) )
            {
                self::full_copy( $Entry, $target . '/' . $entry );
                continue;
            }
            copy( $Entry, $target . '/' . $entry );
        }

        $d->close();

    } else {
        

    }       
  }
}


    //create new file
    public function Create_File($dir, $name, $txt)
    {
      $NewPage = fopen($dir. '/'  .$name, "w") or die("Unable to open file!");
      fwrite($NewPage, $txt);
      fclose($NewPage);

    }

   

}
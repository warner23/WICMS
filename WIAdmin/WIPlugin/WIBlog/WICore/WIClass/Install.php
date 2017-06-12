<?php
/**
* Install Class
* Created by Warner Infinity
* Author Jules Warner
*/

class Install
{
	function __construct() 
	{
       $this->WIdb = WIdb::getInstance();
    }


    public function AddtoSideBar()
    {

    	 $this->WIdb->insert('WI_SideBar', array(
            "plugin"     => sidebar_name,
            "parent"  => parent_no,
            "sort"  => sort_no,
            "lang"  => lang
        )); 
    	 $sidebarId = = $this->WIdb->lastInsertId();

    	  $this->WIdb->insert('WI_SideBar', array(
            "plugin"     => sidebar_label,
            "link"     => 
            "parent"  => $sidebarId,
            "sort"  => sort_no,
            "lang"  => lang
        )); 
    }
}
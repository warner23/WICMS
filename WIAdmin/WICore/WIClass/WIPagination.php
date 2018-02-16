<?php
/**
* WIPagination Class
* Created by Warner Infinity
* Author Jules Warner
*/
class WIPagination {		
		public $itemsPerPage; //public $itemsPerPage This tells Paginator class how many items per page.
		public $range; // public $range: This variable set the range between current page and two ending page numbers. For example, if current page is 5, and range is 2, pagination numbers will be showed as 3,4,5,6,7. Current page will be the middle page number.
		public $currentPage; //public $currentPage:This variable stores current page number.
		public $total; //public $total:This variable stores total number of pages.
		public $textNav; //public $textNav:This variable decides if to show text navigation(Pre,Next) links. This approach makes it flexiable to hide/show the text navigation.
		private $_navigation; //private $_navigation:This variable stores all the text strings include 'Pre','Next' as well as 'Item per pages'. This approach makes it easy to change the text.
		public $itemSelect;	//public $itemSelect:This variable is an array of numbers, which is used to form the items per page select box.
		private $_link; //private $_link:This variable stores the link value, which is the sanitized $_SERVER['PHP_SELF'] value.
		private $_pageNumHtml; //private $_pageNumHtml:This variable stores the html content for paginations. We store it here to avoid repeated formatting process.
		private $_itemHtml;  //private $_itemHtml:This variable stores the html content for items per page select box. We store it here to avoid repeated formatting process.




        /**
         * Constructor
         */
        public function __construct()
        {
        	//set default values
        	$this->itemsPerPage = 5;
			$this->range        = 5;
			$this->currentPage  = 1;		
			$this->total		= 0;
			$this->textNav 		= false;
			$this->itemSelect   = array(5,25,50,100,'All');			
			//private values
			$this->_navigation  = array(
					'next'=>'Next',
					'pre' =>'Pre',
					'ipp' =>'Item per page'
			);			
        	$this->_link 		 = filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_STRING);
        	$this->_pageNumHtml  = '';
        	$this->_itemHtml 	 = '';
        }
        
         public function Pagination($item_per_page, $current_page, $total_records, $total_pages)
    {
         $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number

        if ($total_records < $item_per_page) {
            
        }else{
            $pagination .= '<ul class="pagination" id="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
            $previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
                $next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
        }
        
    }
    return $pagination; //return pagination links
    }
}
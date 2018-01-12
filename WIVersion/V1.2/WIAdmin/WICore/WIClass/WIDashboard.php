<?php
/**
* Maintenace Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIDashboard
{
	public function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}


	public function toDoList()
	{

		  if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_admin_todo_list`");
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
		$sql = "SELECT * FROM `wi_admin_todo_list` ORDER BY `id` ASC LIMIT :page, :item_per_page";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
		$query->execute();

		echo '<div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">To Do List</h3>
                                   
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="todo-list">
                                        ';
		while($res = $query->fetchAll() )
		{

			foreach ($res as $key => $value) {
				$completed =  $value['completed'];
				//print_r($value);
					 echo '<li><!-- drag handle -->
               <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>  
                                            <!-- checkbox -->
                                            <input type="checkbox" value="' . $value['completed']. '" name="" class="" id="' . $value['id']. '" checked/>                                            
                                            <!-- todo text -->
                                            <span class="text">' . $value['title']. '</span>
                                            <!-- Emphasis label -->
                                            <small class="label label-danger"><i class="fa fa-clock-o"></i>' .$value['timeStamp']. '</small>
                                            <!-- General tools such as edit or delete-->
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>

                                       <script type="text/javascript">
     
    var completed = "' . $completed . '";

                       if (completed === "y"){
                        $("#' . $value['id']. '").attr(`checked`, true); // Checks it
                       }else if (completed === "n"){
                        $("#' . $value['id']. '").attr(`checked`, false); // Unchecks it
                       }



                    $("#' . $value['id']. '").click(function(){
                        $("#' . $value['id']. '").attr(`checked`, true); // Checks it
                        WIDashboard.completed("' . $value['id'] . '");
                    })

</script>';


                               
			}
			

		}

		 $Pagination = WIDashboard::Pagination($item_per_page, $page_number, $rows, $total_pages);
    //print_r($Pagination);

		 echo '</ul>
               </div><!-- /.box-body -->';

		 echo ' <div class="box-footer clearfix no-border">';

         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagination;

    echo ' <button class="btn btn-default pull-right" id="addtodo" onclick="WIDashboard.showAddTodoModal();"><i class="fa fa-plus"></i> Add item</button>
                                </div>';
    echo '</div>';
            $res->closeCursor();


	}



	 public function Pagination($item_per_page, $current_page, $total_records, $total_pages)
    {
         $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
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
    return $pagination; //return pagination links
    }


    public function completetodo($id)
    {
    	$sql = "UPDATE  `wi_admin_todo_list` SET  `completed` =  'y' WHERE  `wi_admin_todo_list`.`id` =id";

    	$query = $this->WIdb->prepare($sql);
    	$query->bindParam(':id', $id, PDO::PARAM_INT);
    	$query->execute();

        $query->closeCursor();
    }

    public function addToDoListItem($todoItem)
    {
        $this->WIdb->insert('wi_admin_todo_list', array(
            "title"  => strip_tags($todoItem),
            "timeStamp" => date("Y-m-d-h-i-s")
            )); 
    }


    public function NotificationUsername($userId)
     {

        //echo "user" . $userId;
                $query = $this->WIdb->prepare('SELECT * FROM `wi_members` WHERE `user_id` =:value');
        $query->bindParam(':value', $userId, PDO::PARAM_INT);
        $query->execute();
        while ($result = $query->fetchAll(PDO::FETCH_ASSOC) ) {
            //print_r($result);
            return $result[0]['username'];
       }
       $result->closeCursor();
    }


    public function Notifications()
    {
        $sql = "SELECT * FROM wi_notifications";

        $query = $this->WIdb->prepare($sql);
        $query->execute();
        echo '<ul id="nots">';
        while ($res = $query->fetchAll(PDO::FETCH_ASSOC)) {
            foreach ($res as $key => $value) {
               $username = WIDashboard::NotificationUsername($value['user']);
                echo '<li> <a href="#">
                      <i class="fa fa-users text-aqua"></i> ' . $value['opperation'] . '
                    </a>
                  </li>';
            }
            
        }

        echo '</ul>';
        $res->closeCursor();
    }




}
<?php
/**
* WIDashboard Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIDashboard
{
	public function __construct()
	{
		$this->WIdb = WIdb::getInstance();
        $this->Page = new WIPagination();
	}


    public function Info_Boxes()
    {
/*        $sql = "SELECT * FROM `wi_admin_info_box`";

        $query = $this->WIdb->prepare($sql);
        $query->execute();

        $result = $query->fetchAll();*/

        $result = $this->WIdb->select("SELECT * FROM `wi_admin_info_box`");

        //print_r($result);
        //echo $result;
        foreach ($result as $box) {
            echo ' <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box styleswitcher">
                                <div class="inner">
                                    <h3 id="' .$box['info'] . '">
                                        

                                    </h3>
                                    <p>
                                       ' . $box['name']. '
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->';
        }
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
        $onclick = "todoListItem";
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

		 $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);

		 echo '</ul>
               </div><!-- /.box-body -->';

		 echo ' <div class="box-footer clearfix no-border">';

         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;

    echo ' <button class="btn btn-default pull-right" id="addtodo" onclick="WIDashboard.showAddTodoModal();"><i class="fa fa-plus"></i> Add item</button>
                                </div>';
    echo '</div>';


	}



	


    public function completetodo($id)
    {
/*    	$sql = "UPDATE  `wi_admin_todo_list` SET  `completed` =  'y' WHERE  `wi_admin_todo_list`.`id` =id";

    	$query = $this->WIdb->prepare($sql);
    	$query->bindParam(':id', $id, PDO::PARAM_INT);
    	$query->execute();*/

        $completed = "y";

        $this->WIdb->update(
                    'wi_admin_todo_list',
                     array(
                         "completed" => $completed
                     ),
                     "`id` = :id",
                     array("id" => $id)
                );
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
/*                $query = $this->WIdb->prepare('SELECT * FROM `wi_members` WHERE `user_id` =:value');
        $query->bindParam(':value', $userId, PDO::PARAM_INT);
        $query->execute();*/

            $result = $this->WIdb->select("SELECT * FROM `wi_members` WHERE `user_id` =:user_id", 
            array(
            "user_id" => $user_id
            )
        );
            //print_r($result);
            return $result[0]['username'];
       
    }


    public function Notifications()
    {
/*        $sql = "SELECT * FROM wi_notifications ORDER BY id DESC LIMIT 10";

        $query = $this->WIdb->prepare($sql);
        $query->execute();*/

        $result = $this->WIdb->select("SELECT * FROM wi_notifications ORDER BY id DESC LIMIT 10");

        echo '<ul id="nots">';
            foreach ($result as $key => $value) {
               $username = WIDashboard::NotificationUsername($value['user']);
                echo '<li> <a href="#">
                      <i class="fa fa-users text-aqua"></i> ' . $value['opperation'] . '
                    </a>
                  </li>';


            
            
        }

        echo '</ul>';
    }

        public function WINotifications()
    {
          if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;
        $onclick = "nextNotification";
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_notifications`");
        $rows = count($result);

        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        //echo "pages". $total_pages;
         //get starting position to fetch the records
        $current_page =$this->Pagin->currentPage-1;
        $page_position = (($page_number-1) * $item_per_page);
        $itemsPerPage = $this->Pagin->itemsPerPage;
        //$sql = "SELECT * FROM `wi_notifications` ORDER BY `id` ASC LIMIT :page, :item_per_page";
        $sql = "SELECT (*) FROM `wi_notifications` LIMIT " . $page_position ;
        $query = $this->WIdb->prepare($sql);
        /*$query->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);*/
        $query->execute();

        echo '<div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">Notifications</h3>
                                   
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="Notifications">';

        while($res = $query->fetchAll() )
        {

            foreach ($res as $key => $value) {
               // $completed =  $value['completed'];
                //print_r($value);
                     echo '<li> <a href="#">
                      <i class="fa fa-users text-aqua"></i> ' . $value['opperation'] . '
                    </a>
                  </li>';


                               
            }
            

        }

         echo '</ul>
               </div><!-- /.box-body -->';
               $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
         echo ' <div class="box-footer clearfix no-border">';

         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;

    echo ' <button class="btn btn-default pull-right" id="addtodo" onclick="WIDashboard.showAddTodoModal();"><i class="fa fa-plus"></i> Add item</button>
                                </div>';
    echo '</div>';


    }

    public function VisitorCount($country)
    {
        //echo $country;
/*     $sql = "SELECT * FROM `wi_visitors_log` WHERE `country`=:country";
     $query = $this->WIdb->prepare($sql);
     $query->bindParam(':country', $country, PDO::PARAM_STR);
     $query->execute();

     $result = $query->fetchAll(PDO::FETCH_ASSOC);*/

     $result = $this->WIdb->select("SELECT * FROM `wi_visitors_log` WHERE `country`=:country", 
            array(
            "country" => $country
            )
        );

     if( count($result) >0)
        {
            echo count($result);
        }else{
            echo "0";
        }

       
    }

        public function MapCount($country)
    {
        //echo $country;
     $result = $this->WIdb->select("SELECT * FROM `wi_visitors_log` WHERE `country`=:country", array(
                       "country" => $country
                     ));
     if( count($result) >0)
        {
            return count($result);
        }else{
            return "0";
        }

       
    }

    public function Visitors_ip()
    {
/*         $sql = "SELECT * FROM `wi_visitors_log` ORDER BY ip";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
        
        $res = $query->fetchAll(PDO::FETCH_ASSOC);*/

        $result = $this->WIdb->select("SELECT * FROM `wi_visitors_log` ORDER BY ip");
          foreach ($result as $key) {
            //print_r($key);

            $Ip = $key['ip'];
            echo count($Ip);
              return $Ip ;   
        }  
        
    }




    public function Visitors()
    {
        //$ip = $this->Visitors_ip();
/*        $sql = "SELECT * FROM `wi_track` group by country";
        
        $query = $this->WIdb->prepare($sql);
        //$query->bindParam(':ip', $ip, PDO::PARAM_STR);
        $query->execute();*/

        $result = $this->WIdb->select("SELECT * FROM `wi_track` group by country");
            //print_r($res);
           // $country = $res['country'];
            foreach ($result as $key) {
            //print_r($key);
            //$Ip = $key['ip'];
                echo ' <tr>
            <td>' . $key['country'] . '</td>
        <td><div id="sparkline-1">';$this->VisitorCount($key['country']); echo '</div></td>
            <td>0</td>
            <td></td>
            </tr>';        
         
        }

    }
        //print_r($res);

        public function BounceRate()
        {
            //bounce rate
            //Bounce Rate = (Visits With Only 1 Pageview) / (Total Visits)
            $result = $this->WIdb->select("SELECT * FROM `wi_visitors_log`");
            $counter = "0";
            foreach ($result as $res ) {
                //var_dump($res);
                $ip = $res["ip"];
                $page = $res["page"];


            }
            
            $total_view = count($result);
            $bouce = $counter / $total_view;

            if(count($bouce) > 1){
                return $bouce;
            }else{
                return "0";
            }
            

        }

        public function UniqueVisit()
        {
            $result = $this->WIdb->select("SELECT * FROM `wi_track`");
            $viewers = count($result);

            

            if(count($viewers) > 1){
                return $viewers;
            }else{
                return "0";
            }
        }


        public function Map_visitors()
    {
         $result = $this->WIdb->select("SELECT * FROM `wi_track` group by country");

        
         $values = array();
         $values[] = array('Country', 'Popularity',);

            foreach ($result as $key) {
                 $values[]=array($key["country"] ,  $this->MapCount($key["country"])  );
            }
        echo json_encode($values);

    }


    public function get_server_load()
{

    $serverload = array();

    // DIRECTORY_SEPARATOR checks if running windows
    if(DIRECTORY_SEPARATOR != '\\')
    {
        if(function_exists("sys_getloadavg"))
        {
            // sys_getloadavg() will return an array with [0] being load within the last minute.
            $serverload = sys_getloadavg();
            $serverload[0] = round($serverload[0], 4);
        }
        else if(@file_exists("/proc/loadavg") && $load = @file_get_contents("/proc/loadavg"))
        {
            $serverload = explode(" ", $load);
            $serverload[0] = round($serverload[0], 4);
        }
        if(!is_numeric($serverload[0]))
        {
            if(@ini_get('safe_mode') == 'On')
            {
                return "Unknown";
            }

            // Suhosin likes to throw a warning if exec is disabled then die - weird
            if($func_blacklist = @ini_get('suhosin.executor.func.blacklist'))
            {
                if(strpos(",".$func_blacklist.",", 'exec') !== false)
                {
                    return "Unknown";
                }
            }
            // PHP disabled functions?
            if($func_blacklist = @ini_get('disable_functions'))
            {
                if(strpos(",".$func_blacklist.",", 'exec') !== false)
                {
                    return "Unknown";
                }
            }

            $load = @exec("uptime");
            $load = explode("load average: ", $load);
            $serverload = explode(",", $load[1]);
            if(!is_array($serverload))
            {
                return "Unknown";
            }
        }
    }
    else
    {
        return "Unknown";
    }

    $returnload = trim($serverload[0]);

    return $returnload;
}



}
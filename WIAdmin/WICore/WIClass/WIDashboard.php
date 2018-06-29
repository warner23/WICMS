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
        $this->email = new WIEmail();
	}


    public function Info_Boxes()
    {
        $sql = "SELECT * FROM `wi_admin_info_box`";

        $query = $this->WIdb->prepare($sql);
        $query->execute();

        $result = $query->fetchAll();
        //print_r($result);
        //echo $result;
        foreach ($result as $box) {
            echo ' <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
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

		 $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages);
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
    	$sql = "UPDATE  `wi_admin_todo_list` SET  `completed` =  'y' WHERE  `wi_admin_todo_list`.`id` =id";

    	$query = $this->WIdb->prepare($sql);
    	$query->bindParam(':id', $id, PDO::PARAM_INT);
    	$query->execute();
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
                $query = $this->WIdb->prepare('SELECT * FROM `wi_members` WHERE `user_id` =:value ');
        $query->bindParam(':value', $userId, PDO::PARAM_INT);
        $query->execute();
        while ($result = $query->fetchAll(PDO::FETCH_ASSOC) ) {
            //print_r($result);
            return $result[0]['username'];
       }
    }


    public function Notifications()
    {
        $sql = "SELECT * FROM wi_notifications ORDER BY id DESC LIMIT 10";

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
               $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages);
         echo ' <div class="box-footer clearfix no-border">';

         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;

    echo ' <button class="btn btn-default pull-right" id="addtodo" onclick="WIDashboard.showAddTodoModal();"><i class="fa fa-plus"></i> Add item</button>
                                </div>';
    echo '</div>';


    }


        public function UniqueVisitors()
    {
        //echo "unique";
     $sql = "SELECT `id` FROM `wi_track`";
     $query = $this->WIdb->prepare($sql);
     $query->execute();

     $result = $query->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
        echo count($result);
    }

    public function VisitorCount($country)
    {

     $sql = "SELECT * FROM `wi_visitors_log` WHERE `country`=:country";
     $query = $this->WIdb->prepare($sql);
     $query->bindParam(':country', $country, PDO::PARAM_STR);
     $query->execute();

     $result = $query->fetchAll(PDO::FETCH_ASSOC);

        //print_r($result);
        echo count($result);
    }

    public function Visitors_ip()
    {
         $sql = "SELECT * FROM `wi_visitors_log` ORDER BY ip";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
        
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

          foreach ($res as $key) {
            //print_r($key);

            $Ip = $key['ip'];
            echo count($Ip);
              return $Ip ;   
        }  
        
    }

    public function Visitors()
    {
        //$ip = $this->Visitors_ip();
        $sql = "SELECT * FROM `wi_track` group by country";
        
        $query = $this->WIdb->prepare($sql);
        //$query->bindParam(':ip', $ip, PDO::PARAM_STR);
        $query->execute();


        while($res = $query->fetchAll(PDO::FETCH_ASSOC)){
            //print_r($res);
           // $country = $res['country'];
            foreach ($res as $key) {
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

        
        

    }

            public function VisitorsMap()
    {
        //$ip = $this->Visitors_ip();
        $sql = "SELECT * FROM `wi_track` group by country";
        
        $query = $this->WIdb->prepare($sql);
        //$query->bindParam(':ip', $ip, PDO::PARAM_STR);
        $query->execute();
        echo "['Country', 'Visitors'],";

        while($res = $query->fetchAll(PDO::FETCH_ASSOC)){
            //print_r($res);
           // $country = $res['country'];
            foreach ($res as $key) {
            //print_r($key);['Country', 'Visitors'],
            //$Ip = $key['ip'];
                echo "['" . $key['country'] . "', '";$this->VisitorCount($key['country']); echo "']";        
        }  
        }
        //print_r($res);
        

    }


    public function Send_Mail($settings)
    {
        $email = $settings['UserData'];
        $emailTo = $email['emailto'];
        $subject = $email['subject'];
        $mess = $email['Message'];
        //echo $mess;
        $this->email->sendEmail($emailTo, $subject, $mess);
        $result = array(
            "status" => "completed",
            "msg" => "Successfully sent message."
        );
        echo json_encode($result);
    }





}
<?php

/**
* 
*/
class listings 
{
	

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();
		$this->login = new WILogin();
		$this->list = new WIListings();
		//$this->page = new WIPage();
	}

		public function editMod()
	{
		echo '<div id="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>
';

echo '<style type="text/css">
	
.content {
    padding: 32px 0;
    position: relative;
    margin-top: 58px;
}

.text-left{
	text-align: center;
}

.show{
  display: block;
}

.hide{
  display: none;
}

</style>



<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-md-2 col sm-2 col-xs-2 col-lg-4 sidenav">

    </div>
	<div class="col-lg-4 col-md-8 col-sm-8">
	
<div class="panel-heading">Topics</div>
<?php 

if(!$login->isLoggedIn()){
?>
  <div class="col-lg-4 col-md-8 col-sm-8">


<button>Click the tab above to register/login</button>

  </div>

<?php
}else{
  $topic->topic(); 
}


?>

</div>

					</div>
					

					    <div class="col-md-2 col sm-2 col-xs-2 col-lg-4 sidenav">

    </div>
    
				</div>
			</div>

      <!-- add info modal -->
  <div class="modal hide" id="votingModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WITopic.close();" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form" enctype="multipart/form-data" method="POST"> 
                     <div class="col-md-12 body-info">
                     <div class="panel-body">


                     </div>
                     </div>
                     
                  </form>
                </div>

                <div class="modal-footer">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
<script type="text/javascript" src="WICore/WIJ/WITopic.js"></script>
';
	}

	public function editPageContent($page_id)
	{
		// include_once '../../WIInc/WI_StartUp.php';
		 echo '<style type="text/css">
	
		.content {
		    padding: 32px 0;
		    position: relative;
		    margin-top: 58px;
		}

		.text-left{
			text-align: center;
		}

		</style>

		<div class="container-fluid text-center" id="col"> ';  

		  $lsc = $this->page->GetColums($page_id, "left_sidebar");
		  $rsc = $this->page->GetColums($page_id, "right_sidebar");
		if ($lsc > 0) {

			  echo '<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">';
		 $this->mod->getMod("left_sidebar");  

		    echo '</div>
		    <div class=" col-lg-10 col-md-8 col-sm-8 block" id="block">
		    <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
		}

		if ($lsc && $rsc > 0) {
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';
		}else if($rsc > 0){
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';

		 }else{
		echo '<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">';
		}

			echo '<div class="col-lg-12 col-md-12 col-sm-12" >

						 <div class="col-lg-12 col-md-12 col-sm-12 text-left"> 
							<div class="intro_box">
<h1>' .WILang::get("welcome_") . '<span>'. $this->site->Website_Info('site_name') . '</span></h1>
							<p>' . WILang::get("main_title") . '</p>
							</div>
						</div>
					</div>
				
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-laptop"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("community") . '</h3>
								<p>' . WILang::get("learn") . '
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="services">
							<div class="icon">
								<i class="fa fa-trophy"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("software") . '</h3>
								<p>' .WILang::get("software") . '
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-cogs"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("it") . '</h3>
								<p>' . WILang::get("it_title")  . '
</p>
							</div>
						</div>
					</div>
					</div>
					


    
				</div>
			</div>';
							

		  
		if ($rsc > 0) {

			  echo '</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">';
		  $this->mod->getMod("right_sidebar");  

		    echo '</div></div>';
		}

		echo '</div>
			</div>';
 

	}

	public function mod_name($module, $page)
	{
		echo '<style>
    .center{
          margin-left: 14%;
    }
    </style><div class="container-fluid text-center">    
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">';

    if(isset($page)){
    $left_sidePower = $this->Web->pageModPower($page, "left_sidebar");
    $leftSideBar = $this->Web->PageMod($page, "left_sidebar");
    //echo $Panel;
    if ($left_sidePower > 0) {
      $this->mod->getMod($leftSideBar);
      echo '<div class="col-lg-8 col-md-8 col-sm-8 alogin">';
    }else{
      echo '<div class="col-lg-8 col-md-8 col-sm-8 center">';
    }

    }

		echo '<style type="text/css">
	
.contents {
    padding: 32px 0;
    position: relative;
    margin-top: 58px;
}

.text-left{
	text-align: center;
}

.show{
  display: block;
}

.hide{
  display: none;
}

.sidenav {
background-color: #f1f1f100;
padding-top: 20px;
height: 100%;
    }


.topic{
    padding: 12px;
    border: 2px solid black;
    text-align: -webkit-center;
    width: 60%;
    margin-left: 153px;
}

.form-debate{
      width: 16%;
    margin-left: 63px;
}

.topicVote{
    /* padding: 12px; */
    border: 2px solid black;
    text-align: -webkit-center;
    width: 69%;
    margin-left: -8px;
}

.voteother{
      width: 86%;
    height: 111px;
    margin-left: 162px;
    /* margin-right: -38px; */
    /* background-color: white; */
    margin-top: 142px;
}

.listing{
list-style: none;
margin-left: 55px;
height: 35px;
width: 93%;
}

.btn-prim{
    float: left;
    margin-right: -137px;
}

/* Pagination style */


.pagination li.first.active {
   border-radius: 5px 0px 0px 5px;
margin-left: -19px;
float: left;
margin-top: 5px;
}
.pagination li.last {
    border-radius: 0px 5px 5px 0px;
}

.hide{
	display:none;
}

#debate_txt{
	font-size: x-large;
    color: brown;
}


@media (min-width: 780){
.listing{
    list-style: none;
    margin-left: 377px;
    height: 35px;
    width: 28%;
}
  }
@media (min-width: 1200px){
.listing{
    list-style: none;
    margin-left: 377px;
    height: 35px;
    width: 28%;
}
  }

</style>

<p id="date" class="hide"></p>
<div id="clock" class="hide">
  <p class="unit" id="time"></p>

</div>
    
<div class="col-md-12 col sm-8 col-lg-8">
<div class="col-md-4 col sm-4 col-xs-4 col-lg-10">
<div class="panel-heading">Debate listings</div>
</div>

<div id="DebateList">';
 $this->list->listings(WISession::get('user_id'), WISession::get('id_vote'), 'vote'); 
echo '</div>
      
<div id="debate_txt"></div>
</div>
					   
			</div>

    <div class="modal" id="modal-debate-request" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="' .WISession::get('user_id') . '">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    ' .WILang::get('debate_request') . '
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    User X has requested a debate
                </div>
                <div class="modal-footer">
                  <a href="javascript:void(0);" onclick="WIDebate.Cancel()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                    ' .WILang::get('cancel') . '
                  </a>
                  <a href="javascript:void(0);" onclick="WIDebate.Accept()" class="btn btn-primary" id="change-role-button" data-dismiss="modal" aria-hidden="true">
                      ' .WILang::get('ok') . '
                  </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


<script type="text/javascript" src="WICore/WIJ/WIListings.js"></script>

<script type="text/javascript" src="WICore/WIJ/WIDebate.js"></script>
';

		if(isset($page)){			
		$right_sidePower = $this->Web->pageModPower($page, "right_sidebar");
		$rightSideBar = $this->Web->PageMod($page, "right_sidebar");
		//echo $Panel;
		if ($right_sidePower > 0) {

			$this->mod->getMod($rightSideBar);
		}	
		}					
					

	echo '</div>
			</div></div>';
	}


}
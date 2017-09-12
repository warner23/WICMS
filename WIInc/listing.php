<style type="text/css">
	
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



<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-md-2 col sm-2 col-xs-2 col-lg-2 sidenav">

    </div>
<div class="col-md-8 col sm-8 col-lg-8">
<div class="col-md-4 col sm-4 col-xs-4 col-lg-10">
<div class="panel-heading">Debate listings</div>
</div>

<div id="DebateList">
 <!--  <?php $list->listings(WISession::get('user_id'), WISession::get('id_vote'), 'vote');  ?> -->
</div>
      
<div id="debate_txt"></div>
</div>
					    <div class="col-md-2 col-sm-2 col-lg-2 sidenav">

    </div>
    
				</div>
			</div>

    <div class="modal" id="modal-debate-request" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="<?php echo WISession::get('user_id');?>">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('debate_request'); ?>
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    User X has requested a debate
                </div>
                <div class="modal-footer">
                  <a href="javascript:void(0);" onclick="WIDebate.Cancel()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                    <?php echo WILang::get('cancel'); ?>
                  </a>
                  <a href="javascript:void(0);" onclick="WIDebate.Accept()" class="btn btn-primary" id="change-role-button" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('ok'); ?>
                  </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


<script type="text/javascript" src="WICore/WIJ/WIListings.js"></script>

<script type="text/javascript" src="WICore/WIJ/WIDebate.js"></script>

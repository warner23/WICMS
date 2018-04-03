 <style type="text/css">
   
   .contents{
  margin: 20px;
  padding: 20px;
  list-style: none;
  background: #F9F9F9;
  border: 1px solid #ddd;
  border-radius: 5px;
}
.contents li{
    margin-bottom: 10px;
}
.loading-div{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.56);
  z-index: 999;
  display:none;
}
.loading-div img {
  margin-top: 20%;
  margin-left: 50%;
}

/* Pagination style */
.pagination{margin:0;padding:0;}
.pagination li{
  display: inline;
  padding: 6px 10px 6px 10px;
  border: 1px solid #ddd;
  margin-right: -1px;
  font: 15px/20px Arial, Helvetica, sans-serif;
  background: #FFFFFF;
  box-shadow: inset 1px 1px 5px #F4F4F4;
}
.pagination li a{
    text-decoration:none;
    color: rgb(89, 141, 235);
}
.pagination li.first {
    border-radius: 5px 0px 0px 5px;
}
.pagination li.last {
    border-radius: 0px 5px 5px 0px;
}
.pagination li:hover{
  background: #CFF;
}
.pagination li.active{
  background: #F0F0F0;
  color: #333;
}
 </style>

 <form  class="form-horizontal trans-form" id="add-lang">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Add Translations</legend>
                        </div>

                        <div class="col-lg-12">
                        <div class="form-group">
                        <!-- Button -->
                        <div class="col-lg-3 col-sm-3 col-md-3">
                           <button id="add_trans_btn" onclick="WILang.AddTransModal()" class="btn btn-success" >Add</button> 
                        </div>
                      </div>
                      <div class="results" id="transresults"></div>

       
                        
                        </div>
                       <div id="trans"><!-- content will be loaded here --></div>  
                     <!-- <?php $web->viewTrans(); ?> -->
                 <div class="loading-div closed"><img src="WIMedia/Img/ajax-loader.gif" ></div>
                  

                    </fieldset>
                        <br /><br />
                  </form>

             <div class="modal off" id="modal-trans-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WILang.Close()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('edit_meta'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form">


                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="meta_name">
                          <?php echo WILang::get('meta_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_name" name="meta_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="meta_content">
                          <?php echo WILang::get('meta_content'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="meta_content" name="meta_content" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-password">
                          <?php echo WILang::get('meta_author'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-password" name="adduser-password" type="password" class="input-xlarge form-control" >
                        </div>
                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img src="WIMedia/Img/ajax_loader.gif" />
                <div class="center" id="results-lang"></div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WILang.Close()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);"  id="btn-add-user" class="btn btn-primary">
                      <?php echo WILang::get('add'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

        <div class="modal off" id="modal-trans-add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WILang.Closed()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('add_trans'); ?>
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add_trans">

                    
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="lang_name">
                          <?php echo WILang::get('trans_lang'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="lang_name" name="lang_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="keyword">
                          <?php echo WILang::get('lang_keyword'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="keyword" name="keyword" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="translation">
                          <?php echo WILang::get('lang_trans'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="translation" name="translation" type="text" class="input-xlarge form-control" >
                        </div>                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" />
<div class="center" id="results-lang"></div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WILang.Closed()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);"  id="btn-trans" onclick="WILang.AddTrans()" class="btn btn-primary">
                      <?php echo WILang::get('add'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
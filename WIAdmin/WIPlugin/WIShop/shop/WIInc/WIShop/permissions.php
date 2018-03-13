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

 <form  class="form-horizontal database-form" id="meta">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Add Translations</legend>
                        </div>

                        <div class="col-lg-12">
                        <div class="control-group form-group">
                        <!-- Button -->
                        <div class="col-lg-3 col-sm-3 col-md-3">
                           <button id="add_trans_btn" onclick="WILang.AddTransModal()" class="btn btn-success" >Add</button> 
                        </div>
                      </div>
                      <div class="results" id="results"></div>

       
                        
                        </div>
                       <div id="trans"><!-- content will be loaded here --></div>  
                     <!-- <?php $web->viewTrans(); ?> -->
                 <div class="loading-div closed"><img src="WIMedia/Img/ajax-loader.gif" ></div>
                  

                    </fieldset>
                        <br /><br />
                  </form>

             
      
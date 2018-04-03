   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
  //  $( "input" ).checkboxradio();
  } );
  </script>
 <form  class="form-horizontal" id="lang-form">
                        <fieldset>
                          <div id="legend">
                        <label>Multi Language</label>
                    <div class="btn-group" id="language" data-toggle="buttons-radio">
                        <input type="hidden" name="multilanguage" id="multilanguage" class="btn-group-value" value="<?php echo $site->Website_Info('multi_lang')?>"/>
                        <button type="button" id="multilanguage_true" name="multilanguage" value="on"  class="btn">yes</button>
                        <button type="button" id="multilanguage_false" name="multilanguage" value="off" class="btn btn-danger activewhens" >No</button>
                    </div>

                    <span class="help-block">Select <strong>Yes</strong> to switch on multilanguage options</span>
                    
                  

                   <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="multilanguage_btn" class="btn btn-success" onclick="WILang.changeLang();">Save</button> 
                        </div>
                      </div>
                      <div class="results" id="mlresults"></div>
                        </fieldset>
                      </form>

                       <script type="text/javascript">
                       var multi_lang = $("#multilanguage").attr('value');
                       if (multi_lang === "off"){
                        $("#multilanguage_true").removeClass('btn-success active')
                        $("#multilanguage_false").addClass('btn-danger active');
                       }else if (multi_lang === "on"){
                        $("#multilanguage_false").removeClass('btn-danger active')
                        $("#multilanguage_true").addClass('btn-success active');
                       }

                      
                   
                      </script>


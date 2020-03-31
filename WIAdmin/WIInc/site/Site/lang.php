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
                        <label class="center">Multi Language</label>
                    <div class="btn-group" id="language" data-toggle="buttons-radio">
                        <input type="hidden" name="multilanguage" id="multilanguage" class="btn-group-value" value="<?php echo $site->Website_Info('multi_lang')?>"/>
                          <label class="switch">
                        <input type="checkbox" id="multilang" checked>
                        <span class="slider round" id="login">ON</span>
                        
                      </label>
                    </div>
                    

                    <span class="help-block">Select <strong>Yes</strong> to switch on multilanguage options</span>
                    
                   <div id="lang-wrapper">
                      <fieldset>
                    <legend>Select Site Translator </legend>
                    <label for="google-trans">Google translate</label>
                    <input type="radio" name="trans" id="google">
                    <label for="wi-trans">WI translate</label>
                    <input type="radio" name="trans" id="wilang">
                  </fieldset>
                   <span class="help-block">Select <strong>google trans, if you do not want to set up your own lang translations</strong></span>
                    </div>


                   <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-10 col-lg-2">
                           <button id="multilanguage_btn" class="btn btn-success" onclick="WILang.changeLang();">Save</button> 
                        </div>
                      </div>
                      <div class="results" id="mlresults"></div>
                        </fieldset>
                      </form>

                       <script type="text/javascript">
                       var multi_lang = $("#multilanguage").attr('value');
                       if (multi_lang === "off"){
                       $("#verify").prop("checked", false);
                       }else if (multi_lang === "on"){
                        $("#verify").prop("checked", true);
                       }

                        var mailer  = "<?php echo $site->Website_Info('multi_lang'); ?>";
                          //alert(mailer);

                        if( mailer === "on"){
                          $("#lang-wrapper").css("display", "block");
                        }else{
                           $("#lang-wrapper").css("display", "none");
                           
                        }
                       
                      $('#multilanguage_true').on('click', function() {
                          //alert( this.value );

                          $("#lang-wrapper").css("display", "block");
                       
                        })

                      $('#multilanguage_false').on('click', function() {
                          //alert( this.value );

                          $("#lang-wrapper").css("display", "none");
                       
                        })

                        var trans  = "<?php echo $site->Website_Info('lang_choice');?>";

                        if(trans === "google")
                        {
                          $("#google"). prop("checked", true);
                        } else
                        {
                          $("#wilang"). prop("checked", true);
                        }

                   
                      </script>


<style> 

#lang-wrapper{
  width: 60%;
}


</style>
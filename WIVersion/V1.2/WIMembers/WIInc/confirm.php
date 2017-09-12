<?php
if(isset($_GET['k']))
{
	$key = $_GET['k'];
}
?>


<div class="container">
            <div class="modal" id="confirm-modal">
                <div class="modal-dialog" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><?php echo WEBSITE_NAME; ?></h3>
                        </div>
                        <div class="modal-body">
                            <div class="well">
                                <?php

                                $result = $WIdb->selectAll(
                                        "SELECT * FROM `WI_Members`
                                         WHERE `confirmation_key` = :k", array("k" => $key)
                                );
                                if (count($result) == 1) {
                                    $WIdb->update(
                                            'WI_Members', array("confirmed" => "Y"), "`confirmation_key` = :k", array("k" => $key)
                                    );
                                   

                                    echo "<h4 class='text-success'>". WILang::get('email_confirmed') .".</h4>";
                                    echo "<h5 class='text-success'>". WILang::get('you_can_login_now', array( 'link' => 'index.php') ) ."</h5>";
                                }
                                else
                                    echo "<h5 class='text-error'>". WILang::get('user_with_key_doesnt_exist') ."</h5>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

              <script type="text/javascript">
                $(document).ready(function () {
                   $("#confirm-modal").modal({
                       keyboard: false,
                       backdrop: "static"
                   }); 
                });
            </script>
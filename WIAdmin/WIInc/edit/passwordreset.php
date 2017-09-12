<?php include_once 'WIInc/WI_StartUp.php';   
?>
        <div class="container">
            <div class="modal modal-visible" id="password-reset-modal">
                <div class="modal-dialog" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><?= WEBSITE_NAME; ?></h3>
                        </div>
                        <div class="modal-body">
                            <div class="well">
                                    <form class="form-horizontal" id="password-reset-form">
                                        <fieldset>
                                            <div id="legend">
                                                <legend class=""><?= WILang::get('password_reset'); ?></legend>
                                            </div>

                                            <div class="control-group form-group">
                                                <label class="control-label col-lg-4"  for="login-username">
                                                    <?= WILang::get('new_password'); ?>
                                                </label>
                                                <div class="controls col-lg-8">
                                                    <input type="password" id="password-reset-new-password"
                                                           class="input-xlarge form-control" />
                                                </div>
                                            </div>

                                            <div class="control-group form-group">
                                                <div class="controls col-lg-offset-4 col-lg-8">
                                                    <button id="btn-reset-pass" class="btn btn-success">
                                                        <?= WILang::get('reset_password'); ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <h5 class="text-error text-center"><?= WILang::get('invalid_password_reset_key') ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<style type="text/css">
  .hide{
    display: none;
  }

  .show{
    display: block;
  }
</style>

          <div class="span9 users-wrapper">
              <a class="btn btn-primary" href="javascript:void(0);" 
                  onclick="WIAdmin.showAddUserModal()" > 
                  <i class="icon-user icon-white glyphicon glyphicon-user"></i>
                  <?php echo WILang::get('add_user'); ?>
              </a>
             <!-- <?php  //$user_role 3 => admin ?> -->
              <?php $admins = $WIdb->select("SELECT * FROM `wi_members` WHERE `user_role` > 3 ORDER BY `register_date` DESC"); ?>
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped users-table" id="users-list" width="100%">
                  <thead>
                  <th><?php echo WILang::get('username'); ?></th>
                  <th><?php echo WILang::get('email'); ?></th>
                  <th><?php echo WILang::get('register_date'); ?></th>
<!--                  <th>--><?php //echo WILang::get('last_login'); ?><!--</th>-->
                  <th><?php echo WILang::get('confirmed'); ?></th>
                  <th><?php echo WILang::get('action'); ?></th>
                  </thead>
                  <?php foreach ($admins as $admin): ?>
                      <?php $tmpUser = new WIAdmin($admin['user_id']); ?>
                      <?php $userRole = $tmpUser->getRole(); ?>
                      <tr class="user-row">
                          <td><?php echo e($admin['username']); ?></td>
                          <td><?php echo e($admin['email']); ?></td>
                          <td><?php echo $admin['register_date']; ?></td>
<!--                          <td>--><?php //echo $user['last_login']; ?><!--</td>-->
                          <td>
                              <?php echo $admin['confirmed'] == "Y"
                                  ? "<p class='text-success'>" . WILang::get('yes') . "</p>"
                                  : "<p class='text-error'>" . WILang::get('no') . "</p>"
                              ?>
                          </td>
                          <td>
                              <div class="btn-group">
                                  <a  class="btn <?php echo $admin['banned'] == 'Y' ? 'btn-danger' : 'btn-primary'; ?> btn-user"
                                      href="javascript:void(0);"
                                      onclick="WIAdmin.roleChanger(this,<?php echo $admin['user_id'];  ?>);">

                                      <i class="icon-user icon-white glyphicon glyphicon-user"></i>
                                      <span class="user-role"><?php echo ucfirst($userRole); ?></span>
                                  </a>
                                  <a class="btn <?php echo $admin['banned'] == 'Y' ? 'btn-danger' : 'btn-primary'; ?> dropdown-toggle" data-toggle="dropdown" href="#">
                                      <span class="caret"></span>
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li>
                                          <a href="javascript:void(0);"
                                             onclick="WIAdmin.editUser(<?php echo $admin['user_id']; ?>);">
                                              <i class="icon-edit glyphicon glyphicon-edit"></i>
                                              <?php echo WILang::get('edit'); ?>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:void(0);"
                                             onclick="WIAdmin.displayInfo(<?php echo $admin['user_id']; ?>);">
                                              <i class="icon-pencil glyphicon glyphicon-pencil"></i>
                                              <?php echo WILang::get('details'); ?>
                                          </a>
                                      </li>

                                      <?php if ( $admin['banned'] == 'Y' ): ?>
                                          <li>
                                              <a href="javascript:void(0);"
                                                 onclick="WIAdmin.unbanUser(this,<?php echo $admin['user_id'];  ?>);">
                                                  <i class="icon-ban-circle glyphicon glyphicon-ban-circle"></i>
                                                  <span><?php echo WILang::get('unban'); ?></span>
                                              </a>
                                          </li>
                                      <?php else: ?>
                                          <li>
                                         
                                              <a href="javascript:void(0);"
                                                 onclick="WIAdmin.banUser(this,<?php echo $admin['user_id']; ?>);">
                                                  <i class="icon-ban-circle glyphicon glyphicon-ban-circle"></i>
                                                  <span><?php echo WILang::get('ban'); ?></span>
                                              </a>
                                          </li>
                                      <?php endif; ?>

                                      <li>
                                            
                                          <a href="javascript:void(0);"
                                             onclick="WIAdmin.deleteUser(this,<?php echo $admin['user_id'];  ?>);">
                                              <i class="icon-trash glyphicon glyphicon-trash"></i>
                                              <?php echo WILang::get('delete'); ?>
                                          </a>
                                      </li>

                                      <li class="divider"></li>

                                      <li>
                                          <a href="javascript:void(0);"
                                             onclick="WIAdmin.roleChanger(this,<?php echo $admin['user_id'];  ?>);">
                                              <i class="i"></i> <?php echo WILang::get('change_role'); ?></a>
                                      </li>
                                  </ul>
                              </div>
                          </td>
                      </tr>
                  <?php endforeach; ?>
              </table>
          </div>
        </div>
    
   
        
        <div class="modal" id="modal-user-details" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('loading'); ?>
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                  <dl class="dl-horizontal">
                    <dt title="<?php echo WILang::get('email'); ?>"><?php echo WILang::get('email'); ?></dt>
                    <dd id="modal-email"></dd>
                    <dt title="<?php echo WILang::get('first_name'); ?>"><?php echo WILang::get('first_name'); ?></dt>
                    <dd id="modal-first-name"></dd>
                    <dt title="<?php echo WILang::get('last_name'); ?>"><?php echo WILang::get('last_name'); ?></dt>
                    <dd id="modal-last-name"></dd>
                    <dt title="<?php echo WILang::get('address'); ?>"><?php echo WILang::get('address'); ?></dt>
                    <dd id="modal-address"></dd>
                    <dt title="<?php echo WILang::get('phone'); ?>"><?php echo WILang::get('phone'); ?></dt>
                    <dd id="modal-phone"></dd>
                    <dt title="<?php echo WILang::get('last_login'); ?>"><?php echo WILang::get('last_login'); ?></dt>
                    <dd id="modal-last-login"></dd>
                  </dl>
                </div>
                  <div align="center" id="ajax-loading"><img src="<?php echo $WI['theme_dir'] ?><?php echo $WI['img_admin'] ?>ajax_loader.gif" /></div>
                <div class="modal-footer">
                  <a href="javascript:void(0);" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                    <?php echo WILang::get('ok'); ?>
                  </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

           <div class="modal hide" id="modal-change-role">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('pick_user_role'); ?>
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <?php $roles = $WIdb->select("SELECT * FROM `wi_user_roles` WHERE `role_id` > '3'"); ?>
                    <?php if(count($roles) > 0): ?>
                      <p><?php echo WILang::get('select_role'); ?>:</p>
                      <select id="select-user-role" class="form-control" style="width: 100%;">
                      <?php foreach($roles as $role): ?>
                          <option value="<?php echo $role['role_id']; ?>">
                            <?php echo e(ucfirst($role['role'])); ?>
                          </option>
                      <?php endforeach; ?>
                      </select>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                  <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                    <?php echo WILang::get('cancel'); ?>
                  </a>
                  <a href="javascript:void(0);" class="btn btn-primary" id="change-role-button" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('ok'); ?>
                  </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->



          <div class="modal" id="modal-add-edit-user" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('add_user'); ?>
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form">
                      <input type="hidden" id="adduser-userId" />
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-email">
                          <?php echo WILang::get('email'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-email" name="adduser-email" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-username">
                          <?php echo WILang::get('username'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-username" name="adduser-username" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-password">
                          <?php echo WILang::get('password'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-password" name="adduser-password" type="password" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-confirm_password">
                          <?php echo WILang::get('repeat_password'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-confirm_password" name="adduser-confirm_password" type="password" class="input-xlarge form-control" >
                        </div>
                      </div>
                      <hr>
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-first_name">
                          <?php echo WILang::get('first_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-first_name" name="adduser-first_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-last_name">
                          <?php echo WILang::get('last_name'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-last_name" name="adduser-last_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-address">
                          <?php echo WILang::get('address'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-address" name="adduser-address" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="adduser-phone">
                          <?php echo WILang::get('phone'); ?>
                        </label>
                        <div class="controls col-lg-9">
                          <input id="adduser-phone" name="adduser-phone" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                  </form>
                </div>
                <div align="center" class="ajax-loading"><img src="<?php echo $WI['theme_dir'] ?><?php echo $WI['img_admin'] ?>ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      <?php echo WILang::get('cancel'); ?>
                    </a>
                    <a href="javascript:void(0);" id="btn-add-user" class="btn btn-primary">
                      <?php echo WILang::get('add'); ?>
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

        
        
        <script type="text/javascript" src="WICore/WIJ/sha512.js"></script>
        <script src="WICore/WIJ/WICore.js" type="text/javascript" charset="utf-8"></script>
        <script src="WICore/WIJ/WIAdmin.js" type="text/javascript" charset="utf-8"></script>
       
<script type="text/javascript">
    $(document).ready(function() {
     //   $('#users-list').dataTable();
    } );
</script>
  </body>
</html>
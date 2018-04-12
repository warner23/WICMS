<style type="text/css">
  .right{
    margin-left: 23%;
  }
</style>
              <div class="col-md-8 right">
                  <div class="roles-input">
                    <div class="controls col-lg-3">
                      <input type="text" class="form-control col-lg-3" id='role-name' placeholder="<?php echo WILang::get('role_name'); ?>">
                    </div>
                    <button type="submit" class="btn btn-success" onclick="roles.addRole();">
                      <?php echo WILang::get('add'); ?>
                    </button>
              </div>
        <?php $roles = $WIdb->select("SELECT * FROM `wi_user_roles` WHERE `role_id` NOT IN (2,3)"); ?>
              <table class="table table-striped roles-table">
                  <thead>
                      <th><?php echo WILang::get('role_name'); ?></th>
                      <th><?php echo WILang::get('users_with_role'); ?></th>
                      <th><?php echo WILang::get('action'); ?></th>
                  </thead>
              <?php foreach ($roles as $role): ?>
                  <?php $result = $WIdb->select("SELECT COUNT(*) AS num FROM `wi_members` WHERE `user_role` = :r", array( "r" => $role['role_id'])); ?>
                  <?php $usersWithThisRole = $result[0]['num']; ?>
                  <tr class="role-row">
                    <td><?php echo e($role['role']); ?></td>
                    <td><?php echo e($usersWithThisRole); ?></td>
                    <td>
                      <button type="button" class="btn btn-danger btn-sm" onclick="roles.deleteRole(this,<?php echo $role['role_id']; ?>);">
                        <i class="icon-trash glyphicon glyphicon-trash"></i>
                            <?php echo WILang::get('delete'); ?>
                      </button>
                    </td>
                    
                  </tr>
              <?php endforeach; ?>
              </table>
          </div>

    
 

    <script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WICore/WIJ/role.js"></script>

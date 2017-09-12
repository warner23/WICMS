
/** USERS NAMESPACE
 ======================================== */

var users = {};

users.addEditData = {
    username      : $("#adduser-username"),
    email         : $("#adduser-email"),
    firstName     : $("#adduser-first_name"),
    lastName      : $("#adduser-last_name"),
    address       : $("#adduser-address"),
    phone         : $("#adduser-phone"),
    password      : $("#adduser-password"),
    conf_password : $("#adduser-confirm_password"),
    button        : $("#btn-add-user")
};

users.displayInfo = function (userId) {
jQuery.noConflict();

    var username    = $("#modal-username"),
        email       = $("#modal-email"),
        firstName   = $("#modal-first-name"),
        lastName    = $("#modal-last-name"),
        address     = $("#modal-address"),
        phone       = $("#modal-phone"),
        last_login  = $("#modal-last-login"),
        ajaxLoading = $("#ajax-loading"),
        detailsBody = $("#details-body"),
        modal       = $("#modal-user-details");

   //display modal
   //modal.modal('show');
   $("#modal-user-details").removeClass('hide');
 $("#modal-user-details").addClass('show');


   // set username (title of modal window) to loading...
   username.text($_lang.loading);
   
   //display ajax loading gif
   ajaxLoading.show();
   
   //hide details body
   detailsBody.hide();
   
   $.ajax({
       url: "WICore/WIClass/WIAjax.php",
       type: "POST",
       data: {
           action: "getUserDetails",
           userId: userId
       },
       success: function (result) {
           //parse result as JSON
           var res = JSON.parse(result);
           //console.log(res);
           //update modal fields
           username .text(res.username);
           email    .text(res.email);
           firstName.text(res.first_name);
           lastName .text(res.last_name);
           address  .text(res.address);
           phone    .text(res.phone);
           last_login.text(res.last_login);

           //hide ajax loading
           ajaxLoading.hide();
           
           //display user info
           detailsBody.show();
       }
   });
   


};


/**
 * Deletes an user.
 * @param {object} element Clicked DOM element.
 * @param {int} userId Id of user that will be deleted.
 */
users.deleteUser = function (element, userId) {
        //get whole user row that will be deleted
    var userRow = $(element).parents(".user-row");
        
        //ask admin to confirm that he want to delete this user
    var c = confirm($_lang.are_you_sure);
    if(c) {
                //confimed
                
                //send data to server
        $.ajax({
            type: "POST",
            url: "WICore/WIClass/WIAjax.php",
            data: {
                action: "deleteUser",
                userId: userId
            },
            success: function (result) {
                  console.log(result);
                                
          //remove user row from table
                userRow.fadeOut(600, function () {
                     $(this).remove();
                });
            }
        });
    }
};


/**
 * Changes user's role.
 * @param {Object} Clicked DOM element.
 * @param {int} userId User ID.
 */
users.changeRole = function (element, role, userId) {
  //send data to server
    $.ajax({
        type: "POST",
        url: "WICore/WIClass/WIAjax.php",
        data: {
            action: "changeRole",
            userId: userId,
            role  : role
        },
        success: function (newRole) {
            //change button text
            element.text(newRole);
        }
    });
};


users.roleChanger = function (element, userId) {
    jQuery.noConflict();
   /* $("#modal-change-role").modal({
        keyboard: false,
        backdrop: "static",
        show: true
    });
    */
       $("#modal-change-role").removeClass('hide');
 $("#modal-change-role").addClass('show');

   //find elements needed for changing text
    var userRoleSpan = $(element).parents(".btn-group").find(".user-role");

    $("#change-role-button").unbind().bind('click', function () {
        var newRole = $("#select-user-role").val();
        users.changeRole(userRoleSpan, newRole, userId);
    });
};


users.showAddUserModal = function () {
    jQuery.noConflict();
    $("#modal-add-edit-user").removeClass('hide');
        $("#modal-add-edit-user").addClass('show');


    $("#modal-username").text($_lang.add_user);
    WICore.removeErrorMessages();

    $("#add-user-form input[type='text'], #add-user-form input[type='password']").each(function () {
        $(this).val('');
    });

    users.addEditData.button.attr('onclick', 'users.addUser();');
};


users.addUser = function (editMode) {
    var data  = users.addEditData;
    var modal = $("#modal-add-edit-user");
    var btn   = $("#btn-add-user");

    if ( editMode )
        var forUpdate = true;
    else
        var forUpdate = false;

    if ( users._validateUser(data, forUpdate) ) {

        var action = "addUser";
        var userId = 0;

        if ( editMode === true ) {
            action = "updateUser";
            userId = $("#adduser-userId").val();
        }

        //create data object that will be sent to server
        var forServer = { 
            action : action,
            userId : userId,
            userData: {
                email      : data.email.val(),
                username   : data.username.val(),
                password   : CryptoJS.SHA512(data.password.val()).toString(),
                confirm_password: CryptoJS.SHA512(data.conf_password.val()).toString()
            },
            fieldId: {
                email      : "adduser-email",
                username   : "adduser-username",
                password   : "adduser-password",
                confirm_password: "adduser-confirm_password",
            }
        };

        //put button to loading state
        WICore.loadingButton(btn, $_lang.working);

        $.ajax({
            type: "POST",
            url: "WICore/WIClass/WIAjax.php",
            data: forServer,
            success: function ( result ) {
                //return button to normal state
                WICore.removeLoadingButton(btn);
                
                //parse result to JSON
                var res = JSON.parse(result);

                if(res.status === "error") {
                    //error
                    
                    //display all errors
                    for(var i=0; i<res.errors.length; i++) {
                        var error = res.errors[i];
                        WICore.displayErrorMessage($("#"+error.id), error.msg);
                    }
                }
                else {
                   location.reload();
                }
            }
        });
    }
};

users.updateUser = function () {
    users.addUser(true);
};

users.editUser = function (userId) {
    $("#adduser-userId").val(userId);

    var modal = $("#modal-add-edit-user"),
        data  = users.addEditData,
        modalTitle = modal.find(".modal-title"),
        modalBody  = modal.find(".modal-body"),
        ajaxLoading = modal.find(".ajax-loading");

    data.button.attr('onclick', 'users.updateUser();');

    WICore.removeErrorMessages();
    
    modal.modal('show');
    modalTitle.text($_lang.loading);
    modalBody.hide();
    ajaxLoading.show();

    $.ajax({
        type: "POST",
        url: "WICore/WIClass/WIAjax.php",
        data: { action : "getUser", userId : user_Id },
        success : function (result) {
            //parse result to JSON
            var res = JSON.parse(result);

            data.email.val( res.email );
            data.username.val( res.username );
            data.firstName.val( res.first_name );
            data.lastName.val( res.last_name );
            data.address.val( res.address );
            data.phone.val( res.phone );

            data.password.attr('placeholder', $_lang.leave_blank);
            data.conf_password.attr('placeholder', $_lang.leave_blank);

            data.button.text($_lang.update);

            ajaxLoading.hide();
            modalTitle.text( res.username );
            modalBody.show();
        }
    });
};

users.banUser = function (el, userid) {
    $.ajax({
        type: "POST",
        url: "WICore/WIClass/WIAjax.php",
        data: {
            userId : userid,
            action : "banUser"
        },
        success: function ( result ) {
            var buttons = $(el).parents('.btn-group').find(".btn-primary");
            buttons.each(function () {
                $(this).removeClass("btn-primary").addClass("btn-danger");
            });
            $(el).find('span').text($_lang.unban);
            $(el).attr('onclick', 'users.unbanUser(this,'+userid+');');
        }
    });
};

users.unbanUser = function (el, userid) {
    $.ajax({
        type: "POST",
        url: "WICore/WIClass/WIAjax.php",
        data: {
            userId : userid,
            action : "unbanUser"
        },
        success: function ( result ) {
            var buttons = $(el).parents('.btn-group').find(".btn-danger");
            buttons.each(function () {
                $(this).removeClass("btn-danger").addClass("btn-primary");
            });
            $(el).find('span').text($_lang.ban);
            $(el).attr('onclick', 'users.banUser(this,'+userid+');');
        }
    });
};


users._validateUser = function (data, forUpdate) {
    var valid = true;

    //remove previous error messages
    WICore.removeErrorMessages();

    // validate username
    if ( $.trim( data.username.val() ) == "" ) {
        valid = false;
        WICore.displayErrorMessage( data.username, $_lang.field_required );
    }

    // validate email
    if ( $.trim( data.email.val() ) == "" ) {
        valid = false;
        WICore.displayErrorMessage( data.email, $_lang.field_required );
    }
    else if ( ! WICore.validateEmail( data.email.val() ) ) {
        valid = false;
        WICore.displayErrorMessage( data.email, $_lang.email_wrong_format );
    }

    // validate passwords

    if ( forUpdate === true )
    {
        if ( data.password.val().length > 0 && data.password.val().length < 6 ) {
            valid = false;
            WICore.displayErrorMessage( data.password, $_lang.password_length );
        }

        if ( data.password.val() != data.conf_password.val() ) {
            valid = false;
            WICore.displayErrorMessage( data.password );
            WICore.displayErrorMessage( data.conf_password, $_lang.passwords_dont_match );
        }
    }
    else
    {
        if ( $.trim( data.password.val() ) == "" ) {
            valid = false;
            WICore.displayErrorMessage( data.password, $_lang.field_required );
        }
        else if ( data.password.val().length < 6 ) {
            valid = false;
            WICore.displayErrorMessage( data.password, $_lang.password_length );
        }

        if ( $.trim( data.conf_password.val() ) == "" ) {
            valid = false;
            WICore.displayErrorMessage( data.conf_password, $_lang.field_required );
        }

        if ( data.password.val() != data.conf_password.val() ) {
            valid = false;
            WICore.displayErrorMessage( data.password );
            WICore.displayErrorMessage( data.conf_password, $_lang.passwords_dont_match );
        }
    }

    return valid;
};

///   WICore NAMESPACe

var WICore = {};


// put the button into loading state
WICore.loadingButton = function(button, LoadingText)
{
	oldText = button.text();
	button.attr("rel", oldText)
		.text(LoadingText)
        .addClass("disabled")
        .attr('disabled', "disabled");
};

// this returns the button back to normal state

WICore.removeLoadingButton = function (button)
{
	var oldText = button.attr('rel');
	button.text(oldText)
                     .removeClass("disabled")
                     .removeAttr("disabled")
                     .removeAttr("rel");
};

// append the success message to provided parent client
WICore.displaySuccessMessage = function(parentElement, message)
{
  $(".alert-success").remove();
  var div = ("<div class='alert alert-success'>"+message+"</div>");
    parentElement.append(div);
};

// append error message to an input element
WICore.displayErrorMessage = function(element, message)
{
    var controlGroup = element.parents(".control-group");
    controlGroup.addClass("error").addClass("has-error");
    if(typeof message !== "undefined") {
        var helpBlock = $("<span class='help-inline text-error'>"+message+"</span>");
        controlGroup.find(".controls").append(helpBlock);
    }
};

// remove all error messages from all input fields
WICore.removeErrorMessages = function()
{
    $(".control-group").removeClass("error").removeClass("has-error");
    $(".help-inline").remove();
};

// validate email format
WICore.validateEmail = function (email)
{
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
};

//get a parameter from the url

WICore.urlParam = function(name)
{
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null;
};

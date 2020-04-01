<?php
/**
 * cafe class.
 */
class WIEditor 
{

    public function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }


    public function WIEdit()
    {
    	$WIEditor = '<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" style="float:left;">
                    <div class="btn-group-edit">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="New file">
                            <i class="fa fa-file-o"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Save">
                            <i class="fa fa-save"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Print">
                            <i class="fa fa-print"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Source code">
                            <i class="fa fa-code"></i> Source
                        </button>
                    </div>
                    <div class="btn-group-edit">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Bold" onclick="document.execCommand("bold", false, "");">
                            <i class="fa fa-bold"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Italic" onclick="document.execCommand("italic", false, "");">
                            <i class="fa fa-italic"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Underline" onclick="document.execCommand("underline", false, "");">
                            <i class="fa fa-underline"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Strikethrough" onclick="document.execCommand("strikethrough", false, "");">
                            <i class="fa fa-strikethrough"></i>
                        </button>
                    </div>
                    <div class="btn-group-edit">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Cut" onclick="document.execCommand("cut", false, "");">
                            <i class="fa fa-scissors"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Copy" onclick="document.execCommand("copy", false, "");">
                            <i class="fa fa-copy"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Paste" onclick="document.execCommand("paste", false, "");">
                            <i class="fa fa-paste"></i>
                        </button>
                    </div>
                    <div class="btn-group-edit">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Undo" onclick="document.execCommand("undo", false, "");">
                            <i class="fa fa-reply"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Redo" onclick="document.execCommand("redo", false, "");">
                            <i class="fa fa-share"></i>
                        </button>
                    </div>
                    <div class="btn-group-edit">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Align left" onclick="document.execCommand("justifyLeft", false, "");">
                            <i class="fa fa-align-left"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Align center" onclick="document.execCommand("justifyCenter", false, "");">
                            <i class="fa fa-align-center"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Align right" onclick="document.execCommand("justifyRight", false, "");">
                            <i class="fa fa-align-right"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Align justify">
                            <i class="fa fa-align-justify"></i>
                        </button>
                    </div>
                    <div class="btn-group-edit">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Numbered list">
                            <i class="fa fa-list-ol"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Bulleted list">
                            <i class="fa fa-list-ul"></i>
                        </button>
                    </div>
                    <div class="btn-group-edit">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Link">
                            <i class="fa fa-link"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Unlink">
                            <i class="fa fa-unlink"></i>
                        </button>
                    </div>
                    <div class="btn-group-edit">
                        <button type="button" class="btn btn-default"  data-toggle="tooltip" title="Picture">
                            <i class="fa fa-picture-o"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="HTML table">
                            <i class="fa fa-table"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Font">
                            <i class="fa fa-font"></i>
                        </button>
                    </div>
                </div>
                <div class="panel-body" id="WIEditor">
                <div class="textarea" contenteditable="true" id="contenteditor">This is a test</div>

                </div>
        </div>
    </div>
</div>';
	echo $WIEditor;
    }



}



?>
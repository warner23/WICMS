<?php

$status = WISession::get('debate');
//echo $status;
if(WISession::get('debate') === "debator"){
    include_once 'WIInc/debators.php';

}elseif (WISession::get('debate') === "spectator") {
    include_once 'WIInc/spectator.php';
}
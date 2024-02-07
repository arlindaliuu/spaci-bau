<?php 

function getModules($module_name){
    require_once get_template_directory() . '/modules/' . $module_name . '.php';
}

<?php 

function getModules($module_name, $data){
    require get_template_directory() . '/modules/' . $module_name . '.php';
    // Pass the $data variable to the included file for processing
}
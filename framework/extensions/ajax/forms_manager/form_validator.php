<?php

    /*
    
        localhost Ltd - Form Validator
        
        Version: 1.5
        
        File name: form_validator.php
        Description: This file contains the AJAX Form Validator extension.
        
        Coded by George Delaportas (G0D)
        
        localhost Ltd
        Copyright (c) 2014
    
    */
    
    

    // Disable error reporting
    error_reporting(0);

    // Include ALPHA Framework class
    require('../../../alpha.php');

    // Include ALPHA CMS class
    require('../../../../cms/alpha_cms.php');
    
    // Load Error Reporter extension
    ALPHA_CMS::Load_Extension('error_reporter', 'php');
    
    // Error report form
    if ($_POST['validator'] == '1' && !empty($_POST['err_code']) && !empty($_POST['lang_code']))
    {
    
        echo Error_Reporter($_POST['err_code'], $_POST['lang_code']);
        
        return 1;
    
    }
    
    return 0;
    
    
    
    /* ---------- End ---------- */

?>

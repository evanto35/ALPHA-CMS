<?php

    /*
    
        localhost Ltd - Woody (e-Mail sender)
        
        Version: 2.0
        
        File name: woody.php
        Description: This file contains the Woody extension.
        
        Coded by George Delaportas (G0D)
        
        localhost Ltd
        Copyright (c) 2014
    
    */
    
    
    
    // Woody class
    class Woody
    {
    
        // Server IP
        private static $__server_ip = '127.0.0.1';
        private static $__server_port = '25';
        
        // Send e-mails
        public static function Configure($server_ip, $server_port)
        {
        
            if (empty($server_ip) || empty($server_port))
                return false;
            
            ini_set('SMTP', $server_ip);
            ini_set('smtp_port', $server_port);
            
            self::$__server_ip = $server_ip;
            self::$__server_port = $server_port;
            
            return true;
        
        }
        
        // Send e-mails
        public static function Send_Mail($sdr_email, $rcp_email, $subject, $message = null)
        {
        
            if (empty($sdr_email) || empty($rcp_email)|| empty($subject))
                return false;
            
            ini_set('SMTP', self::$__server_ip);
            ini_set('smtp_port', self::$__server_port);
            
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'From: ' . $sdr_email . "\r\n";

            if ($message === null)
            {

                $handle = fopen(ALPHA_CMS::Absolute_Path('framework/extensions/php/woody/msg.html'), 'r');

                $message = fread($handle, filesize(ALPHA_CMS::Absolute_Path('framework/extensions/php/woody/msg.html')));

                fclose($handle);

                if ($message === false)
                    return false;

            }

            $result = mail($rcp_email, $subject, $message, $headers);

            return $result;
        
        }

    
    }
    
    
    
    /* ---------- End ---------- */

?>

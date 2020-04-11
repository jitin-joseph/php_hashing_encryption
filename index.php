<?php
/**
 * A function for hashing, encryption and decryption in php
 * @param   string $action    encrypt or decrypt
 * @param   string $string    the string which needs to be encrypted or decrypted
 * @return  string            in encrypted or plain text format based on the selected action
 * @author Jitin Joseph
 * @created date   2020-04-11
 */
function decrypt_encrypt($action, $string) {
        $output = false;
     
        $encrypt_method = "AES-256-CBC";
        $secret_key = '12dasdq3g5b2434b';
        $secret_iv = '35dasqq3t5b9431q';
     
        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
     
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
     
        return $output;
    }

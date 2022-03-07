<?php
function saveImage($file){
       return $file->store('image','public');
}

// function En_code($string){
// // Store the cipher method
// $ciphering = "AES-128-CTR";
// // Use OpenSSl Encryption method
// $iv_length = openssl_cipher_iv_length($ciphering);
// $options = 0;
// // Non-NULL Initialization Vector for encryption
// $encryption_iv = '1234567891011121';
// // Store the encryption key
// $encryption_key = "123";
// return openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
// }

// function De_code($tring){
// // Non-NULL Initialization Vector for decryption
// $decryption_iv = '1234567891011121';
// $ciphering = "AES-128-CTR";
// $options = 0;
// // Store the decryption key
// $decryption_key = "123";
// // Use openssl_decrypt() function to decrypt the data
// return openssl_decrypt ($string, $ciphering, $decryption_key, $options, $decryption_iv);
// }
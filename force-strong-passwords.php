<?php
/*
Plugin Name: Force Strong Passwords
Description: Forces users to use strong passwords in WordPress.
Version: 1.0
Author: Your Name
*/

add_action('user_profile_update_errors', 'fsp_force_strong_passwords', 10, 3);

function fsp_force_strong_passwords($errors, $update, $user) {
    if (!empty($_POST['pass1'])) {
        $password = $_POST['pass1'];

        if (strlen($password) < 10 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
            $errors->add('password_error', __('Password must be at least 10 characters long and include at least one uppercase letter and one number.'));
        }
    }
}

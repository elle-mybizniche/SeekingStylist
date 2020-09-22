<?php

class MBN_Activator{

    public function __construct(){
        //$this->createDefaultUsers();
    }

    // public function createDefaultUsers(){
    //     $users  = [

    //         // add more here...

    //         [
    //             'username'  => 'mbnseo',
    //             'password'  => '!!mbnseo!!123',
    //             'email'     => 'vicrey@mybizniche.com',
    //             'role'      => 'contributor'
    //         ]
    //     ];

    //     foreach($users as $user){
    //         if(!username_exists($user['username']) && !email_exists($user['email'])){
    //             $user_id	= wp_create_user($user['username'], $user['password'], $user['email']);
    //             $newuser    = new WP_User($user_id);
                
    //             $newuser->set_role($user['role']);
    //         }
    //     }

    // }
}
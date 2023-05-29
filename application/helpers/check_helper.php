<?php

    function is_logged_in()
    {
       $ci = get_instance();
        if ($ci->session->userdata('role_id') == null) {
            redirect('auth');
        }
         
    }

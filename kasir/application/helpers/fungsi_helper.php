<?php

function cek_already_login()
{
   $instance = &get_instance();
   $user_session = $instance->session->userdata('userid');

   if ($user_session) {
      redirect('dashboard');
   }
}

function cek_not_login()
{
   $instance = &get_instance();
   $user_session = $instance->session->userdata('userid');

   if (!$user_session) {
      redirect('auth/login');
   }
}

function pesan_alert($alert, $pesan, $redirect)
{
   $instance = &get_instance();
   $instance->session->set_flashdata('pesan', '<div class="alert alert-' . $alert . ' alert-dismissible fade show" role="alert">' . $pesan . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
   redirect($redirect);
}

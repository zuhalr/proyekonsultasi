<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  public $assets_version = "1.0.0";
  
  public function __construct() {
    parent::__construct();
    $this->auth();
    //$this->acl();
  }

  public function auth() {
    if (!$this->ion_auth->logged_in()){
      redirect(base_url().'signin', 'refresh');
    }
  }
  
  // default layout
  public function views($template, $data=null)
  {
    if (!$this->ion_auth->logged_in()){
      redirect(base_url().'signin', 'refresh');
    }else{
      $data['user'] = $this->ion_auth->user()->row();
      $data['opt'] = $this->db->get_where('options', array('id' => '1001'))->row();
      $this->load->view('layout/header', $data);
      $this->load->view($template, $data);
      $this->load->view('layout/footer');
    }
  }

  public function CoreLog($param) {
    if ($this->ion_auth->logged_in()) {
      $users = $this->ion_auth->user()->row();
      $title = ($param == null) ? 'Sample Dev':$param;
      // tidak bisa pakai ip address auth, bisa jadi user disconnect dengan ip dynamic
      $data = array(
        'time'    => date('Y-m-d H:i:s'),
        'ip'      => $this->input->ip_address(),
        'action'  => $title,
        'user'    => $users->id
      );
      $this->db->insert('activity', $data);
    }
  }

  public function acl() {
    $allow_section = array(
      1 => '*',
      2 => 'posts|categories'
    );

    $section = $this->uri->segment(2);
    if(empty($section) || $section == 'dashboard') return;

    $user = $this->ion_auth->user()->row();
    $user_groups = $this->ion_auth->get_users_groups($user->id)->result();

    foreach($user_groups as $group) {
      $allowed = explode('|', $allow_section[$group->id]);

      foreach($allowed as $a) {
        $a = strtolower(trim($a));
        if($a == '*') return;
        if($a == $section) return;
      }
    }

    redirect(base_url('cms/dashboard'), 'refresh');
  }

}

?>

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Front_Controller extends CI_Controller{

  public $assets_version = "1.0.0";
  
  public function __construct() {
    parent::__construct();
  }

  // default layout
  public function views($template, $data=null)
  {
    $data['options'] = $this->db->get_where('options', array('id' => '1001'))->row();
    $data['footposts'] = $this->db->limit(3)->get_where('posts', array('type' => 'post', 'status' => 'publish'))->result();

    // Social media
    $data['options']->social = json_decode($data['options']->social);

    $data['footerDescriptionCompany'] = $this->model->getSingleDataPost("page","footer-description-company");
    $data['textWhatsapp'] = $this->model->getSingleDataPost("page","text-whatsapp");

    $data['allGaleri'] = $this->model->getAllPostsBy("galeri");

    $data['allHarga'] = $this->model->getAllPostsBy("harga");

    $data['allFaqs'] = $this->model->getAllPostsBy("faqs");

    $data['allSitePlan'] = $this->model->getAllPostsBy("siteplan");


    $this->load->view('layout/header', $data);
    $this->load->view($template, $data);
    $this->load->view('layout/footer', $data);
  }

  

  // Using twig
  public function twigViews($template, $data=null)
  {
    /******* TWIG LOADER *******/

    $config = array(
      'paths' => 'modules/front/views',
      'cache' => ENVIRONMENT !== 'production' ? FALSE : 'modules/front/cache',
      'functions' => array('get_cookie','monthYear')
    );
    $this->load->library('twig', $config);

    $twig = $this->twig->getTwig();
    $twig->addFilter(new Twig_SimpleFilter('file_exists',
      function($string) {
        return file_exists($string);
      }
    ));
    $twig->addFunction(new Twig_SimpleFunction('input_get',
      function($param) {
        return $this->input->get($param);
      }
    ));

    /***************************/

    $data['options'] = $this->db->get_where('options', array('id' => '1001'))->row();
    $data['footposts'] = $this->db->limit(3)->get_where('posts', array('type' => 'post', 'status' => 'publish'))->result();
    $data['menu'] = $this->db->get_where('menu', array('status_menu' => 'Y'))->result();

    $data['og_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http").'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $data['uri_segments'] = $this->uri->segment_array();

    $this->twig->display($template, $data);
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


  function getLastMonthFrom($year,$month)
  {
    // tgl
        $dateFormat = $year.'-'.$month;
        $dt = new DateTime($dateFormat);
        // Create a date interval string to go back to the first day of the previous month
        $int = sprintf('P1M%dD', $dt->format('j')-1);
        // Get the first day of the previous month as DateTime
        $fdopm = $dt->sub(new DateInterval($int));
        // Verify it works
        return ($fdopm->format('m'));
  }







}

?>

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->path = FCPATH.'backup';
    }

    public function backup() {
        $this->{strtolower($this->input->method()).'Backup'}();
    }

    private function getBackup() {
        echo form_open().'<input type="submit" value="Start"></form>';
    }

    private function postBackup() {
        $product = $this->db->get_where('posts', array('type'=>'product'))->result();

        $categories = $this->db->where('type_categories', 'products')
                               ->or_where('type_categories', 'industri')
                               ->or_where('type_categories', 'brand')
                               ->get('categories')
                               ->result();

        foreach($categories as $row) {
            if(!empty($row->imagecat) && file_exists(FCPATH.'assets/upload/'.$row->imagecat)) {
                copy(FCPATH.'assets/upload/'.$row->imagecat, $this->path.'/files/'.$row->imagecat);
            }
        }

        foreach($product as $row) {
            if(!empty($row->image) && file_exists(FCPATH.'assets/upload/'.$row->image)) {
                copy(FCPATH.'assets/upload/'.$row->image, $this->path.'/files/'.$row->image);
            }
        }

        file_put_contents($this->path.'/data.json', json_encode(array('products'=>$product,'categories'=>$categories)));

        echo 'Success!';
    }

    public function restore() {
        $this->{strtolower($this->input->method()).'Restore'}();
    }

    private function getRestore() {
        echo form_open().'<input type="submit" value="Start"></form>';
    }

    private function postRestore() {
        $data = json_decode(file_get_contents($this->path.'/data.json'), TRUE);
        
        $this->db->insert_batch('categories', $data['categories']);
        
        foreach($data['categories'] as $row) {
            if(!empty($row['imagecat']) && file_exists(FCPATH.'assets/upload/'.$row['imagecat'])) {
                copy($this->path.'/files/'.$row['imagecat'], FCPATH.'assets/upload/'.$row['imagecat']);
            }
        }

        foreach($data['products'] as $key=>$val) {
            unset($data['products'][$key]['posts_id']);
        }

        $this->db->insert_batch('posts', $data['products']);

        foreach($data['products'] as $row) {
            if(!empty($row['image']) && file_exists(FCPATH.'assets/upload/'.$row['image'])) {
                copy($this->path.'/files/'.$row['image'], FCPATH.'assets/upload/'.$row['image']);
            }
        }

        echo 'Success!';
    }
}
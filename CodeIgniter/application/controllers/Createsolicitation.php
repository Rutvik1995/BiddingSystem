<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createsolicitation extends CI_Controller {

    public function index()
    {
        $this->load->model('queries');
        $this->load->database();
        $this->load->library('session');
        $this->load->view('addsolicitation.php');
    }


    public function addsolicitation(){

    }

    function get_autocomplete(){
        $this->load->model('queries');
        if (isset($_GET['term'])) {
            $result = $this->queries->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->category;
                echo json_encode($arr_result);

            }
        }
    }
    function type_autocomplete(){

        $this->load->model('queries');
        if (isset($_GET['term'])) {
            $result = $this->queries->search_type($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->type;
                echo json_encode($arr_result);

            }
        }
    }


    function add_s_details()
    {
        $this->load->library('session');
        $data['id'] = $this->input->post('id');
        $data['title'] = $this->input->post('title');
        $data['due']   = $this->input->post('due');
        $data['type']   = $this->input->post('type');
        $data['category']   = $this->input->post('category');
        $data['description']   = $this->input->post('description');
        date_default_timezone_set("America/Los_Angeles");
        $data['lastupdated']= date("Y-m-d");
        $data['status']= "incomplete";

        //  $result= $this->db->insert('solicitation', $data);



        $this->db->where('id',$data['id']);
        $q = $this->db->get('solicitation');

        if ( $q->num_rows() > 0 )
        {
            $this->db->where('id',$data['id']);
            $this->db->update('solicitation',$data);
            $this->session->set_userdata('sid', $data['id']);
        } else {
            $this->db->set('id', $data['id']);
            $this->db->insert('solicitation',$data);
            $this->session->set_userdata('sid', $data['id']);
        }

    }

}


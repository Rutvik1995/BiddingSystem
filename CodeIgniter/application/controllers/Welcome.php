<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
	    $this->load->model('queries');
	    $posts=$this->queries->getBidsname();
	   // echo '<pre>';
	  //  print_r($posts);
       // echo '<pre>';
        //exit();
        //$this->load->view('addsolisitation.php');
        $this->load->view('welcome_message',['posts'=>$posts]);
        //$this->load->view('header.php');
	}
	public function solisitation(){
        $this->load->model('queries');
        $posts=$this->queries->getslist();
        $this->load->view('slist.php',['posts'=>$posts]);

    }
    public function addsolisitation(){
        $this->load->view('addsolisitation.php');

    }

    public function phpgrid(){

        require_once("application/libraries/phpGrid_Lite/conf.php");
        require_once(APPPATH. 'libraries/phpGrid_Lite/conf.php'); // APPPATH is path to application folder
         // $data['phpgrid'] = new C_DataGrid("SELECT * FROM solisitation", "Sno", 'solisitation');
        $data['phpgrid'] = new C_DataGrid("SELECT Sno,title FROM solisitation", "Sno", "solisitation");
        // $this->ci_phpgrid->example_method(3);

      $this->load->view('phpgrid',$data);

    }


    public function  smartgrid(){
        // Load the SmartGrid Library
        $this->load->library('SmartGrid/Smartgrid');

// MySQL Query to get data
        $sql = "SELECT * FROM solisitation";

// Column settings
        $columns = array("Sno"=>array("header"=>"Employee ID", "type"=>"label"),
            "title"=>array("header"=>"Name", "type"=>"label"),
            "status"=>array("header"=>"Designation", "type"=>"label"),
            "filingdatetime"=>array("header"=>"Designation", "type"=>"label"),
            "type"=>array("header"=>"Designation", "type"=>"label"),
            "category"=>array("header"=>"Designation", "type"=>"label"),
            "description"=>array("header"=>"Designation", "type"=>"label"),
            "description"=>array("header"=>"Designation", "type"=>"label")
        );

// Set the grid
        $this->smartgrid->set_grid($sql, $columns);

// Render the grid and assign to data array, so it can be print to on the view
        $data['grid_html'] = $this->smartgrid->render_grid();

// Load view
        $this->load->view('smartgrid', $data);
}

public function bgrid()
{
    $this->load->model('queries');
    $posts=$this->queries->getlistforgrid();
    //$this->data['result']=$this->queries->getBidsname();
    // echo '<pre>';
    //  print_r($posts);
     //echo '<pre>';

    $this->load->view('grid', ['posts'=>$posts]);
}

public function publish()
{
    $this->load->model('queries');
    $posts=$this->queries->getlistforgrid4();
    //$this->data['result']=$this->queries->getBidsname();
    // echo '<pre>';
    //  print_r($posts);
     //echo '<pre>';

    $this->load->view('grid4', ['posts'=>$posts]);
}



public function bgrid2()
{
    $this->load->model('queries');
    $posts=$this->queries->getlistforgrid();
    //$this->data['result']=$this->queries->getBidsname();
    // echo '<pre>';
    //  print_r($posts);
     //echo '<pre>';

    $this->load->view('grid', ['posts'=>$posts]);
}




    public function autoc(){

        $this->load->view('autocomplete');

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


    public function files(){

        $this->load->view('filesauto');

    }


    


    

    


    function secondevaluation()
    {
        $this->load->view('SecondEvaluation.html');
    }
    function adds()
    {
        $this->load->view('addsolisitation.php');
    }




    function exam_grade()
    {
        $this->load->library('session');
            $data['id'] = $this->input->post('id');
            $data['title'] = $this->input->post('title');
           $var= $this->input->post('due');
            $data['due']   = $this->input->post('due');

            $data['type']   = $this->input->post('type');
            $data['category']   = $this->input->post('category');
            $data['description']   = $this->input->post('description');
            date_default_timezone_set("America/Los_Angeles");
            $data['lastupdated']= date("Y-m-d");
            $data['status']= "Incomplete";

          //  $result= $this->db->insert('solicitation', $data);



        $this->db->where('id',$data['id']);
        $q = $this->db->get('solicitation');

        if ( $q->num_rows() > 0 )
        {
            $this->db->where('id',$data['id']);
            $this->db->update('solicitation',$data);
            $this->session->set_userdata('sid', $data['id']);
        } 
        else 
        {
            $this->db->set('id', $data['id']);
            $this->db->insert('solicitation',$data);
            $this->session->set_userdata('sid', $data['id']);
        }

    }




        function fordocumenttable()
        {
            $this->load->view('ShowDocument.php');
           }
       function uploaddoc()
       {
           $this->load->library('session');
           $sid = $this->session->userdata('sid');



            

           mkdir($_SERVER['DOCUMENT_ROOT']."/Solicitation/"."/".$sid);
           $fileExistsFlag = 0;
           $fileName = $_FILES['file']['name'];

           $file_size =$_FILES['file']['size'];
           $file_type=$_FILES['file']['type'];
           echo "<br>".$file_size."<br>";
           echo "<br>".$file_type."<br>";


           // Unix Timestamp -- Since PHP 5.3



           date_default_timezone_set('America/Los_Angeles');
           $time = date('h:i:s a', time());
           echo $time."<br>";

           $originalDate=date("Y/m/d");
           $newDate = date("d-m-Y", strtotime($originalDate));
           echo $newDate;


           if($fileExistsFlag == 0)
           {
               $target = "../Solicitation/".$sid."/";

               $fileTarget = $target.$fileName;
               echo "<br>".$fileTarget."<br>";
               echo "<br>".$target."<br>";
               $tempFileName = $_FILES["file"]["tmp_name"];
               $fileName = $_FILES['file']['name'];
               $this->session->set_userdata('temp1name',$fileName);

               $result = move_uploaded_file($tempFileName,$fileTarget);
               /*
               *   If file was successfully uploaded in the destination folder
               */


               if($result)
               {
                   echo "uploaded now inserting";
               }
               else
               {
                   echo "Sorry !!! There was an error in uploading your file";
               }

           }

           else
           {
               echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";

           }

       }
    function adddocdata()
    {
        $this->load->library('session');
        $sid = $this->session->userdata('sid');
        $pathname=$this->session->userdata('temp1name');
        $data['dtitle'] =$this->input->post('doctitle');
        $data['posteddate'] = $this->input->post('posteddate');
        $data['solicitationid']=$sid;
        $data['filename']='document';
        $data['subheading']=$this->input->post('subheading');
        $data['duedate']=$this->input->post('duedate');

        $x1="http://localhost:8888/";
        $target = "../Solicitation/".$sid."/".$pathname;
        $x2 =substr($target,3);

        $new_str=  $x1.''.$x2;
        $data['path']=$new_str;

        $result= $this->db->insert('document', $data);
        echo $result;





    }


    public function previewdata(){
        $this->load->library('session');
        $sid = $this->session->userdata('sid');
        $this->load->model('queries');
        $result=$this->queries->getdocsoc($sid);
        echo json_encode($result);
    }


    function previewsol()
    {
        // addsolisitation();
        //$this->getForm2();

        $this->load->library('session');
        $sid = $this->session->userdata('sid');

        $this->load->database();
        $this->load->helper('url');

        $this->load->view('solisitation_display.php',$this->$data);


    }



    public function getForm2()
    {

        $this->load->library('session');
        $sid = $this->session->userdata('sid');

        $this->load->database();
        $this->load->helper('url');

        $this->data['result1']=$this->solisitation->getdocsoc();





        $this->load->view('solisitation_display.php',$this->$data);

    }



    public function addsolicitation()
    {
        $this->load->view('addsolicitation.php');
    }




    function preview2()
    {
        // addsolisitation();
        //$this->getForm2();
        $this->load->model('queries');
        //$posts=$this->queries->getlistforgrid();
        //$this->data['result']=$this->queries->getBidsname();
        // echo '<pre>';
        //  print_r($posts);
        //echo '<pre>';

        // $this->load->view('grid', ['posts'=>$posts]);

        $this->load->library('session');
        $sid = $this->session->userdata('sid');

        $this->load->database();
        $this->load->helper('url');
        $this->data['result']=$this->queries->getdocsoc($sid);
        // $this->load->view('stream_display',);
        $this->load->view('getuser',$this->data);


    }

    function preview3()
    {
        // addsolisitation();
        //$this->getForm2();
        $this->load->model('queries');
        //$posts=$this->queries->getlistforgrid();
        //$this->data['result']=$this->queries->getBidsname();
        // echo '<pre>';
        //  print_r($posts);
        //echo '<pre>';

        // $this->load->view('grid', ['posts'=>$posts]);

        $this->load->library('session');
        $sid = $this->session->userdata('sid');

        $this->load->database();
        $this->load->helper('url');
        $this->data['result']=$this->queries->getdocsoc2();
        // $this->load->view('stream_display',);
        $this->load->view('getuser',$this->data);


    }





    function previewmain()
    {

        $this->load->model('queries');



        $id=$_GET['id'];
        print_r($id);
        //$this->load->library('session');
      //  $sid = $this->session->userdata('sid');

        $this->load->database();
        $this->load->helper('url');
        $this->data['result']=$this->queries->getdocsoc($id);
        // $this->load->view('stream_display',);
        $this->load->view('getuser',$this->data);


    }








    



    
    


    function updatesolicitation ()
    {
        $id = $_GET['id'];

        $this->load->model('queries');
        $posts=$this->queries->getinfo_forupdatebid($id);
        $this->load->view('updatesolicitation.php',['posts'=>$posts]);
    }

    function deletedoc ()
    {
        $docid=$this->input->post('docid');
        $this->load->model('queries');
        $result=$this->queries->delete_doc($docid);
        echo  $docid;
    }


    function cgrid ()
    {


        $this->load->model('queries');
        $posts=$this->queries->getlistforgcrid();
        //$this->data['result']=$this->queries->getBidsname();
        // echo '<pre>';
        //  print_r($posts);
        //echo '<pre>';

        $this->load->view('solicitationcreatedby', ['posts'=>$posts]);

    }





    function reviewerpage1()
    {

        $this->load->model('queries');
    $posts=$this->queries->getlistforgrid();
    //$this->data['result']=$this->queries->getBidsname();
    // echo '<pre>';
    //  print_r($posts);
     //echo '<pre>';

    $this->load->view('grid', ['posts'=>$posts]);


    }



    function reviewerpage2()
    {

        $this->load->model('queries');
    $posts=$this->queries->getlistforgrid3();
    //$this->data['result']=$this->queries->getBidsname();
    // echo '<pre>';
    //  print_r($posts);
     //echo '<pre>';

    $this->load->view('grid2', ['posts'=>$posts]);


    }


    function reviewerpage3()
    {

        $this->load->model('queries');
    $posts=$this->queries->getlistforgrid3();
    //$this->data['result']=$this->queries->getBidsname();
    // echo '<pre>';
    //  print_r($posts);
     //echo '<pre>';

    $this->load->view('grid3', ['posts'=>$posts]);


    }


    function incomplete()
    {

        $this->load->model('queries');
    $posts=$this->queries->getlistforgrid2();
    //$this->data['result']=$this->queries->getBidsname();
    // echo '<pre>';
    //  print_r($posts);
     //echo '<pre>';

    $this->load->view('grid2', ['posts'=>$posts]);


    }





    function checkingpage()
    {
    
        $this->load->model('queries');



        $id=$_GET['id'];
       // print_r($id);
        //$this->load->library('session');
      //  $sid = $this->session->userdata('sid');

        $this->load->database();
        $this->load->helper('url');
        $this->data['result']=$this->queries->getdocsoc($id);
        // $this->load->view('stream_display',);
        $this->load->view('checkpage',$this->data);

       
        

      
      
    }



    function checkingpage2()
    {
    
        $this->load->model('queries');



        $id=$_GET['id'];
       // print_r($id);
        //$this->load->library('session');
      //  $sid = $this->session->userdata('sid');

        $this->load->database();
        $this->load->helper('url');
        $this->data['result']=$this->queries->getdocsoc($id);
        // $this->load->view('stream_display',);
        $this->load->view('checkpage2',$this->data);

       
        

      
      
    }


    function check2()
    {
        $this->load->model('queries');



        $id=$_GET['id'];
        $this->load->database();
        $this->load->helper('url');
        $this->data['result']=$this->queries->getdocsoc($id);
        // $this->load->view('stream_display',);
        $this->load->view('checkpage3',$this->data);

    }


    function hh()
    {
        $this->load->view('trail2.php');
    }




    function cancelsol()
    {
         
        $this->load->model('queries');
        

        $this->load->library('session');
        $sid = $this->session->userdata('sid');

        $this->load->database();
        $this->load->helper('url');
       $this->queries->cancelsol($sid);
              
       // $this->load->view('getuser',$this->data);
      // canceldoc();
    }


function canceldoc()
{
    $this->load->model('queries');
        

        $this->load->library('session');
        $sid = $this->session->userdata('sid');

        $this->load->database();
        $this->load->helper('url');
        $this->queries->canceldoc($sid);        
}



    function changestatus()
    {
       
        $this->load->model('queries');
        

        $this->load->library('session');
        $sid = $this->session->userdata('sid');
        $this->load->database();
        $this->load->helper('url');
        $select1="To Be Review";
        $data=array(
			
			'status' => $select1 
				
			);
        $this->queries->changestatus($sid,$data);   

    }



    function acceptstatus()
    {
        $id=$_GET['id1'];
        $this->load->model('queries');
        

       
        $this->load->database();
        $this->load->helper('url');
        $select1="Approved";
        $data=array(
			
			'status' => $select1 
				
			);
        $this->queries->changestatus($id,$data);   

    }

    function acceptstatus3()
    {
        $id=$_GET['id1'];
        $this->load->model('queries');
        

       
        $this->load->database();
        $this->load->helper('url');
        $select1="Published";
        $data=array(
			
			'status' => $select1 
				
			);
        $this->queries->changestatus($id,$data);   

    }


    function acceptstatus2()
    {
        $id=$_GET['id1'];
        $this->load->model('queries');
        

       
        $this->load->database();
        $this->load->helper('url');
        $select1="Rejected";
        $data=array(
			
			'status' => $select1 
				
			);
        $this->queries->changestatus($id,$data);   

    }


    




    function selectdocs()
    {

        $this->load->model('queries');
        $posts=$this->queries->getdocs();
       $this->load->view('selectdocs', ['posts'=>$posts]);
    }


    function evaluationhome()
    {
        $this->load->model('queries');
        $doc_list = $this->queries->getBidderDetails();
        $this->load->view('EvaluationHome', ['docs' => $doc_list]);
    }

    function evaluationSpecific() {
        $this->load->model('queries');
        $doc_list = $this->queries->getEvaluationSpecific($_GET["id"],$_GET["solId"]);
        $this->load->view('EvaluationSpecific', ['docs' => $doc_list]);
    }

    function BiddersSolicitation ()
    {
        $this->load->model('queries');
        $doc_list=$this->queries->getBidderSolicitations();
        $this->load->view('BiddersSolicitation',['docs'=>$doc_list]);
    }

    function SolicitationSpecific (){
        $this->load->model('queries');
        $doc_list=$this->queries->getSolicitationSpecific($_GET["id"]);
        $this->load->view('solicitationspecific',['docs'=>$doc_list]);
    }

    function fee()
    {
        $this->load->model('queries');
        $doc_list=$this->queries->getFeeDocument($_GET['id']);
        $this->load->model('queries');
        $feeData=$this->queries->getFeeData($_GET['id'],$_GET['sid']);
        $this->load->view('Fee', ['biddocs'=>$doc_list,'feeData'=>$feeData]);
    }

    function preview()
    
    {
        $this->load->model('queries');
        $doc_list=$this->queries->getBidDocuments($_GET['id']);
        $fname=$_GET['fname'];
        $lname=$_GET['lname'];
        $solicitationId=$_GET['sid'];
        //$this->load->model('queries');
        //$solicitationId=$this->queries->getSolicitationId($_GET['id']);
        $this->load->view('PreliminaryReview', ['biddocs'=>$doc_list, 'fname'=>$_GET['fname'], 'lname'=>$_GET['lname'], 'solicitationId'=>$_GET['sid']]);
    }

    function secondaryEvaluation()
    {
        $this->load->model('queries');
        $doc_list=$this->queries->getBidderId($_GET['id']);
        $this->load->view('secondaryEvaluation',['docs'=>$doc_list]);
    }

    function update()
    {
        $this->load->model('queries');
        $doc_list1 = $this->queries->updateScore();
        $doc_list = $this->queries->getBidderDetails();
        $this->load->view('BiddersSolicitation', ['docs' => $doc_list]);
       

    }





    
    function SaveCheckedPreliminaryResponse()
    {
        $this->load->model('queries');
        $this->queries->updateCheckedBidDocuments();
    }
    function SaveUncheckedPreliminaryResponse()
    {
        $this->load->model('queries');
        $this->queries->updateUnCheckedBidDocuments();
    }
    function UpdateFirstEvaluationStatus()
    {
        $this->load->model('queries');
        $this->queries->UpdateFirstEvalStatus();
    }

    function updateFee()
    {
        $this->load->model('queries');
        $this->queries->UpdateFee();
    }

    function  debug(){
        $this->load->view('debug');
    }

    function openClarificationView(){
	    $this->load->view('Clarification');
    }

    function SaveMessage()
    {
        $this->load->model('queries');
        $this->queries->SaveMsg();
    }
    


    function publishSolicitation()
    {
        $this->load->model('queries');
        $this->queries->publishSolicitation();
    }
    









}


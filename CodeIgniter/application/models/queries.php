<?php
class queries extends CI_Model
{

    public function getBidsname()
    {
        $query=$this->db->get('bidlist');
        if($query->num_rows()>0){
            return $query->result();
        }
    }


    public function insertbid($data){
        $this->db->insert('bidlist', $data);
    }


    public function getslist()
    {
        $query=$this->db->get('solisitation');
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }

    public function getlistforgrid(){

        $query=$this->db->query('select * from solicitation where status ="Published" or status="Rejected"');
        //$query->bind_param('BidderId', $BidderId);
        //$query->execute();
        //if($query->num_rows()>0){
        return $query->result();


    }





    public function getlistforgrid2()
    {

        $query=$this->db->query('select * from solicitation where status ="Incomplete" ');
        //$query->bind_param('BidderId', $BidderId);
        //$query->execute();
        //if($query->num_rows()>0){
        return $query->result();


    }
    public function getlistforgrid3(){

        $query=$this->db->query('select * from solicitation where status ="To Be Review" ');
        //$query->bind_param('BidderId', $BidderId);
        //$query->execute();
        //if($query->num_rows()>0){
        return $query->result();


    }
   
    

    public function getlistforgrid4(){

        $query=$this->db->query('select * from solicitation where status ="Approved" ');
        //$query->bind_param('BidderId', $BidderId);
        //$query->execute();
        //if($query->num_rows()>0){
        return $query->result();


    }
   


    public function getlistforgcrid(){

        $query=$this->db->query('select * from solicitation where status ="Published" or status="Rejected"');
        //$query->bind_param('BidderId', $BidderId);
        //$query->execute();
        //if($query->num_rows()>0){
        return $query->result();


    }


    function search_blog($title){
        $this->db->like('category', $title , 'both');
        $this->db->order_by('category', 'ASC');
        $this->db->limit(1);
        return $this->db->get('solicitation')->result();
    }

    function search_type($title){
        $this->db->like('type', $title , 'both');
        $this->db->order_by('type', 'ASC');
        $this->db->limit(1);
        return $this->db->get('solicitation')->result();
    }

    function getdocs()
    {
        $query=$this->db->query('select * from document');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    function getdocsoc($sid)
    {


        $this->db->select('*');
        $this->db->from('document');
        $this->db->join('solicitation', 'document.solicitationid = solicitation.id');
        $this->db->where('document.solicitationid',$sid);
        $this->db->order_by("subheading", "asc");
        $query=$this->db->get();

        return $query->result();

    }



    function getdocsoc2()
    {


        $this->db->select('*');
        $this->db->from('document');
        $this->db->join('solicitation', 'document.solicitationid = solicitation.id');
        $this->db->where('document.solicitationid','1111-1111');
        $query=$this->db->get();

        return $query->result();

    }



    function getBidDocuments($bidderid)
    {
       $query=$this->db->query('select * from document d, biddocuments b  WHERE b.BidderId = '.$bidderid.' and b.SolicitationId = "'.$_GET['sid'].'" and b.DocId = d.id and d.dtitle NOT LIKE "%fee%"');
       //$query=$this->db->query('select * from document d, biddocuments b  WHERE b.BidderId = '.$bidderid.' and b.SolicitationId = "'.$_GET['sid'].'" and d.dtitle NOT LIKE "%fee%"');
        return $query->result();
    }




    
  function delete_doc($doc_id)
  {
        $this->db->where('id',$doc_id);
      $result=$this->db->delete('document');
      return $result;
    }


    function cancelsol($sid)
    {
        $this->db->where('id',$sid); 
        $this->db->delete('solicitation');
        //$this->db->delete('solicitation');
       // $this->db->delete('document');
       return $result;

    }



    function canceldoc($sid)
    {
        $this->db->where('solicitationid',$sid); 
        $this->db->delete('document');
      
       return $result;

    }


    function changestatus($sid,$data)
    {
        $this->db->where('id',$sid);
        $this->db->update('solicitation' ,$data);
    }







    function getBidderDetails() {
        $query = $this->db->query('SELECT * FROM bid b, bidder d where b.BidderId = d.id');
        return $query->result();
    }

    function getBidderSolicitations(){
        $query = $this->db->query('SELECT DISTINCT(b.SolicitationId), b.Title FROM bid b, bidder d where b.BidderId = d.id');
        return $query->result();
    }


    function getSolicitationSpecific($bidderid) {

        $query = $this->db->query('SELECT * FROM bid b, bidder d WHERE b.BidderId = d.Id and b.Title = '.$bidderid.'');
       // $query = $this->db->query('SELECT DISTINCT(b.BidderId),b.Title,b.SolicitationId,b.Lastname,d.firstname,b.FirstEvalStatus,b.SecondEvalStatus,b.score,b.relativefeescore FROM bid b, bidder d WHERE b.Lastname = '.$bidderid.' and b.BidderId = d.Id and SolicitationId = '.$solId.'');
        return $query->result();
    }

    function getBidderId($bidderid)
     {
        $query = $this->db->query('SELECT * FROM bid WHERE BidderId = '.$bidderid.'');
        return $query->result();
    }

    //function updateScore() 
   // {
     //   $this->db->query("UPDATE bid SET score = '$_POST[score]',SecondEvalStatus = '$_POST[secEval]' WHERE BidderId = '$_POST[BidderId] '");
       
   // }
   function updateScore() {
    $name =$_FILES['file']['name'];
    if(isset($_POST['submit'])){
        $name       = $_FILES['file']['name'];
        $temp_name  = $_FILES['file']['tmp_name'];
        if(isset($name)){
            if(!empty($name)){
                $location = '../Documents/';
                if(move_uploaded_file($temp_name, $location.$name)){
                    echo 'File uploaded successfully';
                }
            }
        }  else {
            echo 'You should select a file to upload !!';
        }
    }



    /*$target = "Documents/";
    //$test = $_POST[documentname];
    //echo $test;
    //$fileName = $_FILES['documentname']['name'];
    //echo $fileName;
    $fileTarget = $target;
    $tempFileName = $_FILES['documentname']['tmp_name'];
    echo $tempFileName;
    $result = move_uploaded_file($tempFileName,$fileTarget);*/

    $this->db->query("UPDATE bid SET score = '$_POST[score]',SecondEvalStatus = '$_POST[secEval]', SEDocPath= 'http://localhost:8888/codeigniter/Documents/', SEDocTitle= ' ' WHERE BidderId = '$_POST[BidderId] '");
    //header("refresh:1; url=BiddersSolicitation");
}
    function getEvaluationSpecific($bidderid,$solId)
    {
        $query = $this->db->query('SELECT DISTINCT(b.BidderId),b.Title,b.SolicitationId,b.Lastname,d.firstname,b.FirstEvalStatus,b.SecondEvalStatus,b.score,b.relativefeescore FROM bid b, bidder d WHERE b.Lastname = '.$bidderid.' and b.BidderId = d.Id and SolicitationId = '.$solId.'');
        return $query->result();
    }

    /*function getSolicitationId($bidderid)
    {
        $query=$this->db->query('select SolicitationId from prebid WHERE BidderId = '.$bidderid. ' LIMIT 1');
        return $query->result();
    }*/

    function updateCheckedBidDocuments()
    {
        $this->db->set('Status','1');
        $this->db->where('id', (int)$_POST['data']);
        $this->db->update('biddocuments');
    }
    function  updateUnCheckedBidDocuments()
    {
        $this->db->set('Status','0');
        $this->db->where('id', (int)$_POST['data']);
        $this->db->update('biddocuments');
    }
    function UpdateFirstEvalStatus()
    {

        $this->db->set('FirstEvalStatus', (string)$_POST[status]);
        $this->db->where('BidderId', (int)$_POST[bidderid])->where('SolicitationId', (string)$_POST[solicitationid]);
        $this->db->update('bid');
    }

    function UpdateFee()
    {
        //Updates Fee
        $this->db->set('fee',$_POST['fee']);
        $this->db->set('FeeComment',$_POST['comments']);
        $this->db->where('BidderId',(int)$_POST[bidderid])->where('SolicitationId', (string)$_POST[solicitationid]);
        $this->db->update('bid');

        //Gets lowestfee
        $this->db->select_min('fee');
        $this->db->where('SolicitationId', (string)$_POST[solicitationid]);
        $lowestfee = $this->db->get('bid');

        //Updates relativefeescore
        $this->db->set('relativefeescore', ($lowestfee->row()->fee * 30 ), false);
        $this->db->where('SolicitationId', (string)$_POST[solicitationid]);
        $this->db->update('bid');

        $this->db->set('relativefeescore', 'relativefeescore/fee', false);
        $this->db->where('SolicitationId', (string)$_POST[solicitationid]);
        $this->db->update('bid');
    }

    function getFeeDocument($bidderid)
    {
        $query=$this->db->query('select * from document d, biddocuments b  WHERE b.BidderId = '.$bidderid.' and b.SolicitationId = "'.$_GET['sid'].'" and b.DocId = d.id and d.dtitle LIKE "%fee%"');
        //$query=$this->db->query('select * from prebid o, biddocuments b, document d WHERE o.BidderId = '.$bidderid.' and d.SolicitationId = "'.$_GET['sid'].'" and o.id = b.prebidId and b.DocId = d.id and d.dtitle LIKE "%fee%"');
        return $query->result();
    }
    function getFeeData($bidderid, $sid)
    {
        $query = $this->db->query('select * from bid where SolicitationId = "'.$sid.'" and BidderId = '.$bidderid);
        return $query->result();
    }
    function SaveMsg()
    {
        //echo $_POST;
        $query = $this->db->query('select * from bid where SolicitationId = "'.$_POST[solicitationId].'" and BidderId = '.$_POST[bidderId]);
        $query = $query->result();
        //subject: subject, body: body, solicitationId: solicitationid, bidderId: bidderid},
        $data = array(
            'bidderid' => $_POST[bidderId],
            'content' => $_POST[body],
            'SolicitationId' => $_POST[solicitationId],
            'sent' => date("Y-m-d h:i:sa")
            // 'senderemail' => $_POST[userId]
        );
        $this->db->insert('message', $data);
    }



    public function getinfo_forupdatebid($id)
    {

        $this->db->select('*');
        $this->db->from('solicitation');
        $this->db->where('id',$id);
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }



    function publishSolicitation()
    {
        $this->db->set('published', '1', false);
        $this->db->where('BidderId',(int)$_POST[bidderid])->where('SolicitationId', (string)$_POST[solicitationid]);
        $this->db->update('bid');
    }

}
?>


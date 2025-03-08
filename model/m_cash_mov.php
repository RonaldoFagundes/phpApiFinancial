<?php


require_once 'conn.php';



class M_Cash_Mov extends Conn
{
  private $conn = "";
  private $pdo = "";

    function __construct()
    {
         $this->conn = new Conn();
         $this->pdo  = $this->conn->pdo();
    }


 

    public function insertCashMov(C_Cash_Mov $cm)
    {     
         $query = " INSERT INTO tb_cash_mov (date_cm, type_cm, category_cm, source_cm, desc_cm, value_cm, fk_trs)
         VALUES( :date, :type, :cat, :source, :desc, :value, :fk  ) ";

         $sql = $this->pdo->prepare($query);
        
         $sql->bindValue(":date",   $cm->getDate());         
         $sql->bindValue(":type",   $cm->getType());
         $sql->bindValue(":cat",    $cm->getCategory());
         $sql->bindValue(":source", $cm->getSource());
         $sql->bindValue(":desc",   $cm->getDesc());
         $sql->bindValue(":value",  $cm->getValue());         
         $sql->bindValue(":fk",     $cm->getFktrs());


         if ( $sql->execute() ) {
          $cm->setMsg("post_cash_mov ".$cm->getSource()." success");
          }else{
          $cm->setMsg("error");             
         }                
    }






    public function selectLastCashMov(C_Cash_Mov $cm):bool
    {
        $query = "SELECT * FROM tb_cash_mov ORDER BY id_cm DESC LIMIT 1" ;

        $sql = $this->pdo->prepare($query);        
        
        $sql->execute();
  
        if ($sql->rowCount() > 0) {
  
          $registration_cm = array();
  
          while ($registration = $sql->fetchAll(PDO::FETCH_ASSOC)) {
               $registration_cm = $registration;
          }
  
          $cm->setList($registration_cm);
          return true;
         
       }else{ 
  
          $cm->setMsg("not found");
          return false; 
       }
  
    }







}  
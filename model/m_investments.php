<?php

require_once 'conn.php';


class M_Investments extends Conn
{

  private $conn = "";
  private $pdo = "";


    function __construct()
    {
         $this->conn = new Conn();
         $this->pdo  = $this->conn->pdo();
    }



    

    public function insertInvestments(C_Investments $ci)
    {     

         $query = "INSERT INTO tb_transactions (mov_trs, date_trs, type_trs, source_trs, form_trs, desc_trs, value_trs, fk_bac)
         VALUES( :mov, :date, :type, :source, :form, :desc, :value, :fk ) ";
     
         $sql = $this->pdo->prepare($query);
              
         $sql->bindValue(":mov",    $ctr->getMov());
         $sql->bindValue(":date",   $ctr->getDate());         
         $sql->bindValue(":type",   $ctr->getType());
         $sql->bindValue(":source", $ctr->getSource());
         $sql->bindValue(":form",   $ctr->getForm());
         $sql->bindValue(":desc",   $ctr->getDesc());
         $sql->bindValue(":value",  $ctr->getValue());
         $sql->bindValue(":fk",     $ctr->getFkac());

         if ( $sql->execute() ) {
          $ctr->setMsg(" transactions ".$ctr->getType()." success ");
          }else{
          $ctr->setMsg("error");             
         } 

    }





    public function selectLastInvestment(C_Investments $ci):bool
    {
        $query = "SELECT * FROM tb_transactions WHERE fk_bac=:fkac ORDER BY id_trs DESC LIMIT 1" ;

        $sql = $this->pdo->prepare($query); 
        $sql->bindValue(":fkac",$ctr->getFkac());
        
        $sql->execute();
  
        if ($sql->rowCount() > 0) {
  
          $registration_trs = array();
  
          while ($registration = $sql->fetchAll(PDO::FETCH_ASSOC)) {
               $registration_trs = $registration;
          }
  
          $ctr->setList($registration_trs);
          return true;
         
       }else{ 
  
          $ctr->setMsg("not found");
          return false; 
       }
  
    }






}




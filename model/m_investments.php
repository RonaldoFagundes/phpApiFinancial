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

         $query = "INSERT INTO tb_investments (broker_name_ivt, cat_ivt, type_ivt, open_ivt, expery_ivt, rate_type_ivt, rate_ivt, value_ivt, desc_ivt, status_ivt, fk_bka)
         VALUES(:broker, :cat, :type, :open, :expery, :rateType, :rate, :value, :desc, :status, :fk ) ";
     
         $sql = $this->pdo->prepare($query);

          
         $sql->bindValue(":broker",   $ci->getBroker());
         $sql->bindValue(":cat",      $ci->getCat());         
         $sql->bindValue(":type",     $ci->getType());
         $sql->bindValue(":open",     $ci->getOpen());
         $sql->bindValue(":expery",   $ci->getExpery());
         $sql->bindValue(":rateType", $ci->getRateType());
         $sql->bindValue(":rate",     $ci->getRate());
         $sql->bindValue(":value",    $ci->getValue());
         $sql->bindValue(":desc",     $ci->getDesc());
         $sql->bindValue(":status",   $ci->getStatus());
         $sql->bindValue(":fk",       $ci->getFkac());
         
       

         if ( $sql->execute() ) {
          $ci->setMsg(" transactions ".$ci->getType()." success ");
          }else{
          $ci->setMsg("error");             
         } 

    }












    public function selectInvestmentsByAccount(C_Investments $ci):bool
  {
         $query = "SELECT
                   tb_investments.id_ivt ,
                   tb_investments.broker_name_ivt, 
                   tb_investments.cat_ivt ,
                   tb_investments.type_ivt ,
                   tb_investments.open_ivt ,
                   tb_investments.expery_ivt ,
                   tb_investments.rate_type_ivt ,
                   tb_investments.rate_ivt,
                   tb_investments.value_ivt ,
                   tb_investments.desc_ivt ,
                   tb_investments.fk_bka  
                   FROM tb_investments 
                   INNER JOIN tb_bank_account ON (id_bka = fk_bka ) WHERE tb_bank_account.id_bka = :fkac";
        
         $sql = $this->pdo->prepare($query);
         $sql->bindValue(':fkac', $ci->getFkac());               
         $sql->execute();

      if ($sql->rowCount() > 0) {

          $list_investments = array();
  
          while ($investments = $sql->fetchAll(PDO::FETCH_ASSOC)) {
               $list_investments = $investments;
          }
  
          $ci->setList($list_investments);
          return true;
         
      }else{   
          $ci->setMsg("not found");
          return false; 
       }

  }






    public function selectLastInvestment(C_Investments $ci):bool
    {
        $query = "SELECT * FROM tb_investments WHERE fk_bka =:fkac ORDER BY id_ivt DESC LIMIT 1" ;

        $sql = $this->pdo->prepare($query); 
        $sql->bindValue(":fkac",$ci->getFkac());
        
        $sql->execute();
  
        if ($sql->rowCount() > 0) {
  
          $registration_inv = array();
  
          while ($registration = $sql->fetchAll(PDO::FETCH_ASSOC)) {
               $registration_inv = $registration;
          }
  
          $ci->setList($registration_inv);
          return true;
         
       }else{ 
  
          $ci->setMsg("not found");
          return false; 
       }
  
    }






}




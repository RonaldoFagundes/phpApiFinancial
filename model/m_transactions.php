<?php


require_once 'conn.php';

class M_Transactions extends Conn


{
  private $conn = "";
  private $pdo = "";

    function __construct()
    {
         $this->conn = new Conn();
         $this->pdo  = $this->conn->pdo();
    }



    public function insertTransactions(C_Transactions $ctr)
    {     

         $query = " INSERT INTO tb_transactions (mov_trs, date_trs, type_trs, source_trs, form_trs, desc_trs,  value_trs, fk_bac)
         VALUES( :shop, :date, :user, :parcel, :value, :desc, :expery, :fk  ) ";
         $sql = $this->pdo->prepare($query);
              
         $sql->bindValue(":shop",   $cpcc->getPlaceShop());
         $sql->bindValue(":date",   $cpcc->getDate());         
         $sql->bindValue(":user",   $cpcc->getUser());
         $sql->bindValue(":parcel", $cpcc->getParcel());
         $sql->bindValue(":value",  $cpcc->getValue());
         $sql->bindValue(":desc",   $cpcc->getDesc());
         $sql->bindValue(":expery", $cpcc->getExpery());
         $sql->bindValue(":fk",     $cpcc->getFkcc());

         if ( $sql->execute() ) {
          $cpcc->setMsg("success");
          }else{
          $cpcc->setMsg("error");             
         } 


       if($cpcc->getInOut() == true){
          
          $query = " INSERT INTO tb_transactions (mov_trs, date_trs, type_trs, source_trs, form_trs, desc_trs,  value_trs, fk_bac)
          VALUES( in , :date, :user, :parcel, :value, :desc, :expery, :fk  ) ";
          $sql = $this->pdo->prepare($query);
               
          $sql->bindValue(":shop",   $cpcc->getPlaceShop());
          $sql->bindValue(":date",   $cpcc->getDate());         
          $sql->bindValue(":user",   $cpcc->getUser());
          $sql->bindValue(":parcel", $cpcc->getParcel());
          $sql->bindValue(":value",  $cpcc->getValue());
          $sql->bindValue(":desc",   $cpcc->getDesc());
          $sql->bindValue(":expery", $cpcc->getExpery());
          $sql->bindValue(":fk",     $cpcc->getFkcc());
 
          if ( $sql->execute() ) {
           $cpcc->setMsg("success");
           }else{
           $cpcc->setMsg("error");             
          } 

       }



    }




}


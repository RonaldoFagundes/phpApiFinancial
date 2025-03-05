<?php

include 'controller/c_transactions.php';
include 'model/m_transactions.php';



 class S_Transactions {

    private $c_trs = "";
    private $m_trs = "";  



    function __construct()
    {
        $this->c_trs = new C_Transactions();
        $this->m_trs = new M_Transactions();
    }




    public function transactionsData($data)
    {  
        $this->c_trs->setMov($data['transaction']['move']);     
        $this->c_trs->setDate($data['transaction']['date']);
        $this->c_trs->setType($data['transaction']['type']);      
        $this->c_trs->setSource($data['transaction']['source']);    
        $this->c_trs->setForm($data['transaction']['form']); 
        $this->c_trs->setDesc($data['transaction']['desc']);   
        $this->c_trs->setValue($data['transaction']['value']);
        $this->c_trs->setFkac($data['transaction']['idac']); 
        
              
        if ( $data['transaction']['type'] == "saque" ) {
          
              return " return ".$data['transaction']['type']." chamar metodo cash ";

        }else{

            $this->m_trs->insertTransactions($this->c_trs);    
            return  $this->c_trs->getMsg();  
        }
        

        /*
        if( $data['transaction']['idacf'] != 0 ){          
             return " return ".$data['transaction']['idacf']." chamar metodo in e out ";
        }else{
            return " return ".$data['transaction']['idacf'] ;
        }
         */

    }




    public function proofTransaction($id)
    {  
      $this->c_trs->setId($id);
       
      if ( $this->m_trs->selectLastTransaction($this->c_trs) ) {
          return $this->c_trs->getList();
      }else{
          return $this->c_trs->getMsg();
      }
   
   }

    
    
 }    
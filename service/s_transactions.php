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
       
       
        if ( $data['transaction']['type'] == "saque" ) {
          
              return " return ".$data['transaction']['type']." chamar metodo cash ";

        }else{

             return " return ".$data['transaction']['type'];
        }
        


        /*
        if( $data['transaction']['idacf'] != 0 ){
          
             return " return ".$data['transaction']['idacf']." chamar metodo in e out ";
              
        }else{

            return " return ".$data['transaction']['idacf'] ;

        }
         */

    }
    
    
 }    
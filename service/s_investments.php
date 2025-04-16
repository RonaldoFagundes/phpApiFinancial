<?php

include 'controller/c_investments.php';
include 'model/m_investments.php';



class S_Investments {

    private $c_inv = "";
    private $m_inv = "";  

   

    function __construct()
    {
        $this->c_inv = new C_Investments();
        $this->m_inv = new M_Investments();
    }






    public function investmentsData($data)
    {  

        return $data;

          /*
        $this->c_trs->seBroker($data['investments']['broker']);     
        $this->c_trs->setCat($data['investments']['cat']);
        $this->c_trs->setType($data['investments']['type']);      
        $this->c_trs->setOpen($data['investments']['open']);    
        $this->c_trs->setRateType($data['investments']['rateType']); 
        $this->c_trs->setRate($data['investments']['rate']);   
        $this->c_trs->setAmount($data['investments']['amount']);
        $this->c_trs->setDesc($data['investments']['desc']); 
        $this->c_trs->setIdac($data['investments']['idac']);         
          */
    }
    
    








}
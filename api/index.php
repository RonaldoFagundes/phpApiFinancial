<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
header("Content-Type: application/json; charset=utf-8");

$data = json_decode(file_get_contents('php://input'), true);



if ($_GET['action'] === 'listBank'){
    
 
  $bancs=[
      [
        "id_bnk"=> 1 ,
        "number_bnk"=> "104",
        "name_bnk"=> "Caixa Econômica Federal",
        "ein_bnk"=> "00.360.305/0001-04",
        "contact_bnk"=> "https://www.caixa.gov.br",
        "desc_bnk"=> "Banco Múltiplo",
        "img_bnk"=> "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"
     ],

     [
    "id_bnk"=> 2,
    "number_bnk"=> "033",
    "name_bnk"=> "Banco Santander",
    "ein_bnk"=> "90.400.888/0001-42",
    "contact_bnk"=> "https://www.santander.com.br",
    "desc_bnk"=> "Banco Múltiplo",
    "img_bnk"=> "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"
     ],  

     [
         "id_bnk"=> 3,
         "number_bnk"=> "237",
    "name_bnk"=> "Banco Bradesco S.A",
    "ein_bnk"=> "60.746.948/0001-12",
    "contact_bnk"=> "https://banco.bradesco",
    "desc_bnk"=> "Banco Múltiplo",
    "img_bnk"=>"",
     ]

    ];
   


    $json_string = json_encode($bancs); 
    echo $json_string;

     

     
}else if ($_GET['action'] === 'cadBank'){

    $array_bank = [
      $data['bank']['number'],  
      $data['bank']['name'],  
      $data['bank']['ein'],  
      $data['bank']['contact'],
      $data['bank']['desc'],
      $data['bank']['base64'],
    ];

    echo json_encode($data);
}





/*
define('ROOT_PATH', dirname(__FILE__));


include 'service/s_user.php';
include 'service/s_bank.php';
include 'service/s_account.php';
include 'service/s_credit_card.php';
include 'service/s_post_credit_card.php';
include 'service/s_transactions.php';
include 'service/s_cash_mov.php';
include 'service/s_investments.php';

$s_user    = new S_User();
$s_bank    = new S_Bank();
$s_account = new S_Account();
$s_cc      = new S_Credit_Card();
$s_pcc     = new S_Post_Credit_Card();
$s_t       = new S_Transactions();
$s_cm      = new S_Cash_Mov();
$s_inv     = new S_Investments();


//$response_json = file_get_contents("php://input");
//$data = json_decode($response_json, true);

 
//$data = json_decode(file_get_contents('php://input'));
$data = json_decode(file_get_contents('php://input'), true);

if ($_GET['action'] === 'cadUser') {
	
      $array_user = [
          $data['user']['name'],  
          $data['user']['email'],  
          $data['user']['password'],  
          $data['user']['profile'],
    ];
    
    echo json_encode($s_user->cadUserData($data)); 

}else if ($_GET['action'] === 'users'){

    echo json_encode($s_user->listUsers());

}else if ($_GET['action'] === 'cadBank'){

    $array_bank = [
      $data['bank']['number'],  
      $data['bank']['name'],  
      $data['bank']['ein'],  
      $data['bank']['contact'],
      $data['bank']['desc'],
      $data['bank']['base64'],
    ];

    echo json_encode($s_bank->cadBankData($data));

}else if ($_GET['action'] === 'listBank'){

    echo json_encode($s_bank->listBank());  

}else if ($_GET['action'] === 'updateBank'){

    $array_bank = [
        $data['bank']['id'],
        $data['bank']['number'],  
        $data['bank']['name'],  
        $data['bank']['ein'],  
        $data['bank']['contact'],
        $data['bank']['desc'],
        $data['bank']['base64'],
      ];
  
    echo json_encode($s_bank->updateBankData($data));

} else if ($_GET['action'] === 'deleteBank') { 

    $id = $data['id'];     
    echo json_encode($s_bank->deleteBank($id));

}else if ($_GET['action'] === 'cadAccount'){
   
    $array_account = [
      $data['account']['number'],  
      $data['account']['type'],  
      $data['account']['open'],  
      $data['account']['desc'],
      $data['account']['amount'],
      $data['account']['fkbnk'],
    ];

    echo json_encode($s_account->cadAccountData($data));

}else if ($_GET['action'] === 'listAccount'){

    echo json_encode($s_account->listAccount());

}else if ($_GET['action'] === 'listAccountById'){

    $id = $data['id'];
    echo json_encode($s_account->listAccountById($id));

}else if ($_GET['action'] === 'listAccountByBank'){

    $idBank = $data['idBank'];  
    echo json_encode($s_account->listAccountByBank($idBank));
//
}else if ($_GET['action'] === 'listAccountByBank'){  
    $idBank = $_GET['idBank'];     
    echo json_encode($s_account->listAccountByBank($idBank));
//

}else if ($_GET['action'] === 'listAccountByBankIgnoreId'){

    $array_account = [
        $data['surchAccount']['id'],
        $data['surchAccount']['fkbnk'],
      ];

    echo json_encode($s_account->listAccountByBankIgnoreId($data));     
    
}else if ($_GET['action'] === 'listAccountType'){

   echo json_encode($s_account->listAccountType());

}else if ($_GET['action'] === 'amountAccountById'){

    $id = $data['id'];
    echo json_encode($s_account->getAmountById($id));   

}else if ($_GET['action'] === 'updateAccount'){
   
    $array_account = [
      $data['account']['id'],  
      $data['account']['number'],
      $data['account']['type'],  
      $data['account']['open'],  
      $data['account']['desc'],
      $data['account']['amount'],
      $data['account']['fkbnk'],
    ];

    echo json_encode($s_account->updateAccountData($data));

}else if ($_GET['action'] === 'deleteAccount') { 

      //  $id = $data['id'];     
    echo json_encode("not exist"); 
        
}else if ($_GET['action'] === 'cadCreditCard'){
   
        $array_cadCreditCard = [
          $data['cadCreditCard']['number'],
          $data['cadCreditCard']['type'],  
          $data['cadCreditCard']['format'],  
          $data['cadCreditCard']['desc'],
          $data['cadCreditCard']['fromDate'],
          $data['cadCreditCard']['expiry'],
          $data['cadCreditCard']['due'],
          $data['cadCreditCard']['limit'],
          $data['cadCreditCard']['idac'],
        ];
    
    echo json_encode($s_cc->cadCreditCardData($data)); 

}else if ($_GET['action'] === 'updateCreditCard'){
   
    $array_cadCreditCard = [
      $data['cadCreditCard']['id'],
      $data['cadCreditCard']['number'],
      $data['cadCreditCard']['type'],  
      $data['cadCreditCard']['format'],  
      $data['cadCreditCard']['desc'],
      $data['cadCreditCard']['fromDate'],
      $data['cadCreditCard']['expiry'],
      $data['cadCreditCard']['due'],
      $data['cadCreditCard']['limit'],
      $data['cadCreditCard']['idac'],
    ];

    echo json_encode($s_cc->cadCreditCardData($data)); 
    
}else if ($_GET['action'] === 'creditCardByAccount'){

    $id = $data['id']; 
    echo json_encode($s_cc->listCreditCardByAccount($id));         

}else if ($_GET['action'] === 'postCreditCard') {

        $array_post_creditCard = [                 
              $data['postCreditCard']['placeshop'],
              $data['postCreditCard']['date'],
              $data['postCreditCard']['user'],
              $data['postCreditCard']['parcel'],
              $data['postCreditCard']['value'],
              $data['postCreditCard']['desc'],
              $data['postCreditCard']['expery'],
              $data['postCreditCard']['fkcc'],
        ];
        // echo json_encode($dados['creditCard']['type']);
        //echo json_encode($creditCard);
    echo json_encode($s_pcc->postCreditCardData($data));


}else if ($_GET['action'] === 'proofPostCreditCard') {

    $fkac = $data['fkac']; 
    echo json_encode($s_pcc->proofPostCreditCard($fkac));

  
} else if ($_GET['action'] === 'listPostByCreditCard') {

        //$id = $data['id'];     
        $array_surch = [                 
           // $data['surch']['fkcc'],
            $data['surch']['fkac'],            
            $data['surch']['due'],
            $data['surch']['date'],           
        ];
        echo json_encode($s_pcc->listPostsByCreditCardAll($data)); 
       // echo json_encode($id);

} else if ($_GET['action'] === 'listPostByCreditCardUser') {

        $array_surch = [                 
           // $data['surch']['fkcc'],
            $data['surch']['fkac'],            
            $data['surch']['due'],                      
            $data['surch']['date'],           
            $data['surch']['user'],
        ];

       echo json_encode($s_pcc->listPostsByCreditCardUser($data));    
             
}else if ($_GET['action'] === 'listUsers') {

        $id = $data['id'];     
        echo json_encode($s_pcc->listUsersData($id)); 
       // echo json_encode($id);
  
}else if ($_GET['action'] === 'amountCreditCard') {
       
      // $id = $data['id'];   
       $array_surch = [ 
        $data['surch']['fkac'],            
        $data['surch']['due'],
        $data['surch']['date'],                     
    ];  
       echo json_encode($s_pcc->amountData($data));

}else if ($_GET['action'] === 'amountCreditCardByUser') {
       
    $array_surch = [                
        $data['surch']['fkac'],            
        $data['surch']['due'],                      
        $data['surch']['date'],           
        $data['surch']['user'],
    ];
      echo json_encode($s_pcc->amountDataByUser($data));   
  
}else if ($_GET['action'] === 'deletePostCreditCard') {
       
        $creditCard = [
              $data['creditCard']['id']
        ];
        echo json_encode($ccps->deletePost($data)); 
         
     
}else if ($_GET['action'] === 'postTransaction') {  
        
    $array_transaction = [                 
        $data['transaction']['move'],
        $data['transaction']['date'],
        $data['transaction']['type'],
        $data['transaction']['source'],
        $data['transaction']['form'],
        $data['transaction']['desc'],
        $data['transaction']['valuet'],
        $data['transaction']['account'],
        $data['transaction']['number'],
        $data['transaction']['idac'],        
  ];

   //  echo json_encode($array_transaction);
    echo json_encode($s_t->transactionsData($data));

}else if ($_GET['action'] === 'proofTransaction') {
    
    $fkac = $data['fkac'];
    echo json_encode($s_t->proofTransaction($fkac));

}else if ($_GET['action'] === 'postCashMov') {
    
    $array_cashMov = [                 
        $data['cashMov']['date'],
        $data['cashMov']['type'],
        $data['cashMov']['source'],        
        $data['cashMov']['category'],
        $data['cashMov']['desc'],
        $data['cashMov']['value'],
        $data['cashMov']['fktrs'],        
  ];

    echo json_encode($s_cm->postCashMovData($data));

}else if ($_GET['action'] === 'proofCashMov') {    
   
    echo json_encode($s_cm->proofCashMov());

}else if ($_GET['action'] === 'cashAmount') {    
   
    echo json_encode($s_cm->cashAmount());

}else if ($_GET['action'] === 'postInvestments') { 
  
    $array_investments = [                 
        $data['investments']['move'],
        $data['investments']['trans'],
        $data['investments']['form'],
        $data['investments']['broker'],
        $data['investments']['cat'],
        $data['investments']['type'],
        $data['investments']['open'],        
        $data['investments']['expery'],
        $data['investments']['rate_type'],
        $data['investments']['rate'],
        $data['investments']['valuei'],
        $data['investments']['desc'],        
        $data['investments']['idac'],        
  ];

    echo json_encode($s_inv->investmentsData($data));

}else if ($_GET['action'] === 'proofInvestment') {    
   
    $fkac = $data['fkac'];
    echo json_encode($s_inv->proofInvestment($fkac));

}else if ($_GET['action'] === 'listInvestmentsByAc'){

    $idac = $data['idac'];  
    echo json_encode($s_inv->listInvestmentsByAc($idac));

}else if ($_GET['action'] === 'postRescue') { 
  
    $array_investments = [                 
        $data['investments']['move'],
        $data['investments']['trans'],
        $data['investments']['form'],
        $data['investments']['broker'],
       // $data['investments']['cat'],
       // $data['investments']['type'],
       // $data['investments']['open'],        
       // $data['investments']['expery'],
        $data['investments']['date'],
       // $data['investments']['rate_type'],
       // $data['investments']['rate'],        
        $data['investments']['valuei'],
        $data['investments']['valuet'],
        $data['investments']['rate_value'],
        $data['investments']['desc'],        
       // $data['investments']['status'],
        $data['investments']['idac'],        
        $data['investments']['id'],
  ];

    echo json_encode($s_inv->investmentsData($data));

}else if ($_GET['action'] === 'proofRescue') {    
     
    $id = $data['id'];       
    echo json_encode($s_inv->proofRescue($id));

}else if ($_GET['action'] === 'postRendimentos') { 
  
    
    $array_profitability = [                 
        $data['profitability']['id'],
        $data['profitability']['value'],         
        $data['profitability']['date'],    
    ];
   
  
   // $array_profitability = [ $data['profitability']];  

    echo json_encode($s_inv->postRendimentos($data['profitability']));
   // echo json_encode($s_inv->postRendimentos($array_investments, $data));

}else if ($_GET['action'] === 'amountProfitability'){

    $id = $data['id'];
    echo json_encode($s_inv->getAmountProfitability($id));  

}else if ($_GET['action'] === 'conect'){

      $res = http_response_code(200);
      echo json_encode($res);

}else if ($_GET['action'] === 'test'){
      echo json_encode("api working!!!"); 
}










/*

  $creditCard = [
      $dados['cadCreditCard']['number'],  
      ];
       //echo json_encode($dados['creditCard']['type']);
         echo json_encode($ccs->cadCreditCardData($dados));
       //echo json_encode($creditCard); 

 $creditCard= [  
 
      'number' => $_POST['number'],
      'type' => $_POST['type'],
      'desc' => $_POST['desc'],
      'date' => $_POST['date'],
      'user' => $_POST['user'],      
      'parcel' => $_POST['parcel'],
      'value' => $_POST['value'],
     
 ];
      echo json_encode($creditCard);
*/








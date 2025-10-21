<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
header("Content-Type: application/json; charset=utf-8");

$data = json_decode(file_get_contents('php://input'), true);



if ($_GET['action'] === 'listBank'){

    $bancs = [
     "id_bnk"=> 1 ,
    "number_bnk"=> "104",
    "name_bnk"=> "Caixa Econômica Federal",
    "ein_bnk"=> "00.360.305/0001-04",
    "contact_bnk"=> "https://www.caixa.gov.br",
    "desc_bnk"=> "Banco Múltiplo",
    "img_bnk"=> "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"
    ];

    echo json_encode($bancs); 

     
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








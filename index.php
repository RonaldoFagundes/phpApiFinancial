<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
header("Content-Type: application/json; charset=utf-8");


include 'service/s_user.php';
include 'service/s_bank.php';
include 'service/s_account.php';
include 'service/s_credit_card.php';
include 'service/s_post_credit_card.php';
include 'service/s_transactions.php';


$s_user    = new S_User();
$s_bank    = new S_Bank();
$s_account = new S_Account();
$s_cc      = new S_Credit_Card();
$s_pcc     = new S_Post_Credit_Card();
$s_t       = new S_Transactions();



$response_json = file_get_contents("php://input");
$data = json_decode($response_json, true);

if ($_GET['action'] === 'cadUser') {
	
      $array_user = [
          $data['user']['name'],  
          $data['user']['email'],  
          $data['user']['password'],  
          $data['user']['profile'],
    ];
    
    echo json_encode($s_user->cadUserData($data)); 

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


}else if ($_GET['action'] === 'listAccountByBankIgnoreId'){

    $array_account = [
        $data['surchAccount']['id'],
        $data['surchAccount']['fkbnk'],
      ];

    echo json_encode($s_account->listAccountByBankIgnoreId($data));    


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

       /*
        $creditCard = [
              $data['creditCard']['id']
        ];
        echo json_encode($ccps->deletePost($data));    
       */ 
      
}else if ($_GET['action'] === 'postTransaction') {  
        
    $array_transaction = [                 
        $data['transaction']['move'],
        $data['transaction']['date'],
        $data['transaction']['type'],
        $data['transaction']['source'],
        $data['transaction']['form'],
        $data['transaction']['desc'],
        $data['transaction']['value'],
        $data['transaction']['idac'],        
  ];

   //  echo json_encode($array_transaction);

    echo json_encode($s_t->transactionsData($data));

}else if ($_GET['action'] === 'proofTransaction') {
    
    $id = $data['id'];
    echo json_encode($s_t->proofTransaction($id));

}else if ($_GET['action'] === 'conect'){

      $res = http_response_code(200);
      echo json_encode($res);
}

   








/*

  $creditCard = [
            $dados['cadCreditCard']['number'],  
      ];
      // echo json_encode($dados['creditCard']['type']);
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








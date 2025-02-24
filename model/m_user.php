<?php


require_once 'conn.php';

class M_User extends Conn
{
  private $conn = "";
  private $pdo = "";

    function __construct()
    {
         $this->conn = new Conn();
         $this->pdo = $this->conn->pdo();
    }

    
    public function insertUser( C_User $c_user)
    {  
     $query = "INSERT INTO tb_users (name_use, email_use, password_use , profile_use) VALUES(:name, :email, :pass, :prof)";
     $sql = $this->pdo->prepare($query);      
     $sql->bindValue(':name',   $c_user->getName() );
     $sql->bindValue(':email',  $c_user->getEmail() );
     $sql->bindValue(':pass',   $c_user->getPassword() );
     $sql->bindValue(':prof',   $c_user->getProfile() );

          if ( $sql->execute() ) {
              $c_user->setMsg("success");
            } else {
              $c_user->setMsg("error");             
          }

    }


  
 

}
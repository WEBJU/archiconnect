<?php
  /**
   *
   */
  class Users
  {
    // database connection and table name
    private $conn;
    private $table_name="users";

    //object properties
    public $id;
    public $name;
    public $email;
    public $contact;
    public $password;
    public $role;
    public $username;
    public function __construct($db)
    {
       $this->conn=$db;
    }

    function login($username,$password){
      try {
        $query="SELECT id FROM users WHERE username=:username AND password=:password";
        $stmt=$this->conn->prepare($query);

        //posted values
        // $this->username=htmlspecialchars(strip_tags($this->username));
        // $this->password=htmlspecialchars(strip_tags($this->password));

        //bind values
        $stmt->bindParam(":username",$this->username);
        $ency_pass=hash('sha256',$this->password);
        $stmt->bindParam(":password",$ency_pass);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
          $result=$stmt->fetch(PDO::FETCH_OBJ);
          return $result->id;
          // $_SESSION['loggedIn']=true;
          // $_SESSION['username']=$result['name'];
          // return true;
        }else {
          return false;
        }
      } catch (\Exception $e) {
        exit($e->getMessage());
      }
    }

    function selectAll(){
      $query="SELECT * FROM " .$this->table_name."";
      $stmt=$this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    function register(){
      $query="INSERT INTO users(name,email,contact,role,username,password) VALUES(:name,:email,:contact,:role,:username,:password)";
      $stmt=$this->conn->prepare($query);

      //posted values
      $this->name=htmlspecialchars(strip_tags($this->name));
      $this->email=htmlspecialchars(strip_tags($this->email));
      $this->contact=htmlspecialchars(strip_tags($this->contact));
      $this->role=htmlspecialchars(strip_tags($this->role));
      $this->username=htmlspecialchars(strip_tags($this->username));
      $this->password=htmlspecialchars(strip_tags($this->password));
      // $new_password=password_hash($this->password,PASSWORD_DEFAULT);
        $new_password=hash('sha256',$this->password);
      //bind values
      $stmt->bindParam(":name",$this->name);
      $stmt->bindParam(":email",$this->email);
      $stmt->bindParam(":contact",$this->contact);
      $stmt->bindParam(":role",$this->role);
      $stmt->bindParam(":username",$this->username);
      $stmt->bindParam(":password",$new_password);

      if ($stmt->execute()) {
        return true;
      }else {
        return false;
      }
    }

    function isUsername($username){
      try {
        $query="SELECT * FROM users WHERE username=:username";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(":username",$this->username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          return true;
        }else {
          return false;
        }
      } catch (Exception $e) {
        echo "Error occured".$e->getMessage();
      }
    }
    function isEmail($username){
      try {
        $query="SELECT * FROM users WHERE email=:email";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(":email",$this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          return true;
        }else {
          return false;
        }
      } catch (Exception $e) {
        echo "Error occured".$e->getMessage();
      }
    }
    function isLoggedIn(){
      if (isset($_SESSION['username'])) {
          return true;
      }
    }
    function redirect(){
      echo "<script>document.location='index.php'</script>";
    }

    function logout(){
      session_destroy();
      unset($_SESSION['username']);
      return true;
    }
     function userDetails($user_id){
      try {
          $query="SELECT * FROM users WHERE id=:id";
          $stmt=$this->conn->prepare($query);
          $stmt->bindParam(":id",$user_id);
          $stmt->execute();
          // var_dump($stmt->fetch(PDO::FETCH_OBJ)).exit();
          if ($stmt->rowCount() > 0) {
              return $stmt->fetch(PDO::FETCH_OBJ);
          }else {
            return false;
          }
      } catch (\Exception $e) {
        exit($e->getMessage());
      }

    }
    function architects(){
     try {
         $query="SELECT * FROM users INNER JOIN sample_designs ON users.id=sample_designs.user_id WHERE users.role='Architect'";
         $stmt=$this->conn->prepare($query);
         // $stmt->bindParam(":id",$user_id);
         $stmt->execute();
         // var_dump($stmt->fetch(PDO::FETCH_OBJ)).exit();

        return $stmt;
     } catch (\Exception $e) {
       exit($e->getMessage());
     }

   }
  }


 ?>

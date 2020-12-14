<?php
/**
 *
 */
class Clients
{
  //database connection
  private $conn;

  //object properties
  public $id;
  public $user_id;
  public $building_type;
  public $budget;
  public $location;
  public $description;
  public $starting_date;
  public $expected_completion;

  public function __construct($db)
  {
    $this->conn=$db;
  }
  // add specification
  public function addSpecification(){

    $query="INSERT INTO client_specifications(user_id,building_type,budget,location,description,starting_date,expected_completion) VALUES(:user_id,:building_type,:budget,:location,:description,:starting_date,:expected_completion)";
    $stmt=$this->conn->prepare($query);
    // var_dump($this->conn->prepare($query));
    //posted values
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
    $this->building_type=htmlspecialchars(strip_tags($this->building_type));
    $this->budget=htmlspecialchars(strip_tags($this->budget));
    $this->location=htmlspecialchars(strip_tags($this->location));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->starting_date=htmlspecialchars(strip_tags($this->starting_date));
    $this->expected_completion=htmlspecialchars(strip_tags($this->expected_completion));
    // $new_password=password_hash($this->password,PASSWORD_DEFAULT);
      // $new_password=hash('sha256',$this->password);
    //bind values
    $stmt->bindParam(":user_id",$this->user_id);
    $stmt->bindParam(":building_type",$this->building_type);
    $stmt->bindParam(":budget",$this->budget);
    $stmt->bindParam(":location",$this->location);
    $stmt->bindParam(":description",$this->description);
    $stmt->bindParam(":starting_date",$this->starting_date);
    $stmt->bindParam(":expected_completion",$this->expected_completion);

    // var_dump($stmt).exit;
    if ($stmt->execute()) {
      return true;
    }else {
      return false;
    }
  }
  function viewSpecifications($user_id){
   try {
       $query="SELECT * FROM client_specifications WHERE user_id=:user_id";
       $stmt=$this->conn->prepare($query);
       $stmt->bindParam(":user_id",$user_id);
       $stmt->execute();
       return $stmt;

   }catch (\Exception $e) {
     exit($e->getMessage());
   }

 }
}




 ?>

<?php
/**
 *
 */
class Architects
{
  //database connection
  private $conn;

  //object properties portfolio
  public $id;
  public $user_id;
  public $specialization;
  public $rate;
  public $experience;
  public $description;
  public $availability;

  //object properties
  public $title;
  public $sample_description;
  public $image;
  public $date_designed;

  public function __construct($db)
  {
    $this->conn=$db;
  }
  // add specification
  public function addPortfolio(){

    $query="INSERT INTO architect_portfolio(user_id,specialization,experience,availability_status,rate,title_description) VALUES(:user_id,:specialization,:experience,:availability_status,:rate,:title_description)";
    $stmt=$this->conn->prepare($query);
    // var_dump($this->conn->prepare($query));
    //posted values
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
    $this->specialization=htmlspecialchars(strip_tags($this->specialization));
    $this->experience=htmlspecialchars(strip_tags($this->experience));
    $this->availability=htmlspecialchars(strip_tags($this->availability));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->rate=htmlspecialchars(strip_tags($this->rate));

    //bind values
    $stmt->bindParam(":user_id",$this->user_id);
    $stmt->bindParam(":specialization",$this->specialization);
    $stmt->bindParam(":experience",$this->experience);
    $stmt->bindParam(":availability_status",$this->availability);
    $stmt->bindParam(":rate",$this->rate);
    $stmt->bindParam(":title_description",$this->description);

    // var_dump($stmt->execute()).exit;
    if ($stmt->execute()) {
      return true;
    }else {
      return false;
    }
  }
  public function addSampleDesign(){

    $query="INSERT INTO sample_designs(user_id,title,description,image,date_designed) VALUES(:user_id,:title,:description,:image,:date_designed)";
    $stmt=$this->conn->prepare($query);
    // var_dump($this->conn->prepare($query));
    //posted values
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->sample_description=htmlspecialchars(strip_tags($this->sample_description));
    $this->image=htmlspecialchars(strip_tags($this->image));
    $this->date_designed=htmlspecialchars(strip_tags($this->date_designed));


    //bind values
    $stmt->bindParam(":user_id",$this->user_id);
    $stmt->bindParam(":title",$this->title);
    $stmt->bindParam(":description",$this->sample_description);
    $stmt->bindParam(":image",$this->image);
    $stmt->bindParam(":date_designed",$this->date_designed);

    // var_dump($stmt->execute()).exit;
    if ($stmt->execute()) {
      return true;
    }else {
      return false;
    }
  }
}




 ?>

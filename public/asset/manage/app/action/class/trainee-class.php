<?php include_once 'db-connect.php'; ?>
<?php 
class Trainee extends Database{


//Get All event report....
public function get_trainee_report()
{
    $stmt = $this->con->prepare("SELECT id,district, COUNT(id) AS total FROM trainees GROUP BY district ASC");
    $stmt->execute(); 
    return $stmt;
}    

//Get All event list....
public function get_event_list()
{
    $stmt = $this->con->prepare("SELECT * FROM events ORDER BY id DESC");
    $stmt->execute(); 
    return $stmt;
}

















 }
?>
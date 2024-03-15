<?php include_once 'db-connect.php'; ?>
<?php 
class Application extends Database{

//Get training appliaction list....
public function get_training_application()
{
    $stmt = $this->con->prepare("SELECT * FROM training_application ORDER BY id DESC LIMIT 500");
    $stmt->execute();  
    return $stmt;
}

//Get training appliaction list....
public function get_district_training_application($district)
{
    $stmt = $this->con->prepare("SELECT * FROM training_application WHERE district=:district ORDER BY id");
    $stmt->execute(array(':district' =>$district));
    return $stmt;
}
  

//Get ev application list....
public function get_ev_application()
{
    $stmt = $this->con->prepare("SELECT * FROM ev_application ORDER BY id DESC LIMIT 500");
    $stmt->execute();  
    return $stmt;
}

//Get ev application list....
public function get_district_ev_application($district)
{
    $stmt = $this->con->prepare("SELECT * FROM ev_application WHERE district=:district ORDER BY id");
    $stmt->execute(array(':district' =>$district));
    return $stmt;
}




//Get training appliaction report....
public function get_training_application_report()
{
    $stmt = $this->con->prepare("SELECT training_application.district,training_application.added_by,COUNT(training_application.id) AS total,users.u_id,users.u_name,users.firm_name FROM training_application LEFT JOIN users ON training_application.added_by=users.u_id GROUP BY training_application.district");
    $stmt->execute();  
    return $stmt;
}

//Get ev application list....
public function get_ev_application_report()
{
    $stmt = $this->con->prepare("SELECT ev_application.district,ev_application.added_by,COUNT(ev_application.id) AS total,users.u_id,users.u_name,users.firm_name FROM ev_application LEFT JOIN users ON ev_application.added_by=users.u_id GROUP BY ev_application.district");
    $stmt->execute();  
    return $stmt;
}


}
?>
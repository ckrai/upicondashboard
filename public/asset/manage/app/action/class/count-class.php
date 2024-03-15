<?php include_once 'db-connect.php'; ?>
<?php 
class Count extends Database{

    //All event  count....
    public function event_count()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) FROM events WHERE status=:status");
        $stmt->execute(array(':status' =>1));
        $row = $stmt->fetchColumn();
        return $row;
    }

   //All supervisor  count....
    public function supervisor_count()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) FROM users WHERE u_role=:u_role AND u_status=:u_status");
        $stmt->execute(array(':u_status' =>1,':u_role' =>'Supervisor'));
        $row = $stmt->fetchColumn();
        return $row;
    }

   //All supervisor  count....
   public function trainer_count()
   {
    $stmt = $this->con->prepare("SELECT COUNT(*) FROM users WHERE u_role=:u_role AND u_status=:u_status");
    $stmt->execute(array(':u_status' =>1,':u_role' =>'Coordinator'));
    $row = $stmt->fetchColumn();
    return $row;
   }    

    //All trainees count....
    public function trainee_count()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) FROM trainees WHERE status=:status");
        $stmt->execute(array(':status' =>1));
        $row = $stmt->fetchColumn();
        return $row;
    }    

    //All training application count....
    public function training_application_count()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) FROM training_application WHERE status=:status");
        $stmt->execute(array(':status' =>1));
        $row = $stmt->fetchColumn();
         return $row;
    }

    //All ev application count....
    public function erickshaw_application_count()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) FROM ev_application WHERE status=:status");
        $stmt->execute(array(':status' =>1));
        $row = $stmt->fetchColumn();
         return $row;
    }

 
}
?>
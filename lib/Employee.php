<?php 

    $filePath = realpath(dirname(__FILE__));
    include_once ($filePath.'/Database.php');
?>
<?php 
    


class Employee{
    public $db;


    public function __construct(){
        $this->db = new Database();
    }

    public function getEmp(){
        $query = "SELECT * FROM employee";
        $result = $this->db->select($query);
        return $result;
    }
}

?>
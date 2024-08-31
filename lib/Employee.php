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
    public function insertEmployee($name, $emp_id){
        $name = mysqli_real_escape_string($this->db->link, $name);
        $emp_id = mysqli_real_escape_string($this->db->link, $emp_id);

        if(empty($name) || empty($emp_id)){
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Field must not be empty!!</div>";
            return $msg;
        }else{
            // employee table insert data query
            $emp_query = "INSERT INTO employee(name,emp_id) VALUES('$name','$emp_id')";
            $insert_emp = $this->db->insert($emp_query);

            // tbl_attendance table insert only emp id  query
            $att_query = "INSERT INTO tbl_attendance(emp_id) VALUES('$emp_id')";
            $insert_emp = $this->db->insert($att_query);

            if($insert_emp){
                $msg = "<div class='alert alert-success'><strong>Success!</strong> Successfully employee data inserted!!</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'><strong>Error!</strong> Data not inserted!!</div>";
                return $msg;
            }
        }
    }
}

?>
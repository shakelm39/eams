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

    // view employee data
    public function getEmp(){
        $query = "SELECT * FROM employee";
        $result = $this->db->select($query);
        return $result;
    }
    //insert employee data
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


    //insert employee attendance 

    public function insertAttendance($cur_date, $attend = array()){
        $attnd_qry = "SELECT DISTINCT att_time from tbl_attendance";
        $att_data = $this->db->select($attnd_qry);
        

        while($row = $att_data->fetch_assoc()){
            $db_date = $row['att_time'];

            if($cur_date == $db_date){
                $msg = "<div class='alert alert-danger'><strong>Error!</strong> Attendance taken today!!</div>";
                    return $msg;
                    
            }
        }

        foreach ($attend as $att_key => $att_value) {
            if($att_value=='present'){
                $emp_qry = "INSERT INTO tbl_attendance (emp_id, attend, att_time) VALUES ('$att_key', 'present', now())";
                $data_insert = $this->db->insert($emp_qry);
            }else if($att_value=='absent'){
                $emp_qry = "INSERT INTO tbl_attendance (emp_id, attend, att_time) VALUES ('$att_key', 'absent', now())";
                $data_insert = $this->db->insert($emp_qry);
            }
        }

        if($data_insert){
            $msg = "<div class='alert alert-success'><strong>Success!</strong> Attendance data inserted!!</div>";
            return $msg;
        }else{
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Attendance Data not inserted!!</div>";
            return $msg;
        }
        
    }




    //get date view function

    public function attendaceDateList(){
        $get_date = "SELECT att_time From tbl_attendance GROUP BY att_time desc";
        $result = $this->db->select($get_date);

        if($result){
            return $result;
        }
    }





}

?>
<?php 
    include ('inc/header.php');
    include('lib/Employee.php');
 ?>
<?php 

    $emp = new Employee();
 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['emp_name'];
        $emp_id = $_POST['emp_id'];

      
        $insert_data = $emp->insertEmployee($name, $emp_id);

       
        
    }

?>
<?php 
    if(isset($insert_data)){
       
        echo $insert_data;
    }
?>
 <div class="card">
    <div class="card-header">
        <a href="add_employee.php" class="btn btn-success">Add Employee</a>
        <a href="index.php" class="btn btn-info float-end">Back</a>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="emp_name">Employee Name</label>
                <input class="form-control" type="text" name="emp_name" id="emp_name">
            </div>
            <div class="form-group">
                <label for="emp_id">Employee Id</label>
                <input class="form-control" type="text" name="emp_id" id="emp_id">
            </div>
            <div class="form-group">
                <input class="btn btn-primary mt-2" class="form-control" type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
 
<?php include ('inc/footer.php') ?>
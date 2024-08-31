<?php include ('inc/header.php') ?>
 <div class="card">
    <div class="card-header">
        <a href="add_employee.php" class="btn btn-success">Add Employee</a>
        <a href="index.php" class="btn btn-info float-end">Back</a>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="emp_name">Employee Name</label>
                <input class="form-control" type="text" name="emp_name" id="emp_name" required>
            </div>
            <div class="form-group">
                <label for="emp_id">Employee Id</label>
                <input class="form-control" type="text" name="emp_id" id="emp_id" required>
            </div>
            <div class="form-group">
                <input class="btn btn-primary mt-2" class="form-control" type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
 
<?php include ('inc/footer.php') ?>
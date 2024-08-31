<?php 
    include('inc/header.php') ;
    include('lib/Employee.php') ;
?>
<?php 
    $emp = new Employee();
    $cur_date = date('d-m-Y');
?>
        
        <!-- card  -->
        <div class="card">
            <!-- card header -->
            <div class="card-header">
                <div class="card-title">
                    <a href="add_employee.php" class="btn btn-success">Add Employee</a>
                    <a href="view.php" class="btn btn-info float-end">View All</a>
                </div>
            </div>
            <!-- card-body  -->
            <div class="card-body">
                <div class="card-title">
                    <strong>Date: </strong><?php  echo $cur_date?>
                </div>
                <form action="" method="POST">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Employee Name</th>
                                <th>Employee Id</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_emp = $emp->getEmp();
                                if($get_emp){
                                    $sln =1;
                                while($row = $get_emp->fetch_assoc()){
                                 
                            ?>
                            <tr>
                                <td><?php echo $sln;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['emp_id'];?></td>
                                <td>
                                    <input type="radio" name="attend[<?php echo $row['emp_id'];?>]" value="present">P
                                    <input type="radio" name="attend[<?php echo $row['emp_id'];?>]" value="absent">A
                                </td>
                            </tr>
                            <?php $sln++; }} ?>
                            <tr>
                                <td colspan="4">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
<?php include('inc/footer.php') ?>
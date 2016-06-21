<?php include("../views/navigation/begin_navigation.php"); ?>

    <head><title> Chi tiết nhân viên </title>
    <div class="">
        <div id="img_zone">
            <img class="img-circle" width="250px" height="auto" src="../public/images/employee/<?php echo $employee->hinh ?>"/>
        </div>
        <div id="detail_zone" class="col-sm-6">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>Tên</td>
                    <td><?php if(isset($employee)) echo $employee->name ?></td>
                </tr>
                <tr>
                    <td>Phòng ban</td>
                    <td><?php echo $m_employee_3->Get_name_by_id($employee->department); ?></td>
                </tr>
                <tr>
                    <td>Chức vụ</td>
                    <td><?php echo $employee->job_title; ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $employee->email; ?></td>
                </tr>
                </tbody>
            </table>
            <a href="employee.php" class="btn btn-success">Quay lại</a>
        </div>
    </div>

<?php include("../views/navigation/end_navigation.php"); ?>
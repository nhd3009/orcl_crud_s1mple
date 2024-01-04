<?php
    function get_all_services(){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'select * from tbl_services');
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function get_one_service($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "select * from tbl_services where service_id = '$id'");
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function add_service($service_name, $service_fee, $service_detail){
        $conn = connect_database();
        $stmt = oci_parse($conn, "INSERT INTO tbl_services (service_id, service_name, service_fee, service_detail)
         VALUES (:id, :service_name, :service_fee, :service_detail)");
    
        oci_bind_by_name($stmt, ':service_name', $service_name);
        oci_bind_by_name($stmt, ':service_fee', $service_fee);
        oci_bind_by_name($stmt, ':service_detail', $service_detail);
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $id = 'S' . $randomNumber;
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Thêm dịch vụ thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn);
            echo "<script>window.alert('". "Thêm không thành công" ."');</script>";
        }
    }

    function update_service($id, $service_name, $service_fee, $service_detail){
        $conn = connect_database();
        $stmt = oci_parse($conn, "UPDATE tbl_services SET service_name = :service_name, service_fee = :service_fee, service_detail
         = :service_detail WHERE service_id = :id");
    
        oci_bind_by_name($stmt, ':service_name', $service_name);
        oci_bind_by_name($stmt, ':service_fee', $service_fee);
        oci_bind_by_name($stmt, ':service_detail', $service_detail);
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Cập nhật dịch vụ thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn); // Rollback nếu có lỗi
            echo "<script>window.alert('". "Cập nhật không thành công" ."');</script>";
        }
    }

    function del_service($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'DELETE FROM tbl_services WHERE service_id = :id');
        oci_bind_by_name($stmt, ':id', $id);
        
        if (oci_execute($stmt)) {
            $statusMessage = "Xóa dịch vụ thành công.";
        } else {
            $e = oci_error($stmt);
            $statusMessage = "Lỗi xóa dịch vụ: " . htmlentities($e['message'], ENT_QUOTES);
        }
        echo "<script>window.alert('". addslashes($statusMessage) ."');</script>";
    }
?>
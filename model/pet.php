<?php
    function get_all_pets(){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'select * from tblpet');
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function get_one_pet($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "select * from tblpet where pet_id = '$id'");
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function add_pet($pet_name, $pet_status, $pet_description, $pet_price, $pet_category_id, $supplier_id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "INSERT INTO tblpet 
        (pet_id, pet_name, pet_status, pet_description, pet_price, pet_category_id, supplier_id) 
        VALUES (:id, :name, :status, :description, :price, :pet_category, :supplier)");
    
        oci_bind_by_name($stmt, ':name', $pet_name);
        oci_bind_by_name($stmt, ':status', $pet_status);
        oci_bind_by_name($stmt, ':description', $pet_description);
        oci_bind_by_name($stmt, ':price', $pet_price);
        oci_bind_by_name($stmt, ':pet_category', $pet_category_id);
        oci_bind_by_name($stmt, ':supplier', $supplier_id);
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $id = 'P' . $randomNumber;
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Thêm thú cưng thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn);
            echo "<script>window.alert('". "Thêm không thành công" ."');</script>";
        }
    }

    function update_pet($id, $pet_name, $pet_status, $pet_description, $pet_price, $pet_category_id, $supplier_id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "UPDATE tblpet SET pet_name = :name, pet_status = :status, pet_price
         = :price, pet_description = :description, pet_category_id = :pet_category, supplier_id = :supplier WHERE pet_id = :id");
    
        oci_bind_by_name($stmt, ':name', $pet_name);
        oci_bind_by_name($stmt, ':description', $pet_description);
        oci_bind_by_name($stmt, ':price', $pet_price);
        oci_bind_by_name($stmt, ':status', $pet_status);
        oci_bind_by_name($stmt, ':pet_category', $pet_category_id);
        oci_bind_by_name($stmt, ':supplier', $supplier_id);
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Cập nhật thú cưng thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn); // Rollback nếu có lỗi
            echo "<script>window.alert('". "Cập nhật không thành công" ."');</script>";
        }
    }

    function del_pet($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'DELETE FROM tblpet WHERE pet_id = :id');
        oci_bind_by_name($stmt, ':id', $id);
        
        if (oci_execute($stmt)) {
            $statusMessage = "Xóa thú cưng thành công.";
        } else {
            $e = oci_error($stmt);
            $statusMessage = "Lỗi xóa thú cưng: " . htmlentities($e['message'], ENT_QUOTES);
        }
        echo "<script>window.alert('". addslashes($statusMessage) ."');</script>";
    }
?>
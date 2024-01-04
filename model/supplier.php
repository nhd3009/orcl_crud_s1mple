<?php
    function get_all_supplier(){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'select * from tbl_supplier');
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function get_one_supplier($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "select * from tbl_supplier where supplier_id = '$id'");
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function add_supplier($supplier_name, $supplier_contact){
        $conn = connect_database();
        $stmt = oci_parse($conn, "INSERT INTO tbl_supplier (supplier_id, supplier_name, contact_number) VALUES (:id, :supplier_name, :contact_number)");
    
        oci_bind_by_name($stmt, ':supplier_name', $supplier_name);
        oci_bind_by_name($stmt, ':contact_number', $supplier_contact);
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $id = 'V' . $randomNumber;
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Thêm nhà cung cấp thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn);
            echo "<script>window.alert('". "Thêm không thành công" ."');</script>";
        }
    }

    function update_supplier($id, $supplier_name, $supplier_contact){
        $conn = connect_database();
        $stmt = oci_parse($conn, "UPDATE tbl_supplier SET supplier_name = :supplier_name, contact_number = :supplier_contact WHERE supplier_id = :id");
    
        oci_bind_by_name($stmt, ':supplier_name', $supplier_name);
        oci_bind_by_name($stmt, ':supplier_contact', $supplier_contact);
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Cập nhật nhà cung cấp thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn); // Rollback nếu có lỗi
            echo "<script>window.alert('". "Cập nhật không thành công" ."');</script>";
        }
    }

    function del_supplier($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'DELETE FROM tbl_supplier WHERE SUPPLIER_ID = :id');
        oci_bind_by_name($stmt, ':id', $id);
        
        if (oci_execute($stmt)) {
            $statusMessage = "Xóa nhà cung cấp thành công.";
        } else {
            $e = oci_error($stmt);
            $statusMessage = "Lỗi xóa nhà cung cấp: " . htmlentities($e['message'], ENT_QUOTES);
        }
        echo "<script>window.alert('". addslashes($statusMessage) ."');</script>";
    }
?>
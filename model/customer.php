<?php
    function get_all_customer(){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'SELECT * FROM tbl_customer');
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function get_one_customer($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "select * from tbl_customer where customer_id = '$id'");
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function add_customer($name, $contact, $address){
        $conn = connect_database();
        $stmt = oci_parse($conn, "INSERT INTO tbl_customer (customer_id, customer_name, contact_number, address) VALUES (:id, :customer_name, :contact_number, :address)");
    
        oci_bind_by_name($stmt, ':customer_name', $name);
        oci_bind_by_name($stmt, ':contact_number', $contact);
        oci_bind_by_name($stmt, ':address', $address);
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $id = 'C' . $randomNumber;
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Thêm khách hàngg thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn);
            echo "<script>window.alert('". "Thêm không thành công" ."');</script>";
        }
    }

    function update_customer($id, $customer_name, $customer_contact, $customer_address){
        $conn = connect_database();
        $stmt = oci_parse($conn, "UPDATE tbl_customer SET customer_name = :customer_name, contact_number = :customer_contact, address = :customer_address WHERE customer_id = :id");
    
        oci_bind_by_name($stmt, ':customer_name', $customer_name);
        oci_bind_by_name($stmt, ':customer_contact', $customer_contact);
        oci_bind_by_name($stmt, ':customer_address', $customer_address);
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Cập nhật khách hàng thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn); // Rollback nếu có lỗi
            echo "<script>window.alert('". "Cập nhật không thành công" ."');</script>";
        }
    }
    

        function del_customer($id){
            $conn = connect_database();
            $stmt = oci_parse($conn, 'DELETE FROM tbl_customer WHERE CUSTOMER_ID = :id');
            oci_bind_by_name($stmt, ':id', $id);
            
            if (oci_execute($stmt)) {
                $statusMessage = "Xóa khách hàng thành công.";
            } else {
                $e = oci_error($stmt);
                $statusMessage = "Lỗi xóa khách hàng: " . htmlentities($e['message'], ENT_QUOTES);
            }
            echo "<script>window.alert('". addslashes($statusMessage) ."');</script>";
        }
    

    function show_detail($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "SELECT c.* FROM tbl_customer a join tbl_order b on a.customer_id = b.customer_id
        join tbl_order_detail c on b.order_id = c.order_id
        where a.customer_id = '" . $id . "'");
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }
?>
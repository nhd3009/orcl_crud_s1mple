<?php
    function get_all_order(){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'select * from tbl_order');
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function get_one_order($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "select * from tbl_order where order_id = '$id'");
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function get_one_order_detail($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "select * from tbl_order_detail where ORDER_ID = '$id'");
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function get_total_amount($id){
        $conn = connect_database();
        $string = "SELECT
        od.order_id,
        SUM(
          CASE
            WHEN od.service_id IS NOT NULL THEN s.service_fee * od.quantity
            WHEN od.pet_product_id IS NOT NULL THEN pp.product_price * od.quantity
            WHEN od.pet_id IS NOT NULL THEN p.pet_price * od.quantity
            ELSE 0
          END
        ) AS total_amount
        FROM tbl_order_detail od
        LEFT JOIN tbl_services s ON od.service_id = s.service_id
        LEFT JOIN tbl_pet_product pp ON od.pet_product_id = pp.pet_product_id
        LEFT JOIN tblpet p ON od.pet_id = p.pet_id
        where od.order_id = '$id'
        GROUP BY od.order_id";
        $stmt = oci_parse($conn, $string);
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function add_order($order_date, $order_status, $delivery_date, $customer_id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "INSERT INTO tbl_order
        (order_id, order_date, order_status, expected_delivery_date, customer_id) 
        VALUES (:id, TO_DATE(:order_date, 'YYYY-MM-DD HH24:MI:SS'), :order_status, TO_DATE(:delivery_date, 'YYYY-MM-DD HH24:MI:SS'), :customer_id)");
    
        oci_bind_by_name($stmt, ':order_date', $order_date);
        oci_bind_by_name($stmt, ':order_status', $order_status);
        oci_bind_by_name($stmt, ':delivery_date', $delivery_date);
        oci_bind_by_name($stmt, ':customer_id', $customer_id);
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $id = 'O' . $randomNumber;
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Thêm đơn hàng thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn);
            echo "<script>window.alert('". "Thêm không thành công" ."');</script>";
        }
    }

    function add_order_detail($service_id, $product_id, $pet_id, $quantity, $remarks, $order_id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "INSERT INTO tbl_order_detail 
        (order_detail_id, remarks, quantity, order_id, service_id, pet_id, pet_product_id) 
        VALUES (:id, :remarks, :quantity, :order_id, :service_id, :pet_id, :pet_product_id)");
    
        oci_bind_by_name($stmt, ':remarks', $remarks);
        oci_bind_by_name($stmt, ':quantity', $quantity);
        oci_bind_by_name($stmt, ':order_id', $order_id);
        oci_bind_by_name($stmt, ':service_id', $service_id);
        oci_bind_by_name($stmt, ':pet_id', $pet_id);
        oci_bind_by_name($stmt, ':pet_product_id', $product_id);
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $id = 'OD' . $randomNumber;
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Thêm chi tiết đơn hàng thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn);
            echo "<script>window.alert('". "Thêm không thành công" ."');</script>";
        }
    }

    function update_order($id, $order_date, $order_status, $delivery_date, $customer_id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "UPDATE tbl_order SET order_date = TO_DATE(:order_date, 'YYYY-MM-DD HH24:MI:SS'), order_status = :status, expected_delivery_date = TO_DATE(:delivery_date, 'YYYY-MM-DD HH24:MI:SS'), customer_id = :customer_id WHERE order_id = :id");

        oci_bind_by_name($stmt, ':order_date', $order_date);
        oci_bind_by_name($stmt, ':status', $order_status);
        oci_bind_by_name($stmt, ':delivery_date', $delivery_date);
        oci_bind_by_name($stmt, ':customer_id', $customer_id);
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Cập nhật đơn hàng thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn); // Rollback nếu có lỗi
            echo "<script>window.alert('". "Cập nhật không thành công" . $order_date ."');</script>";
        }
    }

    function del_order($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'DELETE FROM tbl_order_detail WHERE order_id = :id');
        oci_bind_by_name($stmt, ':id', $id);
        
        if (oci_execute($stmt)) {
            $statusMessage = "Xóa chi tiết đơn hàng thành công.";
        } else {
            $e = oci_error($stmt);
            $statusMessage = "Lỗi xóa chi tiết đơn hàng: " . htmlentities($e['message'], ENT_QUOTES);
        }
        echo "<script>window.alert('". addslashes($statusMessage) ."');</script>";

        $stmt = oci_parse($conn, 'DELETE FROM tbl_order WHERE order_id = :id');
        oci_bind_by_name($stmt, ':id', $id);
        
        if (oci_execute($stmt)) {
            $statusMessage = "Xóa đơn hàng thành công.";
        } else {
            $e = oci_error($stmt);
            $statusMessage = "Lỗi xóa đơn hàng: " . htmlentities($e['message'], ENT_QUOTES);
        }
        echo "<script>window.alert('". addslashes($statusMessage) ."');</script>";
    }

    function del_order_detail($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'DELETE FROM tbl_order_detail WHERE order_detail_id = :id');
        oci_bind_by_name($stmt, ':id', $id);
        
        if (oci_execute($stmt)) {
            $statusMessage = "Xóa chi tiết đơn hàng thành công.";
        } else {
            $e = oci_error($stmt);
            $statusMessage = "Lỗi xóa chi tiết đơn hàng: " . htmlentities($e['message'], ENT_QUOTES);
        }
        echo "<script>window.alert('". addslashes($statusMessage) ."');</script>";
    }
?>
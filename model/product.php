<?php
    function get_all_product(){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'select * from tbl_pet_product');
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function get_one_product($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "select * from tbl_pet_product where pet_product_id = '$id'");
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function add_product($product_name, $product_detail, $product_price, $quantity_on_hand, $pet_product_category_id, $supplier_id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "INSERT INTO tbl_pet_product 
        (pet_product_id, pet_product_name, pet_product_detail, product_price, quantity_on_hand, pet_product_category_id, supplier_id)
         VALUES (:id, :name, :detail, :price, :quantity, :product_category, :supplier)");
    
        oci_bind_by_name($stmt, ':name', $product_name);
        oci_bind_by_name($stmt, ':detail', $product_detail);
        oci_bind_by_name($stmt, ':price', $product_price);
        oci_bind_by_name($stmt, ':quantity', $quantity_on_hand);
        oci_bind_by_name($stmt, ':product_category', $pet_product_category_id);
        oci_bind_by_name($stmt, ':supplier', $supplier_id);
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $id = 'PP' . $randomNumber;
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Thêm sản phẩm thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn);
            echo "<script>window.alert('". "Thêm không thành công" ."');</script>";
        }
    }

    function update_product($id, $product_name, $product_detail, $product_price, $quantity_on_hand, $pet_product_category_id, $supplier_id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "UPDATE tbl_pet_product SET pet_product_name = :name, pet_product_detail = :detail, product_price
         = :price, quantity_on_hand = :quantity, pet_product_category_id = :product_category, supplier_id = :supplier WHERE pet_product_id = :id");
    
        oci_bind_by_name($stmt, ':name', $product_name);
        oci_bind_by_name($stmt, ':detail', $product_detail);
        oci_bind_by_name($stmt, ':price', $product_price);
        oci_bind_by_name($stmt, ':quantity', $quantity_on_hand);
        oci_bind_by_name($stmt, ':product_category', $pet_product_category_id);
        oci_bind_by_name($stmt, ':supplier', $supplier_id);
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Cập nhật sản phẩm thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn); // Rollback nếu có lỗi
            echo "<script>window.alert('". "Cập nhật không thành công" ."');</script>";
        }
    }

    function del_product($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'DELETE FROM tbl_pet_product WHERE pet_product_id = :id');
        oci_bind_by_name($stmt, ':id', $id);
        
        if (oci_execute($stmt)) {
            $statusMessage = "Xóa sản phẩm thành công.";
        } else {
            $e = oci_error($stmt);
            $statusMessage = "Lỗi xóa sản phẩm: " . htmlentities($e['message'], ENT_QUOTES);
        }
        echo "<script>window.alert('". addslashes($statusMessage) ."');</script>";
    }
?>
<?php
    function get_all_product_category(){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'select * from tbl_pet_product_category');
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function get_one_product_category($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, "select * from tbl_pet_product_category where pet_product_category_id = '$id'");
        oci_execute($stmt);
        $result = array();
        oci_fetch_all($stmt, $result, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        return $result;
    }

    function add_product_category($product_category_name){
        $conn = connect_database();
        $stmt = oci_parse($conn, "INSERT INTO tbl_pet_product_category (pet_product_category_id, pet_product_category_name) VALUES (:id, :product_category_name)");
    
        oci_bind_by_name($stmt, ':product_category_name', $product_category_name);
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $id = 'PPC_' . $randomNumber;
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Thêm danh mục thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn);
            echo "<script>window.alert('". "Thêm không thành công" ."');</script>";
        }
    }

    function update_product_category($id, $product_category_name){
        $conn = connect_database();
        $stmt = oci_parse($conn, "UPDATE tbl_pet_product_category SET pet_product_category_name = :product_category_name WHERE pet_product_category_id = :id");
    
        oci_bind_by_name($stmt, ':product_category_name', $product_category_name);
        oci_bind_by_name($stmt, ':id', $id);
    
        if (oci_execute($stmt, OCI_NO_AUTO_COMMIT)) {
            oci_commit($conn);
            echo "<script>window.alert('". "Cập nhật danh mục thành công" ."');</script>";
        } else {
            $e = oci_error($stmt);
            oci_rollback($conn); // Rollback nếu có lỗi
            echo "<script>window.alert('". "Cập nhật không thành công" ."');</script>";
        }
    }

    function del_product_category($id){
        $conn = connect_database();
        $stmt = oci_parse($conn, 'DELETE FROM tbl_pet_product_category WHERE pet_product_category_id = :id');
        oci_bind_by_name($stmt, ':id', $id);
        
        if (oci_execute($stmt)) {
            $statusMessage = "Xóa danh mục sản phẩm thành công.";
        } else {
            $e = oci_error($stmt);
            $statusMessage = "Lỗi xóa danh mục: " . htmlentities($e['message'], ENT_QUOTES);
        }
        echo "<script>window.alert('". addslashes($statusMessage) ."');</script>";
    }
?>
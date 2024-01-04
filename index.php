<?php
    // require_once('db/connectdb.php');
    include "model/connect_db.php";
    include "model/customer.php";
    include "model/product_category.php";
    include "model/pet_category.php";
    include "model/service.php";
    include "model/supplier.php";
    include "model/product.php";
    include "model/pet.php";
    include "model/order.php";
?>
<!DOCTYPE html>
<html lang="en">
    <?php
        require_once('layout/head.php');
    ?>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php
        require_once('layout/nav_bar.php');
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php
            require_once('layout/side_bar.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <?php
                if(isset($_GET['content'])){
                    switch ($_GET['content']){
                        // Products
                        case 'products':
                            $result_products = get_all_product();
                            include 'view/product/product.php';
                            break;
                        case 'del_product':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                del_product($id);
                            }
                            $result_products = get_all_product();
                            include 'view/product/product.php';
                            break;
                        case 'detail_product':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $list_of_categories = get_all_product_category();
                                $list_of_suppliers = get_all_supplier();
                                $result_one_product = get_one_product($id);
                                include 'view/product/detail_product.php';
                            }
                            break;
                        case 'add_product':
                            if(!isset($_POST['addProduct'])){
                                $list_of_categories = get_all_product_category();
                                $list_of_suppliers = get_all_supplier();
                                include 'view/product/add_product.php';
                            }
                            if(isset($_POST['addProduct'])){
                                $name = $_POST['product_name'];
                                $detail = $_POST['product_detail'];
                                $price = $_POST['product_price'];
                                $quantity =$_POST['product_quantity'];
                                $pet_product_category_id = $_POST['product_category'];
                                $supplier_id = $_POST['product_supplier'];
                                add_product($name, $detail, $price, $quantity, $pet_product_category_id, $supplier_id);
                                $result_products = get_all_product();
                                include 'view/product/product.php';
                            }
                            break;
                        case 'update_product':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_product = get_one_product($id);
                                $list_of_categories = get_all_product_category();
                                $list_of_suppliers = get_all_supplier();
                                include 'view/product/update_product.php';
                            }
                            if(isset($_POST['updateProduct'])){
                                $id = $_POST['product_id'];
                                $name = $_POST['product_name'];
                                $detail = $_POST['product_detail'];
                                $price = $_POST['product_price'];
                                $quantity =$_POST['product_quantity'];
                                $pet_product_category_id = $_POST['product_category'];
                                $supplier_id = $_POST['product_supplier'];
                                update_product($id, $name, $detail, $price, $quantity, $pet_product_category_id, $supplier_id);
                                $result_products = get_all_product();
                                include 'view/product/product.php';
                            }
                            break;
                            
                        // Pets
                        case 'pets':
                            $result_pets = get_all_pets();
                            include 'view/pet/pet.php';
                            break;
                        case 'del_pet':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                del_pet($id);
                            }
                            $result_pets = get_all_pets();
                            include 'view/pet/pet.php';
                            break;
                        case 'detail_pet':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $list_of_categories = get_all_pet_category();
                                $list_of_suppliers = get_all_supplier();
                                $result_one_pet = get_one_pet($id);
                                include 'view/pet/detail_pet.php';
                            }
                            break;
                        case 'add_pet':
                            if(!isset($_POST['addPet'])){
                                $list_of_categories = get_all_pet_category();
                                $list_of_suppliers = get_all_supplier();
                                include 'view/pet/add_pet.php';
                            }
                            if(isset($_POST['addPet'])){
                                $name = $_POST['pet_name'];
                                $description = $_POST['pet_description'];
                                $price = $_POST['pet_price'];
                                $status =$_POST['pet_status'];
                                $pet_category_id = $_POST['pet_category'];
                                $supplier_id = $_POST['pet_supplier'];
                                add_pet($name, $status, $description, $price, $pet_category_id, $supplier_id);
                                $result_pets = get_all_pets();
                                include 'view/pet/pet.php';
                            }
                            break;
                        case 'update_pet':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_pet = get_one_pet($id);
                                $list_of_categories = get_all_pet_category();
                                $list_of_suppliers = get_all_supplier();
                                include 'view/pet/update_pet.php';
                            }
                            if(isset($_POST['updatePet'])){
                                $id = $_POST['pet_id'];
                                $name = $_POST['pet_name'];
                                $description = $_POST['pet_description'];
                                $price = $_POST['pet_price'];
                                $status =$_POST['pet_status'];
                                $pet_category_id = $_POST['pet_category'];
                                $supplier_id = $_POST['pet_supplier'];
                                update_pet($id, $name, $status, $description, $price, $pet_category_id, $supplier_id);
                                $result_pets = get_all_pets();
                                include 'view/pet/pet.php';
                            }
                            break;

                        // Services
                        case 'services':
                            $result_services = get_all_services();
                            include 'view/service/service.php';
                            break;
                        case 'detail_service':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_service = get_one_service($id);
                                include 'view/service/detail_service.php';
                            }
                            break;
                        case 'del_service':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                del_service($id);
                            }
                            $result_services = get_all_services();
                            include 'view/service/service.php';
                            break;
                        case 'add_service':
                            if(!isset($_POST['addService'])){
                                include 'view/service/add_service.php';
                            }
                            if(isset($_POST['addService'])){
                                $name = $_POST['service_name'];
                                $service_fee = $_POST['service_fee'];
                                $service_detail = $_POST['service_detail'];
                                add_service($name, $service_fee, $service_detail);
                                $result_services = get_all_services();
                                include 'view/service/service.php';
                            }
                            break;
                        case 'update_service':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_service = get_one_service($id);
                                include 'view/service/update_service.php';
                            }
                            if(isset($_POST['service_id']) && isset($_POST['updateService'])){
                                $id = $_POST['service_id'];
                                $name = $_POST['service_name'];
                                $fee = $_POST['service_fee'];
                                $detail = $_POST['service_detail'];
                                update_service($id, $name, $fee, $detail);
                                $result_services = get_all_services();
                                include 'view/service/service.php';
                            }
                            break;

                        // Product Category
                        case 'product_categories':
                            $result_product_category = get_all_product_category();
                            include 'view/product_category/product_category.php';
                            break;
                        case 'del_product_category':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                del_product_category($id);
                            }
                            $result_product_category = get_all_product_category();
                            include 'view/product_category/product_category.php';
                            break;
                        case 'update_product_category':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_product_category = get_one_product_category($id);
                                include 'view/product_category/update_product_category.php';
                            }
                            if(isset($_POST['product_category_id']) && isset($_POST['update'])){
                                $id = $_POST['product_category_id'];
                                $name = $_POST['product_category_name'];
                                update_product_category($id, $name);
                                $result_product_category = get_all_product_category();
                                include 'view/product_category/product_category.php';
                            }
                            break;
                        case 'add_product_category':
                            if(!isset($_POST['add'])){
                                include 'view/product_category/add_product_category.php';
                            }
                            if(isset($_POST['add']) && $_POST['product_category_name']){
                                $name = $_POST['product_category_name'];
                                add_product_category($name);
                                $result_product_category = get_all_product_category();
                                include 'view/product_category/product_category.php';
                            }
                            break;

                        // Pet Category
                        case 'pet_categories':
                            $result_pet_category = get_all_pet_category();
                            include 'view/pet_category/pet_category.php';
                            break;
                        case 'add_pet_category':
                            if(!isset($_POST['add'])){
                                include 'view/pet_category/add_pet_category.php';
                            }
                            if(isset($_POST['add']) && $_POST['pet_category_name']){
                                $name = $_POST['pet_category_name'];
                                add_pet_category($name);
                                $result_pet_category = get_all_pet_category();
                                include 'view/pet_category/pet_category.php';
                            }
                            break;
                        case 'update_pet_category':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_pet_category = get_one_pet_category($id);
                                include 'view/pet_category/update_pet_category.php';
                            }
                            if(isset($_POST['pet_category_id']) && isset($_POST['update'])){
                                $id = $_POST['pet_category_id'];
                                $name = $_POST['pet_category_name'];
                                update_pet_category($id, $name);
                                $result_pet_category = get_all_pet_category();
                                include 'view/pet_category/pet_category.php';
                            }
                            break;
                        case 'del_pet_category':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                del_pet_category($id);
                            }
                            $result_pet_category = get_all_pet_category();
                            include 'view/pet_category/pet_category.php';
                            break;

                        // Orders and Detail
                        case 'orders':
                            $result_orders = get_all_order();
                            include 'view/order/order.php';
                            break;
                        case 'add_order':
                            if(!isset($_POST['addOrder'])){
                                $list_customers = get_all_customer();
                                include 'view/order/add_order.php';
                            }
                            if(isset($_POST['addOrder'])){
                                $order_date = $_POST['order_date'];
                                $format_order_date = date("Y-m-d H:i:s", strtotime($order_date));
                                $order_status = $_POST['order_status'];
                                $delivery_date = $_POST['delivery_date'];
                                $format_delivery_date = date("Y-m-d H:i:s", strtotime($delivery_date));
                                $customer_id = $_POST['customer_id'];
                                add_order($format_order_date, $order_status, $format_delivery_date, $customer_id);
                                $result_orders = get_all_order();
                                include 'view/order/order.php';
                            }
                            break;
                        case 'detail_order':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_order = get_one_order($id);
                                $result_order_detail = get_one_order_detail($id);
                                $list_pets = get_all_pets();
                                $list_services = get_all_services();
                                $list_products = get_all_product();
                                $result_total_amount = get_total_amount($id);
                                $list_customers = get_all_customer();
                                include 'view/order/order_detail.php';
                            }
                            break;
                        case 'update_order':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_order = get_one_order($id);
                                $result_order_detail = get_one_order_detail($id);
                                $list_pets = get_all_pets();
                                $list_services = get_all_services();
                                $list_products = get_all_product();
                                $result_total_amount = get_total_amount($id);
                                $list_customers = get_all_customer();
                                include 'view/order/update_order.php';
                            }
                            if(isset($_POST['updateOrder'])){
                                $id = $_POST['order_id'];
                                $order_date = $_POST['order_date'];
                                $format_order_date = date("Y-m-d H:i:s", strtotime($order_date));
                                $delivery_date = $_POST['delivery_date'];
                                $format_delivery_date = date("Y-m-d H:i:s", strtotime($delivery_date));
                                $order_status = $_POST['order_status'];
                                $customer_id = $_POST['customer_id'];
                                update_order($id, $format_order_date, $order_status, $format_delivery_date, $customer_id);
                                $result_orders = get_all_order();
                                include 'view/order/order.php';
                            }
                            break;
                        case 'del_order':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                del_order($id);
                            }
                            $result_orders = get_all_order();
                            include 'view/order/order.php';
                            break;
                        case 'add_order_detail':
                            if(!isset($_POST['add_detail'])){
                                $list_pets = get_all_pets();
                                $list_services = get_all_services();
                                $list_products = get_all_product();
                                include 'view/order/add_order_detail.php';
                            }
                            if(isset($_POST['add_detail'])){
                                $remarks = $_POST['order_detail_remarks'];
                                $quantity = $_POST['quantity'];
                                $service_id = $_POST['service_id'];
                                $pet_id = $_POST['pet_id'];
                                $product_id = $_POST['product_id'];
                                $order_id = $_POST['order_id'];
                                add_order_detail($service_id, $product_id, $pet_id, $quantity, $remarks, $order_id);

                                $result_one_order = get_one_order($order_id);
                                $result_order_detail = get_one_order_detail($order_id);
                                $list_pets = get_all_pets();
                                $list_services = get_all_services();
                                $list_products = get_all_product();
                                $result_total_amount = get_total_amount($order_id);
                                $list_customers = get_all_customer();
                                include 'view/order/update_order.php';
                            }
                            break;
                        case 'delete_order_detail':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $order_id = $_GET['order_id'];
                                del_order_detail($id);
                            }
                            $result_one_order = get_one_order($order_id);
                            $result_order_detail = get_one_order_detail($order_id);
                            $list_pets = get_all_pets();
                            $list_services = get_all_services();
                            $list_products = get_all_product();
                            $result_total_amount = get_total_amount($order_id);
                            $list_customers = get_all_customer();
                            include 'view/order/update_order.php';
                            break;
                        

                        // Customer
                        case 'customers':
                            $result_customer = get_all_customer();
                            include 'view/customer/customer.php';
                            break;
                        case 'add_customer':
                            if(!isset($_POST['addCustomer'])){
                                include 'view/customer/add_customer.php';
                            }
                            if(isset($_POST['addCustomer'])){
                                $name = $_POST['name'];
                                $contact = $_POST['contact'];
                                $address = $_POST['address'];
                                add_customer($name, $contact, $address);
                                $result_customer = get_all_customer();
                            include 'view/customer/customer.php';
                            }
                            break;
                        case 'customer_detail':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_customer = show_detail($id);
                                $list_pets = get_all_pets();
                                $list_services = get_all_services();
                                $list_products = get_all_product();
                                $list_customers = get_all_customer();
                                include 'view/customer/customer_detail.php';
                            }
                            break;
                        case 'delcustomer':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                del_customer($id);
                            }
                            $result_customer = get_all_customer();
                            include 'view/customer/customer.php';
                            break;
                        case 'updatecustomer':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_customer = get_one_customer($id);
                                include 'view/customer/update_customer.php';
                            }
                            if(isset($_POST['customer_id']) && isset($_POST['update'])){
                                $id = $_POST['customer_id'];
                                $name = $_POST['customer_name'];
                                $contact = $_POST['customer_contact'];
                                $address = $_POST['customer_address'];
                                update_customer($id, $name, $contact, $address);
                                $result_customer = get_all_customer();
                                include 'view/customer/customer.php';
                            }
                            break;
                        
                        //Supplier
                        case 'suppliers':
                            $result_suppliers = get_all_supplier();
                            include 'view/supplier/supplier.php';
                            break;
                        case 'add_supplier':
                            if(!isset($_POST['addSupplier'])){
                                include 'view/supplier/add_supplier.php';
                            }
                            if(isset($_POST['addSupplier'])){
                                $name = $_POST['supplier_name'];
                                $contact = $_POST['supplier_contact'];
                                add_supplier($name, $contact);
                                $result_suppliers = get_all_supplier();
                                include 'view/supplier/supplier.php';
                            }
                            break;
                        case 'update_supplier':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $result_one_supplier = get_one_supplier($id);
                                include 'view/supplier/update_supplier.php';
                            }
                            if(isset($_POST['updateSupplier'])){
                                $id = $_POST['supplier_id'];
                                $name = $_POST['supplier_name'];
                                $contact = $_POST['supplier_contact'];
                                update_supplier($id, $name, $contact);
                                $result_suppliers = get_all_supplier();
                                include 'view/supplier/supplier.php';
                            }
                            break;
                        case 'del_supplier':
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                del_supplier($id);
                            }
                            $result_suppliers = get_all_supplier();
                            include 'view/supplier/supplier.php';
                            break;
                        default:
                            include 'view/home.php';
                            break;
                    }
                }
                else{
                    include "view/home.php";
                }
            ?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php
            require_once('layout/footer.php');
          ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php
        require_once('layout/script.php');
    ?>
  </body>
</html>
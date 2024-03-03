<?php
class AdminControllers extends CoreControllers
{
    protected $admin;
    public function __construct()
    {   
        
        $this->admin = $this->loadModel('Admin');
    }
    public function home()
    {
        $data['bill'] = $this->admin->allbill();
        $data['teas'] = $this->admin->product();
        $data['user'] = $this->admin->getuser();
        $this->loadadmin('homeAdmin', $data);


    }
    public function tablesp()
    {
        $data['teas'] = $this->admin->product();
        $this->loadadmin('tablespAdmin', $data);

    }
    public function addpr()
    {
        $this->loadadmin('themspAdmin');

    }
    public function themuser()
    {
        $this->loadadmin('themuserAdmin');

    }
    public function user()
    {
        $data['user'] = $this->admin->getuser();
        $this->loadadmin('userAdmin', $data);

    }
    public function trackingadmin()
    {

        $data['list'] = $this->admin->getoderbyuser();

        $this->loadadmin('adminflowproduct', $data);
    }
    // public function delete(){
    //     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ids'])) {
    //         $db = $this->loadModel('Admin');
    //         // Nhận ID từ yêu cầu get
    //         $id = $_POST['ids'];
    //         $db->deleteAdmin($id);

    //         $this->loadadmin('themuserAdmin');
    //     }
    //     $db = $this->loadModel('Admin');
    //     $db->deleteAdmin($id);
    //     echo'ok';
    //     // $this->loadadmin('themuserAdmin');

    // }
    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
            $id = $_POST['id'];
            // Gọi phương thức xóa từ model hoặc xử lý dữ liệu tương ứng
            $this->admin->deteleadmin($id);
            echo 'ok';
        } else {
            echo 'Invalid request or missing ID.';
        }
    }
    public function updateadmin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($userId)) {
            $userName = $_POST["userName"];
            $userId = $_POST["userId"];
            $userEmail = $_POST["userEmail"];
            $img = $_FILES["img"];
            $taik = $_POST["taik"];
            if (isset($_FILES['img']['name']) != "") {
                $img = basename($_FILES['img']['name']);
                $dir = '../public/upload/';
                $show = $dir . $img;
                move_uploaded_file($_FILES['img']['tmp_name'], $show);
                $this->admin->update($userName, $userEmail, $img, $taik, $userId);
                $this->user();
            }

        }
    }
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['user'] = $this->admin->GetProductAd($_POST['search']);
        }
        $this->loadadmin('userAdmin', $data);
    }
    public function addacout()
    {
        if (isset($_POST['save']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $fist = $_POST['first_name'];
            $last = $_POST['last_name'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            $kq = $this->admin->userd($email);

            if ($_POST['pass'] != "" && $_POST['address'] != "" && $_POST['email'] != "") {
                // var_dump($user);
                if (count($kq) > 0) {
                    error("Tài khoản đã tồn tại");
                } else {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        error("Email phải có @, gmail và .com");
                    } else {
                        // Nếu điều kiện đều hợp lệ, tiến hành thêm dữ liệu vào cơ sở dữ liệu
                        if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
                            $img = basename($_FILES['img']['name']);
                            $dir = "../public/upload/";
                            $show = $dir . $img;
                            move_uploaded_file($_FILES['img']['name'], $show);
                        }
                        // Gọi hàm insert_useradmin để thêm dữ liệu vào cơ sở dữ li ệu
                        $this->admin->userRegister($fist, $last, $email, $pass, $img, $role, $address);
                    }
                }
            } else {
                error("Điền đầy đủ thông tin", 'danger');
            }
            $this->themuser();
        }
        ;
    }
    public function deleteoder($id)
    {
        if ($id) {
            $this->admin->deleteoderp($id);
            $this->trackingadmin();
        }
    }
    public function deleteproduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ids'])) {
            $id = $_POST['ids'];
            // Gọi phương thức xóa từ model hoặc xử lý dữ liệu tương ứng
            $this->admin->deteleproadmin($id);
            echo 'ok';
        } else {
            echo 'Invalid request or missing ID.';
        }
    }
    public function viewadd()
    {
        $data['catelory'] = $this->admin->cartelory();
        $this->loadadmin('themspAdmin', $data);
    }
    public function adduser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenSanPham = $_POST["tensp"];
            $danhMuc = $_POST["danhMuc"];
            $giaBan = $_POST["giaBan"];
            $mota = $_POST['hiddenMota'];
            $soLuong = $_POST["soLuong"];

            if (empty($tenSanPham))
                error("Vui lòng nhập Tên sản phẩm.");
            elseif ($danhMuc == "-- Chọn danh mục --")
                error("Vui lòng chọn Danh mục.");
            elseif (empty($soLuong))
                error("Vui lòng nhập Số lượng.");
            elseif (empty($giaBan))
                error("Vui lòng nhập Giá bán.", 'dangger');
            else {
                $target_dir = "../public/upload/";
                $file_name = basename($_FILES['ImageUpload']['name']);
                $target_file = $target_dir . $file_name;
                $file_tmp = $_FILES['ImageUpload']['name'];
                move_uploaded_file($file_tmp, $target_file);
                $this->admin->addproduct($tenSanPham, $danhMuc, $giaBan, $mota, $soLuong, $target_file);
            }


            $this->viewadd();
        }



    }
    public function updateproduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $tensp = $_POST['ten'];
            $gia = $_POST['gia'];
            $soLuong = $_POST['soluong'];
            // Kiểm tra giá trị của $tensp
            if (empty($tensp)) {
                error('điền tên sp');
            } else if (empty($gia)) {
                error('điền tên gia');
            } else if (!is_numeric($gia)) {
                error('ko phải sô');
            } elseif (empty($soLuong)) {
                error('điền tên sL');
            } else if (!is_numeric($soLuong)) {
                error('ko phải sô');
            }else{
                if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
                    $imgsp = basename($_FILES['img']['name']);
                    $dir = "../public/upload/";
                    $show = $dir . $imgsp;
                    move_uploaded_file($_FILES['img']['name'], $show);
                    $this->admin->updateproduct($tensp,$gia,$soLuong,$imgsp,$id);
                }
                  
            }
            
            


        }
        $this->tablesp();


    }
}




<?php
class UserControllers extends CoreControllers
{
    protected $user;
    public function __construct()
    {
        $this->user = $this->loadModel('user');
    }
    // public function index()
    // {
    //     $data['userList'] = $this->user->user();
    //     $this->loadView('userlist',$data);
    // }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $kq = $this->user->userlogin($_POST['email'], $_POST['pass']); 
          
            if ($kq) {
                if($kq['role']>0){
                    $_SESSION['user'] = $kq;
              
                    header('location:'.APP_URL.'admin/home');
                    return;
                }else{
                    $_SESSION['user'] = $kq;
              
                header('location:' . APP_URL . '');
                return;
                }
                
            } else {
                // echo 'thất bại';
                if (empty($email) || empty($pass)) {
                    error('Email and password are required', 'danger');
                }elseif(strpos($email, '@gmail.com') === false)
                {
                    error('Please enter a valid Gmail address', 'danger');
                } else {
                    // Display a generic login error
                    error('Invalid email or password', 'danger');
                }
            }
        }
        $this->loadView('userlogin');

    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first = $_POST['firstName'];
            $last = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $kq = $this->user->userd($_POST['email']);
           
           
            if(count($kq)>0){
                error('Existence account.', 'danger');
            }else {
                if(empty($first)) {
                    error('First Name is required.', 'danger');
                } elseif (empty($last)) {
                    error('Last Name is required.', 'danger');
                } elseif (empty($email)) {
                    error('Email is required.', 'danger');
                } elseif (strpos($email, '@gmail.com') === false) {
                    error('Please enter a valid Gmail address.', 'danger');
                }
                // } elseif(isEmailInUse($email)) {
                //     error('Email is already in use.', 'danger');
                // }
                 elseif (empty($password)) {
                    error('Password is required.', 'danger');
                } else {
                    // All validations passed, proceed with registration
                    // $this->user->userRegister($first, $last, $email, $password);
                    // $this->loadView('userlogin');
                    if (isset($_FILES['img']['name']) != "") {
                        $img = basename($_FILES['img']['name']);
                        $dir = "../public/upload/";
                        $show = $dir . $img;
                        move_uploaded_file($_FILES['img']['tmp_name'], $show);
                        $this->user->userRegister($first, $last, $email, $password,$img);
                        $this->loadView('userlogin');
                    }
                }
                
            }
            
        }
    
        $this->loadView('signup');
    }
    public function tlogin()
    {
        unset($_SESSION['user']);
        print_r($_SESSION['user']);
        header('location: ' . APP_URL);
    }
    public function profile(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['user_id'];
            $first = $_POST['firstName'];
            $last = $_POST['lastName'];
            $email = $_POST['email'];
            $address =$_POST['address'];

          
            if (empty($first)) {
                error('First Name is required.', 'danger');
            } elseif (empty($last)) {
                error('Last Name is required.', 'danger');
            } elseif (empty($email)) {
                error('Email is required.', 'danger');
            } elseif (strpos($email, '@gmail.com') === false) {
                error('Please enter a valid Gmail address.', 'danger');
            }elseif(empty($address)){
                error('address is required.', 'danger');
            }else {
                if (isset($_FILES['img']['name']) != "") {
                    $img = basename($_FILES['img']['name']);
                    $dir = "../public/upload/";
                    $show = $dir . $img;
                    move_uploaded_file($_FILES['img']['tmp_name'], $show);
                    $this->user->upprofile($first, $last, $email,$address,$img,$id);
                    $updatedUserData = $this->user->getbyiduser($id);
                    $_SESSION['user'] = $updatedUserData;
                    $this->loadview('profile');
                }
            }
        }
        $this->loadview('profile');
    }
    public function forgotpass(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $kq  = $this->user->checkmail($_POST['email']);
            if($kq){
                $senderName = "hoangphat";
                $senderEmail = "phatdhps31981@fpt.edu.vn";
                $senderEmailPassword = "yclm ktej nrzd txck";
                $OTP = $this->user->genOTP($_POST['email']);
                
                $recieverEmail = $_POST['email'];
                $subject = "đỏi mk";
                $body = "".$OTP."";
                
                $mailer = new Mail($senderName,$senderEmail,$senderEmailPassword);
                $mailer->sendMail($recieverEmail,$subject,$body);
                header("location:".APP_URL."user/OTP");
            }else{
                error('không tồn tại','dangger');
            }
        }
        $this->loadView('user_forgotpass');
    }
    public function OTP(){
       
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if($_POST['password']!=$_POST['password2']){
                error('không trùng');
            }else{
             $kq = $this->user->restPass($_POST['password'],$_POST['code']);
             var_dump($kq);
                if($kq){
                   header('Location: '.APP_URL.'/user/login');
                }
                else{
                    error('ma OTP khong dung hoac da het ','warung');
                }
            }
        }
        $this->loadView('OTP');
    }
    
}


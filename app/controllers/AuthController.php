<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . "/../models/User.php";

class AuthController extends Controller
{

  private $first_name;
  private $last_name;
  private $email;
  private $password;


  // public function __construct ($first_name,$last_name,$email,$password){
  // $this->first_name = $first_name ;
  // $this->last_name = $last_name ;
  // $this->email = $email ;
  // $this->password = $password ;
  // }

  public function index()
  {
    $this->view("auth/login");
  }

  public function register()
  {
    $this->view("auth/register");
  }

  public function login()
  {
    $this->view("auth/login");
  }
  public function store()
  {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $storeUser = new User();
    $existingEmail = $storeUser->setEmail($email);
    $existingEmail = $storeUser->getEmail();
    if (!$existingEmail) {
      $existingEmail = $storeUser->setUser($first_name, $last_name, $email, $password, $age);
      header("Location: /?path=auth/login");
      exit;
    } else {
      $_SESSION['mode'] = "email";
      header("Location: /?path=auth/register");
    }
  }

  public function connect()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginUser = new User();
    $setEmail = $loginUser->setEmail($email);
    $existingEmail = $loginUser->getEmail();
    if ($existingEmail) {

      $verification = $loginUser->login($password);
      echo $verification;
      if ($verification) {
        $_SESSION['set_id'] = $existingEmail['id'];
        $this->sendOtp($existingEmail);
        header("Location: /?path=auth/otp");
        exit;
      } else {
        $_SESSION['mode'] = "password";
        header("Location: /?path=auth/login");
        exit;
      }

    } else {
      $_SESSION['mode'] = "errorEmail";
      header("Location: /?path=auth/login");
      exit;
    }

  }

  private function sendOtp($user)
  {

    try {

      $otp = random_int(100000, 999999);
      $_SESSION['otp'] = $otp;
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = getenv('EMAIL');
      $mail->Password = getenv('APP_PASSWORD');
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
      $mail->setFrom(getenv('EMAIL'), 'Smart Wallet');
      $mail->addAddress($user['email']);
      $mail->Subject = 'Verify your email';
      $mail->Body = "Hello {$user['fullName']},\n\nYour verification code is: {$otp}\n\nThis code will expire in 5 minutes.\n\nSmart Wallet Team";
      $mail->send();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }

  }

  public function otp()
  {
    $this->view("auth/otp");
  }

  public function verify()
  {
    $otpEntered = $_POST['otp_code'];
    echo $otpEntered;
    $otp = $_SESSION['otp'] ?? '';
    if (!empty($otp)) {
      if ($otp == $otpEntered) {
         $_SESSION['user_id'] = $_SESSION['set_id'];
         unset($_SESSION['set_id']);
         header("Location: /?path=dashboard/index");
      }else{
         unset($_SESSION['set_id']);
         $_SESSION['mode'] = "otp";
         header('Location: /?path=auth/otp');
         exit();
      }


    }else{
      header('Location: /?path=auth/login');
      exit;
    }

  
    }

}
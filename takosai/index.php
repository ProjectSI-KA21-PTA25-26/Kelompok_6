<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Login | Kedai Takosai</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    html, body {
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      background: linear-gradient(135deg, #FBF6EE 0%, #F2E6CF 50%, #E9D9BF 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow: hidden;
    }
    /* Background Pattern */
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: 
        radial-gradient(circle at 20% 50%, rgba(161, 129, 130, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(216, 195, 141, 0.1) 0%, transparent 50%);
      pointer-events: none;
      z-index: 0;
    }
    /* Decorative elements */
    .decoration {
      position: absolute;
      font-size: 4rem;
      opacity: 0.1;
      animation: float 6s ease-in-out infinite;
    }
    .decoration:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
    .decoration:nth-child(2) { top: 70%; right: 10%; animation-delay: 2s; }
    .decoration:nth-child(3) { bottom: 10%; left: 15%; animation-delay: 4s; }
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }
    .login-container {
      position: relative;
      z-index: 1;
      width: 450px;
      padding: 0;
    }
    .login-box {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(251, 246, 238, 0.95) 100%);
      backdrop-filter: blur(20px);
      padding: 50px 40px;
      border-radius: 25px;
      box-shadow: 0 15px 50px rgba(122, 95, 95, 0.3);
      border: 2px solid rgba(216, 195, 141, 0.5);
      position: relative;
      overflow: hidden;
    }
    .login-box::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(216, 195, 141, 0.1), transparent);
      transform: rotate(45deg);
      animation: shine 3s infinite;
    }
    @keyframes shine {
      0% { transform: translateX(-100%) rotate(45deg); }
      100% { transform: translateX(100%) rotate(45deg); }
    }
    .login-header {
      text-align: center;
      margin-bottom: 40px;
      position: relative;
    }
    .login-header .logo {
      
      margin-bottom: 15px;
      
    }
   .takoyaki-logo {
    width: 90px;        /* bisa diubah 70–110px sesuai ukuran aslinya */
    height: auto;
    animation: bounce 2s ease-in-out infinite;
    user-select: none;
    }
    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    .login-header h2 {
      color: #7A5F5F;
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 5px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }
    .login-header p {
      color: #A18182;
      font-size: 0.95rem;
      margin: 0;
    }
    .user-box {
      position: relative;
      margin-bottom: 30px;
    }
    .user-box input {
      width: 100%;
      padding: 15px 15px 15px 50px;
      font-size: 16px;
      color: #3B2F2F;
      border: 2px solid #D8C38D;
      border-radius: 15px;
      background: white;
      outline: none;
      transition: all 0.3s ease;
    }
    .user-box input:focus {
      border-color: #A18182;
      box-shadow: 0 0 15px rgba(161, 129, 130, 0.3);
      background: white;
    }
    .user-box label.login {
      position: absolute;
      top: -12px;
      left: 45px;
      color: #7A5F5F;
      font-size: 12px;
      background: white;
      padding: 0 8px;
      font-weight: 600;
      pointer-events: none;
      z-index: 2;
    }
    .user-box .icon {
      position: absolute;
      top: 50%;
      left: 18px;
      transform: translateY(-50%);
      color: #A18182;
      font-size: 18px;
      pointer-events: none;
      z-index: 2;
    }
    .user-box input::placeholder {
      color: #D8C38D;
      opacity: 0.7;
    }
    .user-box .user-error,
    .user-box .pass-error {
      display: none;
      color: #E5A3A3;
      font-size: 12px;
      margin-top: 5px;
      margin-left: 5px;
      font-weight: 600;
    }
    .register-link {
      text-align: center;
      margin: 20px 0;
    }
    .register-link a {
      color: #A18182;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }
    .register-link a:hover {
      color: #7A5F5F;
      text-decoration: underline;
    }
    .submit {
      display: block;
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
      color: white;
      text-align: center;
      text-decoration: none;
      border-radius: 15px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      transition: all 0.3s ease;
      box-shadow: 0 5px 20px rgba(161, 129, 130, 0.4);
      position: relative;
      overflow: hidden;
      border: none;
      cursor: pointer;
    }
    .submit::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s ease;
    }
    .submit:hover::before {
      left: 100%;
    }
    .submit:hover {
      background: linear-gradient(135deg, #8B6F70 0%, #7A5F5F 100%);
      transform: translateY(-2px);
      box-shadow: 0 8px 30px rgba(161, 129, 130, 0.6);
    }
    .submit:active {
      transform: translateY(0);
    }
    /* Loading spinner */
    .spinner {
      display: none;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255,255,255,0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
      margin: 0 auto;
    }
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
    /* Responsive */
    @media (max-width: 480px) {
      .login-container {
        width: 90%;
        margin: 20px;
      }
      .login-box {
        padding: 30px 25px;
      }
      .login-header h2 {
        font-size: 1.5rem;
      }
      .login-header .logo {
        font-size: 3rem;
      }
    }
  </style>
</head>
<body>
  <!-- Decorative elements -->
  <div class="decoration">🐙</div>
  <div class="decoration">🥟</div>
  <div class="decoration">🍹</div>
  <div class="login-container">
    <div class="login-box">
      <div class="login-header">
        <div class="logo">
  <img src="img/takoyaki.svg" alt="Takoyaki Logo" class="takoyaki-logo">
</div>
        <h2>Kedai Takosai</h2>
        <p>Silakan masuk ke akun Anda</p>
      </div>
      
      <form action="">
        <div class="user-box">
          <label for="user" class="login">Username</label>
          <i class="icon fas fa-user"></i>
          <input type="text" name="user" id="user" placeholder="Masukkan username" required="">
          <label class="user-error"></label>
        </div>
        
        <div class="user-box">
          <label for="pass" class="login">Password</label>
          <i class="icon fas fa-lock"></i>
          <input type="password" name="pass" id="pass" placeholder="Masukkan password" required="">
          <label class="pass-error"></label>
        </div>
        <div class="register-link">
          <small>Belum punya akun? <a href="register.php">Daftar di sini</a></small>
        </div>
        
        <button type="submit" class="submit">
          <span class="submit-text">Login</span>
          <div class="spinner"></div>
        </button>
      </form>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $('.submit').click(function(e){
        e.preventDefault();
        var username = $("input[name='user']").val();
        var password = $("input[name='pass']").val();
        
        if(!checkUsername() || !checkPassword()){
          return;
        }
        
        function checkUsername(){
          if(username == ''){
            $(".user-error").text("Username tidak boleh kosong.").show();
            $("input[name='user']").css("border-color", "#E5A3A3");
            return false;
          }else{
            $(".user-error").hide();
            $("input[name='user']").css("border-color", "#D8C38D");
            return true;
          }
        }
        
        function checkPassword(){
          if(password == ''){
            $(".pass-error").text("Password tidak boleh kosong.").show();
            $("input[name='pass']").css("border-color", "#E5A3A3");
            return false;
          }else{
            $(".pass-error").hide();
            $("input[name='pass']").css("border-color", "#D8C38D");
            return true;
          }
        }
        
        // Show loading
        $('.submit-text').hide();
        $('.spinner').show();
        $('.submit').prop('disabled', true);
        
        $.post("./LoginChecker.php", {username: username, password: password
        }).done(function(data){
          if(data == '1'){
            window.location.href = "./admin.php?status=1";
          }else if(data == '2'){
            window.location.href = "./menu_pembeli.php?status=2";
          }else if(data == '3'){
            window.location.href = "./menu_pembeli.php";
          }else if(data == '4'){
            $("input[name='pass']").css("border-color", "#E5A3A3");
            $(".pass-error").text("Password salah.").show();
            $("input[name='pass']").val('');
            // Hide loading
            $('.submit-text').show();
            $('.spinner').hide();
            $('.submit').prop('disabled', false);
          }else if(data == '5'){
            $(".user-error").text("Username tidak ditemukan.").show();
            $("input[name='user']").css("border-color", "#E5A3A3");
            $("input[name='user']").val('');
            $("input[name='pass']").val('');
            // Hide loading
            $('.submit-text').show();
            $('.spinner').hide();
            $('.submit').prop('disabled', false);
          }
        }).fail(function(){
          alert('Request failed. Please try again later.');
          // Hide loading
          $('.submit-text').show();
          $('.spinner').hide();
          $('.submit').prop('disabled', false);
        });
      });
    });
  </script>
</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>Registrasi | Kedai Takosai</title>

    <style>
    /* ========== Background - Matching dengan login.php ========== */
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
      overflow-x: hidden;
      padding: 40px 20px;
    }

    /* Background Pattern */
    body::before {
      content: '';
      position: fixed;
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
      position: fixed;
      font-size: 4rem;
      opacity: 0.1;
      animation: float 6s ease-in-out infinite;
      z-index: 0;
    }

    .decoration:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
    .decoration:nth-child(2) { top: 70%; right: 10%; animation-delay: 2s; }
    .decoration:nth-child(3) { bottom: 10%; left: 15%; animation-delay: 4s; }
    .decoration:nth-child(4) { top: 40%; right: 20%; animation-delay: 3s; }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }

    /* ========== Styling Form ========== */
    
    .container {
      position: relative;
      z-index: 1;
      max-width: 900px;
      width: 100%;
    }

    /* Header Title */
    h3 {
      color: #7A5F5F;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
      padding: 25px;
      background: linear-gradient(135deg, rgba(161, 129, 130, 0.15) 0%, rgba(216, 195, 141, 0.15) 100%);
      border-radius: 20px;
      backdrop-filter: blur(10px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      border: 2px solid rgba(161, 129, 130, 0.2);
      text-align: center;
      margin-bottom: 30px !important;
    }

    h3::before {
      content: '📝 ';
      font-size: 2rem;
      margin-right: 10px;
    }

    /* Card Form */
    .card {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(251, 246, 238, 0.95) 100%);
      border: 2px solid #D8C38D;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.15);
      backdrop-filter: blur(10px);
      position: relative;
      overflow: hidden;
    }

    .card::before {
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

    /* Form Labels */
    label {
      color: #7A5F5F;
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
    }

    label::before {
      margin-right: 8px;
    }

    label[for="user"]::before {
      content: '👤';
    }

    label[for="pass"]::before {
      content: '🔒';
    }

    label[for="pass_confirm"]::before {
      content: '🔐';
    }

    /* Form Controls */
    .form-control {
      border: 2px solid #D8C38D;
      border-radius: 10px;
      padding: 12px 15px;
      transition: all 0.3s ease;
      background: white;
      color: #3B2F2F;
    }

    .form-control:focus {
      border-color: #A18182;
      box-shadow: 0 0 15px rgba(161, 129, 130, 0.3);
      background: white;
      outline: none;
    }

    .form-control::placeholder {
      color: #D8C38D;
      opacity: 0.7;
    }

    /* Buttons */
    .btn-primary {
      background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
      border: none;
      padding: 12px 35px;
      font-weight: 700;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 4px 15px rgba(161, 129, 130, 0.4);
      color: white;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #8B6F70 0%, #7A5F5F 100%);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(161, 129, 130, 0.6);
      color: white;
    }

    .btn-danger {
      background: linear-gradient(135deg, #E5A3A3 0%, #D98F8F 100%);
      border: none;
      padding: 12px 35px;
      font-weight: 700;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 4px 15px rgba(229, 163, 163, 0.4);
      color: white;
    }

    .btn-danger:hover {
      background: linear-gradient(135deg, #D98F8F 0%, #C67B7B 100%);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(229, 163, 163, 0.6);
      color: white;
    }

    .btn i {
      margin-right: 8px;
    }

    /* Login Link */
    .login-link {
      text-align: center;
      margin-top: 20px;
      position: relative;
    }

    .login-link a {
      color: #A18182;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .login-link a:hover {
      color: #7A5F5F;
      text-decoration: underline;
    }

    /* Animation */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card {
      animation: fadeInUp 0.6s ease-out;
    }

    /* Responsive */
    @media (max-width: 768px) {
      body {
        padding: 20px 10px;
      }

      h3 {
        font-size: 1.5rem;
        padding: 15px;
      }

      .card {
        padding: 30px 20px !important;
      }

      .btn-primary, .btn-danger {
        width: 100%;
        margin-bottom: 10px;
      }
    }
    </style>
  </head>
  <body>

  <div class="decoration">🍡</div>
  <div class="decoration">🥟</div>
  <div class="decoration">🍹</div>
  <div class="decoration">🍜</div>
 
  <div class="container">
    <h3>HALAMAN REGISTRASI</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="simpan_register.php" id="registerForm">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="user">Username</label>
            <input type="text" class="form-control" id="user" name="username" placeholder="Masukkan username" required>
            
            <small id="username-error" class="form-text text-danger" style="display:none; font-weight:bold; margin-top:5px;">
              <i class="fas fa-exclamation-circle mr-1"></i>Username sudah ada! Gunakan yang lain.
            </small>
            
          </div>
          <div class="form-group col-md-6">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="password" placeholder="Masukkan password" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="pass_confirm">Konfirmasi Password</label>
            <input type="password" class="form-control" id="pass_confirm" name="password_confirm" placeholder="Masukkan ulang password" required>
            <small id="password-error" class="form-text text-danger" style="display:none;">
              <i class="fas fa-exclamation-circle mr-1"></i>Password tidak cocok!
            </small>
          </div>
        </div>
        
        <div class="mt-4">
          <button type="submit" class="btn btn-primary mr-2" name="register">
            <i class="fas fa-user-plus"></i>Register
          </button>
          <button type="reset" class="btn btn-danger">
            <i class="fas fa-redo"></i>Reset
          </button>
        </div>

        <div class="login-link">
          <small>Sudah punya akun? <a href="index.php">Login di sini</a></small>
        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <script>
    // 1. Password Validation (Kode Lama Kamu)
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      const password = document.getElementById('pass').value;
      const confirmPassword = document.getElementById('pass_confirm').value;
      const errorMessage = document.getElementById('password-error');
      const confirmInput = document.getElementById('pass_confirm');
      
      if (password !== confirmPassword) {
        e.preventDefault();
        errorMessage.style.display = 'block';
        confirmInput.style.borderColor = '#E5A3A3';
        confirmInput.focus();
        return false;
      } else {
        errorMessage.style.display = 'none';
        confirmInput.style.borderColor = '#D8C38D';
      }
    });

    document.getElementById('pass_confirm').addEventListener('input', function() {
      const password = document.getElementById('pass').value;
      const confirmPassword = this.value;
      const errorMessage = document.getElementById('password-error');
      
      if (confirmPassword !== '' && password !== confirmPassword) {
        errorMessage.style.display = 'block';
        this.style.borderColor = '#E5A3A3';
      } else {
        errorMessage.style.display = 'none';
        this.style.borderColor = '#D8C38D';
      }
    });

    // 2. [NEW] Username Validation (Real-time dengan AJAX)
    const userInput = document.getElementById('user');
    const userError = document.getElementById('username-error');
    const submitBtn = document.querySelector('button[name="register"]');

    userInput.addEventListener('input', function() {
        const username = this.value;

        if (username !== "") {
            const formData = new FormData();
            formData.append('username', username);

            // Kirim ke cek_username.php
            fetch('cek_username.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === 'ada') {
                    // Jika Username Ada
                    userError.style.display = 'block';
                    userInput.style.borderColor = '#E5A3A3'; // Warna Merah
                    submitBtn.disabled = true; // Matikan tombol submit
                } else {
                    // Jika Username Aman
                    userError.style.display = 'none';
                    userInput.style.borderColor = '#D8C38D'; // Warna Normal
                    submitBtn.disabled = false; // Hidupkan tombol submit
                }
            })
            .catch(error => console.error('Error:', error));
        } else {
            userError.style.display = 'none';
            userInput.style.borderColor = '#D8C38D';
        }
    });
  </script>
  </body>
</html>
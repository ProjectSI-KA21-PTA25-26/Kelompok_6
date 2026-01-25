<?php 
session_start();
 
$id_menu = $_GET["id_menu"];
unset($_SESSION["pesanan"][$id_menu]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hapus Pesanan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #FBF6EE 0%, #F2E6CF 50%, #E9D9BF 100%);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body>
  
<!-- Include Custom Notification System -->
<div id="customNotification" class="notification-overlay">
  <div class="notification-box">
    <div class="notification-icon" id="notifIcon">✓</div>
    <div class="notification-title" id="notifTitle">Success!</div>
    <div class="notification-message" id="notifMessage">This is a notification message.</div>
    <button class="notification-btn" onclick="closeNotification()">
      <i class="fas fa-check mr-2"></i>OK
    </button>
  </div>
</div>

<style>
/* Notification Overlay */
.notification-overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(5px);
  z-index: 99999;
  animation: fadeIn 0.3s ease;
}

.notification-overlay.show {
  display: flex;
  justify-content: center;
  align-items: center;
}

.notification-box {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(251, 246, 238, 0.98) 100%);
  border: 3px solid #D8C38D;
  border-radius: 25px;
  padding: 40px 50px;
  text-align: center;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
  max-width: 450px;
  width: 90%;
  animation: slideDown 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  position: relative;
  overflow: hidden;
}

.notification-box::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(45deg, transparent, rgba(216, 195, 141, 0.15), transparent);
  transform: rotate(45deg);
  animation: shine 3s infinite;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-100px) scale(0.8);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

@keyframes shine {
  0% { transform: translateX(-100%) rotate(45deg); }
  100% { transform: translateX(100%) rotate(45deg); }
}

.notification-icon {
  font-size: 4rem;
  margin-bottom: 20px;
  animation: bounce 1s ease infinite;
  position: relative;
}

.notification-icon.success {
  color: #A18182;
}

.notification-icon.error {
  color: #E5A3A3;
}

@keyframes bounce {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

.notification-title {
  color: #7A5F5F;
  font-size: 1.8rem;
  font-weight: 700;
  margin-bottom: 15px;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
  position: relative;
}

.notification-message {
  color: #5A4036;
  font-size: 1.1rem;
  margin-bottom: 30px;
  line-height: 1.6;
  position: relative;
}

.notification-btn {
  background: linear-gradient(135deg, #A18182 0%, #8B6F70 100%);
  color: white;
  border: none;
  padding: 12px 40px;
  border-radius: 25px;
  font-size: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(161, 129, 130, 0.4);
  position: relative;
}

.notification-btn:hover {
  background: linear-gradient(135deg, #8B6F70 0%, #7A5F5F 100%);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(161, 129, 130, 0.6);
}

@media (max-width: 480px) {
  .notification-box {
    padding: 30px 25px;
  }

  .notification-icon {
    font-size: 3rem;
  }

  .notification-title {
    font-size: 1.5rem;
  }

  .notification-message {
    font-size: 1rem;
  }
}
</style>

<script>
function showNotification(message, title = '', type = 'success', redirect = null) {
  const overlay = document.getElementById('customNotification');
  const icon = document.getElementById('notifIcon');
  const titleEl = document.getElementById('notifTitle');
  const messageEl = document.getElementById('notifMessage');
  
  const icons = {
    success: '✓',
    error: '✗',
    warning: '⚠',
    info: 'ℹ'
  };
  
  const titles = {
    success: 'Berhasil!',
    error: 'Gagal!',
    warning: 'Peringatan!',
    info: 'Informasi'
  };
  
  icon.textContent = icons[type] || icons.success;
  icon.className = 'notification-icon ' + type;
  titleEl.textContent = title || titles[type];
  messageEl.textContent = message;
  
  overlay.classList.add('show');
  
  if (redirect) {
    overlay.setAttribute('data-redirect', redirect);
  }
}

function closeNotification() {
  const overlay = document.getElementById('customNotification');
  const redirect = overlay.getAttribute('data-redirect');
  
  overlay.classList.remove('show');
  
  if (redirect) {
    setTimeout(() => {
      window.location.href = redirect;
    }, 200);
  }
}

// Auto show notification on page load
window.onload = function() {
  showNotification(
    'Produk telah berhasil dihapus dari keranjang', 
    'Berhasil Dihapus!', 
    'success', 
    'pesanan_pembeli.php'
  );
};

document.getElementById('customNotification')?.addEventListener('click', function(e) {
  if (e.target === this) {
    closeNotification();
  }
});

document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeNotification();
  }
});
</script>

</body>
</html>
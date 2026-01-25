<?php
session_start();
include('koneksi.php');

// Check if struk data exists in session
if(!isset($_SESSION['struk_data']) || empty($_SESSION['struk_data'])) {
    header("location: menu_pembeli.php");
    exit;
}

$struk_data = $_SESSION['struk_data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian - Kedai Takosai</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    
    <style>
        /* ========== SCREEN STYLES ========== */
        body {
            background: linear-gradient(180deg, #FBF6EE 0%, #F2E6CF 50%, #E9D9BF 100%);
             color: #3B2F2F;
             background-attachment: fixed;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .container-wrapper {
            max-width: 800px;
            margin: 0 auto;
        }

        .action-buttons {
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-action {
            padding: 12px 30px;
            margin: 0 10px;
            border-radius: 25px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-print {
            background: linear-gradient(135deg, #27AE60 0%, #229954 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
        }

        .btn-print:hover {
            background: linear-gradient(135deg, #229954 0%, #1E8449 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
        }

        .btn-back {
            background: linear-gradient(135deg, #3498DB 0%, #2980B9 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-back:hover {
            background: linear-gradient(135deg, #2980B9 0%, #21618C 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
        }

        /* ========== STRUK STYLES ========== */
        .struk-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            margin: 0 auto;
        }

        .struk-header {
            text-align: center;
            border-bottom: 2px dashed #7A5F5F;
            padding-bottom: 25px;
            margin-bottom: 25px;
        }

        .struk-logo {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .struk-title {
            font-size: 2rem;
            font-weight: bold;
            color: #7A5F5F;
            margin-bottom: 8px;
        }

        .struk-subtitle {
            font-size: 1rem;
            color: #666;
            margin-bottom: 5px;
        }

        .struk-info {
            background: #F8F9FA;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .struk-info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .struk-info-label {
            color: #666;
            font-weight: 600;
        }

        .struk-info-value {
            color: #333;
            font-weight: bold;
        }

        .struk-items {
            margin-bottom: 25px;
        }

        .struk-items-header {
            background: #7A5F5F;
            color: white;
            padding: 12px;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
            font-size: 1rem;
        }

        .struk-item {
            border-bottom: 1px solid #E0E0E0;
            padding: 15px 12px;
            display: flex;
            justify-content: space-between;
            align-items: start;
        }

        .struk-item:last-child {
            border-bottom: none;
        }

        .struk-item-name {
            flex: 1;
            font-weight: 600;
            color: #333;
            font-size: 1rem;
        }

        .struk-item-qty {
            color: #666;
            margin-right: 20px;
            font-size: 0.95rem;
        }

        .struk-item-price {
            font-weight: bold;
            color: #7A5F5F;
            min-width: 120px;
            text-align: right;
            font-size: 1rem;
        }

        .struk-total {
            border-top: 2px dashed #7A5F5F;
            padding-top: 20px;
            margin-top: 20px;
        }

        .struk-total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 1.1rem;
        }

        .struk-total-row.grand-total {
            font-size: 1.6rem;
            font-weight: bold;
            color: #7A5F5F;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #7A5F5F;
        }

        .struk-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 2px dashed #7A5F5F;
        }

        .struk-thanks {
            font-size: 1.4rem;
            font-weight: bold;
            color: #7A5F5F;
            margin-bottom: 15px;
        }

        .struk-message {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }

        .struk-powered {
            margin-top: 25px;
            font-size: 0.85rem;
            color: #999;
        }

        /* ========== PRINT STYLES ========== */
        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
            }

            .action-buttons {
                display: none !important;
            }

            .container-wrapper {
                max-width: 100%;
                margin: 0;
            }

            .struk-container {
                box-shadow: none;
                border-radius: 0;
                padding: 20px;
                margin: 0;
            }

            .struk-header {
                page-break-after: avoid;
            }

            .struk-items {
                page-break-inside: avoid;
            }

            .struk-item {
                page-break-inside: avoid;
            }

            /* Ensure all content is visible */
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .struk-container {
                padding: 20px;
            }

            .struk-title {
                font-size: 1.5rem;
            }

            .struk-logo {
                font-size: 2rem;
            }

            .btn-action {
                display: block;
                width: 100%;
                margin: 10px 0;
            }

            .struk-item {
                flex-direction: column;
                gap: 5px;
            }

            .struk-item-price {
                text-align: left;
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container-wrapper">
        <!-- Action Buttons (Hidden on Print) -->
        <div class="action-buttons">
            <button class="btn-action btn-print" onclick="window.print()">
                <i class="fas fa-print mr-2"></i>Print Struk
            </button>
            <button class="btn-action btn-back" onclick="window.location.href='menu_pembeli.php'">
                <i class="fas fa-home mr-2"></i>Kembali ke Menu
            </button>
        </div>

        <!-- Struk Content -->
        <div class="struk-container">
            <!-- Header -->
            <div class="struk-header">
                <div class="struk-logo">🐙</div>
                <div class="struk-title">KEDAI TAKOSAI</div>
                <div class="struk-subtitle">Takoyaki In House</div>
                <div class="struk-subtitle">Jl. Bhakti, Cipinang Melayu, Kec. Makasar <br>Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13620</div>
                <div class="struk-subtitle">Telp: 0896-5206-5130</div>
            </div>

            <!-- Info Transaksi -->
            <div class="struk-info">
                <div class="struk-info-row">
                    <span class="struk-info-label">No. Transaksi</span>
                    <span class="struk-info-value">#<?php echo str_pad($struk_data['kode_transaksi'], 5, '0', STR_PAD_LEFT); ?></span>
                </div>
                <div class="struk-info-row">
                    <span class="struk-info-label">Tanggal</span>
                    <span class="struk-info-value"><?php echo date('d/m/Y H:i', strtotime($struk_data['tanggal'] . ' +6 hours')); ?></span>
                </div>
                <div class="struk-info-row">
                    <span class="struk-info-label">Pelanggan</span>
                    <span class="struk-info-value"><?php echo $struk_data['nama_pembeli']; ?></span>
                </div>
                <div class="struk-info-row">
                    <span class="struk-info-label">Pembayaran</span>
                    <span class="struk-info-value"><?php echo $struk_data['metode_pembayaran']; ?></span>
                </div>
            </div>

            <!-- Items -->
            <div class="struk-items">
                <div class="struk-items-header">
                    DETAIL PESANAN
                </div>
                <?php foreach($struk_data['items'] as $item): ?>
                <div class="struk-item">
                    <div class="struk-item-name"><?php echo $item['nama']; ?></div>
                    <div class="struk-item-qty">x<?php echo $item['qty']; ?></div>
                    <div class="struk-item-price">Rp <?php echo number_format($item['subtotal']); ?></div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Total -->
            <div class="struk-total">
                <div class="struk-total-row">
                    <span>Subtotal</span>
                    <span>Rp <?php echo number_format($struk_data['total']); ?></span>
                </div>
                <div class="struk-total-row grand-total">
                    <span>TOTAL</span>
                    <span>Rp <?php echo number_format($struk_data['total']); ?></span>
                </div>
            </div>

            <!-- Footer -->
            <div class="struk-footer">
                <div class="struk-thanks">✨ Terima Kasih! ✨</div>
                <div class="struk-message">
                    Selamat menikmati hidangan Anda.<br>
                    Silakan kembali lagi! 😊
                </div>
                <div class="struk-powered">
                    Powered by Kedai Takosai POS System
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        // Auto print on load (optional - comment out if not needed)
        // window.addEventListener('load', function() {
        //     setTimeout(function() {
        //         window.print();
        //     }, 500);
        // });
    </script>
</body>
</html>
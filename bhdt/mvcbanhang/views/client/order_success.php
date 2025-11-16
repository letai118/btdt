<?php
ob_start();
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đặt hàng thành công</title>
    <style>
        body{font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;background:#fff9fb;padding:36px}
        .wrap{max-width:780px;margin:0 auto}
        .card{background:#fff;padding:20px;border-radius:10px;box-shadow:0 8px 30px rgba(236,72,153,0.06)}
        .summary{margin-top:12px}
        .summary table{width:100%;border-collapse:collapse}
        .summary th,.summary td{padding:8px;border-bottom:1px solid #f3e6ef}
        .ok{display:inline-block;margin-top:12px;padding:10px 14px;background:linear-gradient(90deg,#34d399,#10b981);color:#fff;border-radius:8px;text-decoration:none}
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <h2>Đặt hàng thành công</h2>
            <?php if (isset($order) && $order): ?>
                <p>Mã đơn hàng: <strong>#<?= htmlspecialchars($order['id']) ?></strong></p>
                <p>Khách hàng: <?= htmlspecialchars($order['customer_name']) ?> - <?= htmlspecialchars($order['customer_phone']) ?></p>
                <div class="summary">
                    <h4>Chi tiết đơn</h4>
                    <table>
                        <thead><tr><th>Sản phẩm</th><th>SL</th><th>Giá</th></tr></thead>
                        <tbody>
                        <?php foreach ($order['items'] as $it): ?>
                            <tr>
                                <td><?= htmlspecialchars($it['product_name']) ?></td>
                                <td><?= $it['quantity'] ?></td>
                                <td><?= number_format($it['price']) ?> đ</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p style="margin-top:12px;font-weight:700">Tổng: <?= number_format($order['total']) ?> đ</p>
                </div>
                <a href="./client.php" class="ok">Tiếp tục mua sắm</a>
            <?php else: ?>
                <p>Không tìm thấy đơn hàng.</p>
                <a href="./client.php">Về trang chủ</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
$content = ob_get_clean();
include "layout.php";
?>

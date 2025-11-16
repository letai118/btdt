<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thanh toán - Cửa hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body{font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;background:#fff1f7;margin:0;padding:24px}
        .wrap{max-width:1000px;margin:0 auto}
        .card{background:#fff;padding:20px;border-radius:10px;box-shadow:0 6px 20px rgba(0,0,0,0.06)}
        form .row{display:flex;gap:12px}
        .col{flex:1}
        input,textarea{width:100%;padding:10px;border:1px solid #f3c6df;border-radius:8px}
        table{width:100%;border-collapse:collapse;margin-top:12px}
        th,td{padding:8px;text-align:left;border-bottom:1px solid #f3e6ef}
        .actions{display:flex;justify-content:space-between;align-items:center;margin-top:12px}
        .btn{background:linear-gradient(90deg,#ec4899,#f472b6);color:#fff;padding:10px 14px;border-radius:8px;border:none;cursor:pointer}
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <h2>Thanh toán</h2>
            <?php $cart = $_SESSION['cart'] ?? []; ?>
            <?php if (empty($cart)): ?>
                <p>Giỏ hàng của bạn đang trống. <a href="./client.php">Tiếp tục mua sắm</a></p>
            <?php else: ?>
                <form action="./client.php?controller=client&action=placeOrder" method="POST">
                    <div style="display:flex;gap:16px;align-items:flex-start">
                        <div style="flex:2">
                            <h3>Thông tin người nhận</h3>
                            <div class="row">
                                <div class="col">
                                    <label>Họ và tên</label>
                                    <input type="text" name="name" required />
                                </div>
                                <div class="col">
                                    <label>Email</label>
                                    <input type="email" name="email" />
                                </div>
                            </div>
                            <div style="height:8px"></div>
                            <div class="row">
                                <div class="col">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="phone" />
                                </div>
                                <div class="col">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" />
                                </div>
                            </div>
                            <div style="height:8px"></div>
                            <label>Ghi chú</label>
                            <textarea name="note"></textarea>
                        </div>
                        <div style="flex:1">
                            <h3>Đơn hàng</h3>
                            <table>
                                <thead>
                                    <tr><th>Sản phẩm</th><th>SL</th><th>Giá</th></tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; foreach ($cart as $it): $total += $it['price']*$it['quantity']; ?>
                                    <tr>
                                        <td><?= htmlspecialchars($it['name']) ?></td>
                                        <td><?= $it['quantity'] ?></td>
                                        <td><?= number_format($it['price']) ?> đ</td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div style="margin-top:12px;font-weight:700">Tổng: <?= number_format($total) ?> đ</div>
                            <div class="actions">
                                <button class="btn" type="submit">Xác nhận & Thanh toán</button>
                                <a href="./client.php?controller=client&action=cart" style="text-decoration:none;margin-left:8px">Quay lại giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
$content = ob_get_clean();
include "layout.php";
?>

<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - Cửa hàng điện thoại</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root{--primary:#ec4899;--muted:#6b7280}
        body{font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;background:#fff1f7;margin:0;padding:18px}
        .container{max-width:1100px;margin:0 auto}
        .card{background:#fff;padding:18px;border-radius:10px;box-shadow:0 4px 20px rgba(0,0,0,0.06)}
        table{width:100%;border-collapse:collapse}
        th,td{padding:12px;text-align:left;border-bottom:1px solid #f3e6ef}
        th{color:var(--muted)}
        .product img{width:80px;height:60px;object-fit:cover;border-radius:8px}
        .qty input{width:72px;padding:6px;border-radius:6px;border:1px solid #f3c6df}
        .actions a{color:#ef4444;text-decoration:none}
        .total{display:flex;justify-content:flex-end;align-items:center;margin-top:12px}
        .btn{background:linear-gradient(90deg,var(--primary),#f472b6);color:#fff;padding:10px 14px;border-radius:8px;border:none;cursor:pointer}
        .empty{padding:24px;text-align:center;color:#6b7280}
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2><i class="fa fa-shopping-cart"></i> Giỏ hàng của bạn</h2>

            <?php $cart = $_SESSION['cart'] ?? []; ?>

            <?php if (empty($cart)): ?>
                <div class="empty">Giỏ hàng trống. <a href="./client.php">Tiếp tục mua sắm</a></div>
            <?php else: ?>
                <?php $total = 0; foreach ($cart as $id => $item): $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; endforeach; ?>
                <div style="display:flex;gap:18px;flex-wrap:wrap">
                    <div style="flex:2;min-width:320px">
                        <form action="./client.php?controller=client&action=updateCart" method="POST">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $id => $item): ?>
                                        <?php $subtotal = $item['price'] * $item['quantity']; ?>
                                        <tr>
                                            <td class="product">
                                                <div style="display:flex;gap:12px;align-items:center">
                                                    <img src="<?= htmlspecialchars($item['image'] ?? './images/no-image.png') ?>" alt="">
                                                    <div>
                                                        <div style="font-weight:600"><?= htmlspecialchars($item['name']) ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= number_format($item['price']) ?> đ</td>
                                            <td class="qty">
                                                <input type="number" name="quantities[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="0">
                                            </td>
                                            <td><?= number_format($subtotal) ?> đ</td>
                                            <td class="actions">
                                                <a href="./client.php?controller=client&action=removeCartItem&id=<?= $item['id'] ?>">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <div style="margin-top:12px">
                                <button type="submit" class="btn">Cập nhật giỏ hàng</button>
                                <a href="./client.php" style="margin-left:8px;display:inline-block" class="btn">Tiếp tục mua</a>
                            </div>
                        </form>
                    </div>

                    <aside style="flex:1;min-width:240px">
                        <div style="background:#fff;padding:12px;border-radius:8px;box-shadow:0 4px 16px rgba(0,0,0,0.06)">
                            <h3>Đơn hàng</h3>
                            <?php foreach ($cart as $item): $s = $item['price']*$item['quantity']; ?>
                                <div style="display:flex;gap:10px;align-items:center;padding:8px 0;border-bottom:1px solid #f3e6ef">
                                    <img src="<?= htmlspecialchars($item['image'] ?? './images/no-image.png') ?>" alt="" style="width:48px;height:36px;object-fit:cover;border-radius:6px">
                                    <div style="flex:1">
                                        <div style="font-weight:600;font-size:14px"><?= htmlspecialchars($item['name']) ?></div>
                                        <div style="font-size:13px;color:#6b7280">x<?= (int)$item['quantity'] ?> • <?= number_format($item['price']) ?> đ</div>
                                    </div>
                                    <div style="font-weight:700"><?= number_format($s) ?> đ</div>
                                </div>
                            <?php endforeach; ?>

                            <div style="display:flex;justify-content:space-between;padding-top:12px;font-weight:700"> 
                                <div>Tổng:</div>
                                <div><?= number_format($total) ?> đ</div>
                            </div>

                            <div style="margin-top:12px;display:flex;gap:8px;justify-content:flex-end">
                                <a href="./client.php?controller=client&action=checkout" class="btn" style="background:#10b981">Thanh toán</a>
                            </div>
                        </div>
                    </aside>
                </div>
            <?php endif; ?>

        </div>
    </div>
</body>
</html>

<?php
$content = ob_get_clean();
include "./../views/client/layout.php";
?>

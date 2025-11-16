<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - Cửa hàng điện thoại</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root{
            --primary:#ec4899;
            --bg:#fff1f7;
            --card:#fff0f6;
            --shadow:0 6px 24px rgba(0,0,0,0.08);
            --text:#3a223b;
        }
        *{box-sizing:border-box;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif}
        body{background:var(--bg);margin:0;padding:0}
        .contact-wrap{max-width:1000px;margin:36px auto;padding:20px}
        .contact-card{background:var(--card);border-radius:12px;padding:24px;box-shadow:var(--shadow)}
        h1{color:var(--text);margin-bottom:12px}
        p.lead{color:#6b7280;margin-bottom:18px}
        form .row{display:flex;gap:12px}
        form .col{flex:1}
        input[type=text], input[type=email], textarea{width:100%;padding:12px;border:1px solid #f3c6df;border-radius:8px;background:#fff}
        textarea{min-height:140px;resize:vertical}
        .btn{background:linear-gradient(90deg,var(--primary),#f472b6);color:#fff;padding:10px 18px;border:none;border-radius:10px;cursor:pointer}
        .info{margin-top:16px;color:#374151}
        .success{background:#d1fae5;color:#065f46;padding:12px;border-radius:8px;margin-bottom:12px}
        @media(max-width:700px){form .row{flex-direction:column}}
    </style>
</head>
<body>
    <div class="contact-wrap">
        <div class="contact-card">
            <h1><i class="fas fa-envelope"></i> Liên hệ</h1>
            <p class="lead">Gửi câu hỏi hoặc phản hồi cho chúng tôi. Chúng tôi sẽ liên hệ lại trong thời gian sớm nhất.</p>

            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <div class="success">Cảm ơn bạn! Tin nhắn đã được gửi thành công.</div>
            <?php endif; ?>

            <form action="./contact.php?controller=contact&action=sendMessage" method="POST">
                <div class="row">
                    <div class="col">
                        <label>Họ và tên</label>
                        <input type="text" name="name" required />
                    </div>
                    <div class="col">
                        <label>Email</label>
                        <input type="email" name="email" required />
                    </div>
                </div>
                <div style="height:12px"></div>
                <div class="row">
                    <div class="col">
                        <label>Số điện thoại</label>
                        <input type="text" name="phone" />
                    </div>
                    <div class="col">
                        <label>Chủ đề</label>
                        <input type="text" name="subject" />
                    </div>
                </div>
                <div style="height:12px"></div>
                <div>
                    <label>Nội dung</label>
                    <textarea name="message" required></textarea>
                </div>
                <div style="height:12px"></div>
                <button type="submit" class="btn">Gửi liên hệ</button>

                <div class="info">
                    <p><strong>Địa chỉ:</strong> Số 3 , Đường Phan Trọng tuệ, Huyện Thanh Trì , Hà Nội</p>
                    <p><strong>Hotline:</strong> 0123 456 999 </p>
                    <p><strong>Email:</strong> caubeangia118@gmail.com </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
$content = ob_get_clean();
include "./../views/client/layout.php";
?>

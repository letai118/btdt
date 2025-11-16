<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Bán điện thoại</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ec4899;
            --hover-color: #be185d;
            --text-color: #3a223b;
            --border-color: #f9a8d4;
            --background-light: #fff1f7;
            --background-white: #fff0f6;
            --shadow: 0 2px 12px 0 rgba(236,72,153,0.07);
        }
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        body {
            background: var(--background-light);
        }
        a {
            text-decoration: none;
            color: var(--text-color);
            transition: color 0.2s;
        }
        #header {
            width: 100%;
            background: var(--background-white);
            box-shadow: var(--shadow);
            border-radius: 0 0 18px 18px;
            overflow: hidden;
        }
        #nav_1 {
            height: 38px;
            line-height: 38px;
            font-size: 15px;
            background: linear-gradient(90deg, #f9a8d4 0%, #fff1f7 100%);
            padding: 0 18px;
            border-bottom: 1px solid var(--border-color);
        }
        .nav_ul {
            display: flex;
            justify-content: flex-end;
            gap: 18px;
        }
        .nav_li {
            padding: 0 10px;
            position: relative;
        }
        .border_r {
            border-right: 1px solid var(--border-color);
            padding-right: 12px;
        }
        .nav_li a {
            color: var(--primary-color);
            font-weight: 500;
            transition: color 0.2s;
        }
        .nav_li a:hover {
            color: var(--hover-color);
        }
        /* Cart badge */
        .cart_badge {
            display:inline-block;
            min-width:18px;
            height:18px;
            padding:0 6px;
            background:#ef4444;
            color:#fff;
            font-size:12px;
            line-height:18px;
            border-radius:12px;
            text-align:center;
            position:relative;
            top:-6px;
            margin-left:6px;
            font-weight:700;
        }
        /* Cart preview dropdown */
        .cart_preview {
            position: absolute;
            right: 0;
            top: 42px;
            width: 360px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            padding: 10px;
            display: none;
            z-index: 3000;
        }
        .cart_preview.show { display: block; }
        .cart_item { display:flex; gap:10px; padding:8px 6px; align-items:center; border-bottom:1px solid #f3e6ef }
        .cart_item img{width:56px;height:44px;object-fit:cover;border-radius:6px}
        .cart_item .meta{flex:1}
        .cart_item .meta .name{font-weight:600;font-size:14px}
        .cart_item .meta .qty{font-size:13px;color:#6b7280}
        .cart_preview .summary{padding:8px 6px;display:flex;justify-content:space-between;align-items:center}
        .cart_preview .actions{display:flex;gap:8px;justify-content:flex-end;padding-top:6px}
        .cart_preview .btn_small{background:var(--primary-color);color:#fff;padding:8px 10px;border-radius:8px;text-decoration:none}
        .cart_preview .btn_sec{background:#f3f4f6;color:#111;padding:8px 10px;border-radius:8px;text-decoration:none}
        #search {
            display: flex;
            align-items: center;
            height: 90px;
            padding: 0 32px;
            background: var(--background-white);
            gap: 32px;
            border-bottom: 1px solid var(--border-color);
        }
        .logo {
            flex: 1;
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 64px;
            object-fit: contain;
            filter: drop-shadow(0 2px 8px rgba(37,99,235,0.08));
        }
        .form_search {
            flex: 5;
            display: flex;
            gap: 12px;
            background: #fce7f3;
            border-radius: 10px;
            box-shadow: 0 1px 6px 0 rgba(236,72,153,0.06);
            padding: 6px 10px;
        }
        .txt_search {
            flex: 4;
            padding: 12px 14px;
            border: 1px solid var(--primary-color);
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border 0.2s;
        }
        .txt_search:focus {
            border: 1.5px solid var(--hover-color);
        }
        .btn_search {
            flex: 1;
            padding: 12px 0;
            border: none;
            background: linear-gradient(90deg, var(--primary-color), #f472b6);
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 2px 8px 0 rgba(236,72,153,0.10);
            transition: background 0.2s, box-shadow 0.2s;
        }
        .btn_search:hover {
            background: linear-gradient(90deg, var(--hover-color), #ec4899);
            box-shadow: 0 4px 16px 0 rgba(236,72,153,0.13);
        }
        #menu {
            background: linear-gradient(90deg, var(--primary-color) 60%, #f472b6 100%);
            height: 58px;
            box-shadow: 0 2px 8px 0 rgba(236,72,153,0.07);
            position: relative;
            display: flex;
            align-items: center; /* vertical center children */
            padding: 0 12px;
        }
        /* Hamburger + dropdown categories */
        .hamburger {
            display: inline-flex; /* always visible alongside horizontal menu */
            background: transparent;
            border: none;
            color: #fff;
            font-size: 22px;
            cursor: pointer;
            padding: 10px 14px;
            border-radius: 8px;
            margin-left: 8px;
            align-items: center;
        }
        .hamburger:hover { background: rgba(255,255,255,0.06); }
        .cat_dropdown {
            position: absolute;
            top: 58px;
            left: 12px;
            min-width: 200px;
            background: #fff;
            color: #333;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            display: none;
            z-index: 2000;
            padding: 8px;
        }
        .cat_dropdown.show { display: block; }
        .cat_dropdown ul { list-style: none; margin: 0; padding: 0; }
        .cat_dropdown li { margin: 6px 0; }
        .cat_dropdown a { color: #333; display: block; padding: 8px 10px; border-radius: 6px; }
        .cat_dropdown a:hover { background: #fff0f6; color: var(--primary-color); }
        .menu_ul {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0 8px;
        }
        .menu_li {
            flex: 0 0 auto; /* don't stretch — keep items sized by content */
        }
        .menu_li a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            height: 40px;
            padding: 0 12px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            border-radius: 8px;
            margin: 0 6px;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            line-height: 1;
        }
        .menu_li a:hover {
            background: #fff;
            color: var(--primary-color);
            box-shadow: 0 2px 8px 0 rgba(236,72,153,0.10);
        }
        /* Banner slideshow */
        #banner {
            width: 98%;
            height: 340px;
            margin: 18px auto 0 auto;
            overflow: hidden;
            position: relative;
            border-radius: 18px;
            box-shadow: 0 4px 24px 0 rgba(236,72,153,0.10);
            background: #fce7f3;
        }
        .slider {
            width: 100%;
            height: 100%;
            position: relative;
        }
        .slide {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            opacity: 0;
            transition: opacity 1.2s cubic-bezier(0.4,0,0.2,1);
            border-radius: 18px;
        }
        .slide.active {
            opacity: 1;
            z-index: 1;
        }
        /* Responsive */
        @media (max-width: 900px) {
            #search { flex-direction: column; height: auto; gap: 12px; padding: 12px; }
            .form_search { width: 100%; }
            .logo { justify-content: center; }
            #banner { height: 180px; }
            .menu_li a { font-size: 15px; }
            .cat_dropdown { left: 8px; }
        }
        @media (max-width: 600px) {
            #header { border-radius: 0; }
            #banner { height: 120px; }
            .logo img { height: 40px; }
            .form_search { padding: 4px 4px; }
            .txt_search, .btn_search { font-size: 13px; padding: 8px 6px; }
        }
    </style>
</head>
<body>
    <div id="header">
        <div id="nav_1">
            <ul class="nav_ul">
                <li class="nav_li">
                    <a href="#"><i class="far fa-bell"></i> Khuyến mãi</a>
                </li>
                <!-- Icon giỏ hàng ở giữa -->
                <li class="nav_li">
                    <?php
                        $cart = $_SESSION['cart'] ?? [];
                        $cartCount = 0;
                        if (!empty($cart)) {
                            foreach ($cart as $it) {
                                $cartCount += (int)($it['quantity'] ?? 0);
                            }
                        }
                    ?>
                    <div style="position:relative;display:inline-block">
                        <a href="./client.php?controller=client&action=cart" title="Giỏ hàng" id="headerCartBtn"><i class="fa fa-shopping-cart"></i><?php if ($cartCount>0): ?><span class="cart_badge"><?= $cartCount ?></span><?php endif; ?></a>

                        <div class="cart_preview" id="cartPreview" aria-hidden="true">
                            <?php if (empty($cart)): ?>
                                <div style="padding:12px;color:#6b7280">Giỏ hàng trống</div>
                                <div class="actions"><a class="btn_small" href="./client.php">Mua sắm</a></div>
                            <?php else: ?>
                                <?php $previewTotal = 0; $count = 0; foreach ($cart as $it): $count++; if ($count>5) break; $subtotal = ($it['price'] ?? 0) * ($it['quantity'] ?? 1); $previewTotal += $subtotal; ?>
                                    <div class="cart_item">
                                        <img src="<?= htmlspecialchars($it['image'] ?? './images/no-image.png') ?>" alt="">
                                        <div class="meta">
                                            <div class="name"><?= htmlspecialchars($it['name']) ?></div>
                                            <div class="qty">Số lượng: <?= (int)$it['quantity'] ?> • <?= number_format($it['price']) ?> đ</div>
                                        </div>
                                        <div style="font-weight:700"><?= number_format($subtotal) ?> đ</div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="summary"><div style="color:#6b7280">Tổng tạm</div><div style="font-weight:700"><?= number_format($previewTotal) ?> đ</div></div>
                                <div class="actions">
                                    <a class="btn_sec" href="./client.php?controller=client&action=cart">Xem giỏ hàng</a>
                                    <a class="btn_small" href="./client.php?controller=client&action=checkout">Thanh toán</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <li class="nav_li">
                    <a href="#"><i class="far fa-question-circle"></i> Hỗ trợ</a>
                </li>
                <?php if (isset($_SESSION['client']) && $_SESSION['client']): ?>
                    <li class="nav_li"><a href="./client.php?controller=client&action=logout" class="border_r">Đăng xuất</a></li>
                    <li class="nav_li"><?= $_SESSION['client']['username'] ?></li>
                <?php else: ?>
                    <li class="nav_li"><a href="#" class="border_r">Đăng ký</a></li>
                    <li class="nav_li"><a href="./auth.php">Đăng nhập</a></li>
                <?php endif ?>
            </ul>
        </div>

        <div id="search">
            <div class="logo">
                <a href="./client.php">
                    <img src="./images/logo.png" alt="Logo cửa hàng điện thoại" />
                </a>
            </div>
            <form action="./client.php" method="GET" class="form_search">
                <input type="hidden" name="controller" value="client">
                <input type="hidden" name="action" value="search">
                <input type="text" class="txt_search" placeholder="Tìm kiếm điện thoại..." name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" />
                <button class="btn_search" type="submit">Tìm kiếm</button>
            </form>
        </div>

        <div id="menu">
            <button class="hamburger" id="catToggle" aria-label="Mở danh mục"><i class="fa fa-bars"></i></button>

            <?php
            // Tìm id của các danh mục thương hiệu nếu có
            $iphoneId = null; $samsungId = null; $xiaomiId = null;
            if (isset($category) && is_array($category)) {
                foreach ($category as $c) {
                    $n = strtolower(trim($c['name']));
                    if (strpos($n, 'iphone') !== false) $iphoneId = $c['id'];
                    if (strpos($n, 'sam') !== false || strpos($n, 'samsung') !== false) $samsungId = $c['id'];
                    if (strpos($n, 'xiaomi') !== false) $xiaomiId = $c['id'];
                }
            }
            ?>

            <ul class="menu_ul">
                <li class="menu_li"><a href="<?= $iphoneId ? "./client.php?controller=client&action=findCategory&category_id=$iphoneId" : './client.php?controller=client&action=search&search=iphone' ?>">iPhone</a></li>
                <li class="menu_li"><a href="<?= $samsungId ? "./client.php?controller=client&action=findCategory&category_id=$samsungId" : './client.php?controller=client&action=search&search=samsung' ?>">Samsung</a></li>
                <li class="menu_li"><a href="<?= $xiaomiId ? "./client.php?controller=client&action=findCategory&category_id=$xiaomiId" : './client.php?controller=client&action=search&search=xiaomi' ?>">Xiaomi</a></li>
                <li class="menu_li"><a href="./tintuc.php">Tin tức công nghệ</a></li>
                <li class="menu_li"><a href="./contact.php">Liên hệ</a></li>
            </ul>

            <div class="cat_dropdown" id="catDropdown" aria-hidden="true">
                <ul>
                    <?php if (isset($category) && !empty($category)): ?>
                        <?php foreach ($category as $cat): ?>
                            <?php $lower = strtolower($cat['name']); ?>
                            <?php if (strpos($lower,'iphone')!==false || strpos($lower,'sam')!==false || strpos($lower,'xiaomi')!==false || strpos($lower,'redmi')!==false): ?>
                                <li>
                                    <a href="./client.php?controller=client&action=findCategory&category_id=<?= $cat['id'] ?>"><?= $cat['name'] ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li style="padding:8px 10px;">Không có danh mục</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Banner Slideshow -->
        <div id="banner">
            <div class="slider">
                <img src="./images/banner1.png" class="slide active" alt="Banner 1" />
                <img src="./images/banner4.png" class="slide" alt="Banner 2" />
                <img src="./images/banner5.png" class="slide" alt="Banner 3" />
            </div>
        </div>
    </div>

    <!-- Script chuyển slide -->
    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');

        function showNextSlide() {
            slides[slideIndex].classList.remove('active');
            slideIndex = (slideIndex + 1) % slides.length;
            slides[slideIndex].classList.add('active');
        }

        setInterval(showNextSlide, 4000);
    </script>
    <script>
        // Toggle categories dropdown (hamburger)
        (function(){
            const btn = document.getElementById('catToggle');
            const dropdown = document.getElementById('catDropdown');
            if (!btn || !dropdown) return;

            function open() {
                dropdown.classList.add('show');
                dropdown.setAttribute('aria-hidden','false');
            }
            function close() {
                dropdown.classList.remove('show');
                dropdown.setAttribute('aria-hidden','true');
            }

            btn.addEventListener('click', function(e){
                e.stopPropagation();
                if (dropdown.classList.contains('show')) close(); else open();
            });

            // Close when clicking outside
            document.addEventListener('click', function(e){
                const target = e.target;
                if (!dropdown.contains(target) && target !== btn && !btn.contains(target)) {
                    close();
                }
            });

            // Close on Esc
            document.addEventListener('keydown', function(e){ if (e.key === 'Escape') close(); });
        })();
    </script>
    <script>
        // Cart preview toggle (open on hover and click)
        (function(){
            const btn = document.getElementById('headerCartBtn');
            const preview = document.getElementById('cartPreview');
            if (!btn || !preview) return;

            let hideTimeout = null;
            function open() {
                preview.classList.add('show');
                preview.setAttribute('aria-hidden','false');
            }
            function close() {
                preview.classList.remove('show');
                preview.setAttribute('aria-hidden','true');
            }

            btn.addEventListener('mouseenter', open);
            btn.addEventListener('click', function(e){ e.preventDefault(); open(); });
            btn.addEventListener('mouseleave', function(){ hideTimeout = setTimeout(close, 300); });
            preview.addEventListener('mouseenter', function(){ if (hideTimeout) { clearTimeout(hideTimeout); hideTimeout = null; } });
            preview.addEventListener('mouseleave', function(){ hideTimeout = setTimeout(close, 250); });
            // Close on outside click
            document.addEventListener('click', function(e){ if (!preview.contains(e.target) && e.target !== btn && !btn.contains(e.target)) close(); });
        })();
    </script>
</body>
</html>

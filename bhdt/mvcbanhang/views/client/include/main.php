<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
.content1 {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 32px;
    margin-top: 24px;
    margin-bottom: 40px; /* Thêm khoảng cách với phần dưới */
    max-height: 500px;        /* Giới hạn chiều cao */
    overflow-y: auto;         /* Cho phép cuộn dọc */
    padding-right: 8px;       /* Để không che mất sản phẩm bởi thanh cuộn */
}

.content {
    margin-bottom: 0;
}

.content_new {
    margin-top: 48px; /* Tạo khoảng cách rõ ràng với phần trên */
    padding-top: 8px;
}

.content12 {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    padding: 16px;
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 2px solid #f0ad4e; /* Thêm khung viền nổi bật */
    position: relative;
}

.content12:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    border-color: #ff9800; /* Đổi màu viền khi hover */
}

.content12 img {
    border-radius: 12px;
    margin-bottom: 12px;
    object-fit: cover;
}

.content12 span {
    display: block;
    margin: 6px 0;
    font-size: 1.1rem;
    font-weight: 500;
}

.btn_muahang {
    margin-top: 10px;
    padding: 8px 24px;
    background: linear-gradient(90deg, #ff9800, #ff5722);
    color: #fff;
    border: none;
    border-radius: 24px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.2s;
    box-shadow: 0 2px 8px rgba(255,152,0,0.12);
}

.btn_muahang:hover {
    background: linear-gradient(90deg, #ff5722, #ff9800);
    color: #fff;
}

.btn_cart {
    position: absolute;
    top: 12px;
    right: 12px;
    background: #fff;
    border: 2px solid #ff9800;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    color: #111 !important;
    box-shadow: 0 2px 8px rgba(255,152,0,0.10);
    transition: color 0.2s, border-color 0.2s, box-shadow 0.2s;
    z-index: 2;
}

.btn_cart:hover {
    color: #333 !important;
    border-color: #ff5722 !important;
    box-shadow: 0 4px 16px rgba(255,87,34,0.15);
    transform: scale(1.12);
}

.new_item {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
    margin-top: 24px;
}

.item1 {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    padding: 16px 12px 18px 12px;
    text-align: center;
    transition: box-shadow 0.2s, transform 0.2s;
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
}

.item1:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    transform: translateY(-6px) scale(1.03);
}

.item1 img {
    width: 100%;
    max-width: 180px;
    height: 120px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 12px;
    transition: transform 0.25s;
}

.item1:hover img {
    transform: scale(1.08) rotate(-2deg);
}

.text_new {
    font-size: 1.05rem;
    font-weight: 500;
    color: #333;
    margin-top: 6px;
}

/* Thêm kiểu dáng cho modal mô tả sản phẩm */
.modal_desc {
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    display: none;
}

.modal_content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.close_desc {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close_desc:hover,
.close_desc:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
<div id="main">
    <div id="main_top">
        <!-- Tin tức & sự kiện -->
        <div class="sidebar">
            <h2 class="text_title">Tin tức & Sự kiện</h2>
            <div class="new">
                <!-- Sự kiện 1 -->
                <div class="sidebar_ct">
                    <div class="images">
                        <img src="./images/tintuc1.jpg" alt="" />
                    </div>
                    <div class="list_new">
                        <a href="">7 Mẫu điện thoại nổi bật tháng này bạn không nên bỏ qua</a>
                    </div>
                </div>
                <!-- Sự kiện 2 -->
                <div class="sidebar_ct">
                    <div class="images">
                        <img src="./images/tintuc2.jpg" alt="" />
                    </div>
                    <div class="list_new">
                        <a href="">Top 5 smartphone pin trâu, hiệu năng mạnh trong tầm giá</a>
                    </div>
                </div>
                <!-- Sự kiện 3 -->
                <div class="sidebar_ct">
                    <div class="images">
                        <img src="./images/tintuc3.jpg" alt="" />
                    </div>
                    <div class="list_new">
                        <a href="">Hướng dẫn chọn mua điện thoại phù hợp nhu cầu</a>
                    </div>
                </div>
                <!-- Sự kiện 4 -->
                <div class="sidebar_ct">
                    <div class="images">
                        <img
                            src="./images/tintuc4.jpg"
                            alt=""
                            width="200px"
                            height="130px" />
                    </div>
                    <div class="list_new">
                        <a href="">So sánh iPhone và Android: Nên chọn hệ điều hành nào?</a>
                    </div>
                </div>
                <!-- Sự kiện 5 -->
                <div class="sidebar_ct">
                    <div class="images">
                        <img
                            src="./images/tintuc5.jpg"
                            alt=""
                            width="200px"
                            height="130px" />
                    </div>
                    <div class="list_new">
                        <a href="">Cách bảo quản và sử dụng điện thoại đúng cách</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sản phẩm nổi bật -->
        <div class="content">
            <h2 class="text_title note">Điện thoại nổi bật</h2>
            <div class="content1">
                <?php foreach ($products as $pr): ?>
                    <div class="content12" style="position: relative;">
                        <a href="javascript:void(0);" onclick="showDescription('desc_<?= $pr['id'] ?>')">
                            <img src="<?= $pr['image'] ?>" alt="" width="250px" height="200px" />
                        </a>
                            <!-- Icon giỏ hàng ở góc phải trên: thêm 1 sản phẩm rồi chuyển đến giỏ hàng -->
                            <a href="./client.php?controller=client&action=addToCart&id=<?= $pr['id'] ?>" class="btn_cart" title="Thêm vào giỏ và xem giỏ">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        <span><?= $pr['name'] ?></span>
                        <span style="color: orange"><?= number_format($pr['price']) ?><sup>đ</sup></span>
                        <a href="./client.php?controller=client&action=addToCart&id=<?= $pr['id'] ?>" class="btn_muahang" style="margin-top: 10px;">Đặt Hàng </a>
                        <!-- Modal mô tả sản phẩm -->
                        <div id="desc_<?= $pr['id'] ?>" class="modal_desc" style="display:none;">
                            <div class="modal_content">
                                <span class="close_desc" onclick="hideDescription('desc_<?= $pr['id'] ?>')">&times;</span>
                                <h3><?= $pr['name'] ?></h3>
                                <p><?= !empty($pr['description']) ? $pr['description'] : 'Chưa có mô tả cho sản phẩm này.' ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="content_new">
        <h2 class="text_title1">Bài viết nổi bật</h2>
        <div class="new_item">
            <div class="item1">
                <img src="./images/new1.jpg" alt="" />
                <p class="text_new">
                    Nơi mua điện thoại chính hãng giá tốt tại HÀ NỘI
                </p>
            </div>
            <div class="item1">
                <img src="./images/new2.jpg" alt="" />
                <p class="text_new">
                    Các thương hiệu smartphone phổ biến và uy tín hiện nay
                </p>
            </div>
            <div class="item1">
                <img src="./images/new3.jpg" alt="" />
                <p class="text_new">
                    Kinh nghiệm mua điện thoại trả góp không cần trả trước
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function showDescription(descId) {
    document.getElementById(descId).style.display = "block";
}

function hideDescription(descId) {
    document.getElementById(descId).style.display = "none";
}
</script>

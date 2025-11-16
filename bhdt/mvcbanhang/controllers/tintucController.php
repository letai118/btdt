<?php
require_once "./../models/categoryModel.php";

class tintucController
{
    private $modelCategory;
    
    public function __construct()
    {
        $this->modelCategory = new categoryModel();
    }

    public function index()
    {
        // Hiển thị danh mục cho header
        $category = $this->modelCategory->getAll();
        
        // Dữ liệu tin tức mẫu
        $news = [
            [
                'id' => 1,
                'title' => '7 Mẫu điện thoại nổi bật tháng này bạn không nên bỏ qua',
                'image' => './images/tintuc1.jpg',
                'summary' => 'Khám phá 7 mẫu điện thoại hot nhất tháng này với những tính năng đột phá và thiết kế hiện đại.',
                'content' => 'Tháng này, thị trường smartphone lại sôi động với những mẫu điện thoại mới được ra mắt. Từ iPhone 15 Pro Max với chip A17 Pro mạnh mẽ, Samsung Galaxy S24 Ultra với S Pen tích hợp, đến Xiaomi 14 Ultra với camera Leica chuyên nghiệp...',
                'date' => '2024-01-15',
                'author' => 'Admin'
            ],
            [
                'id' => 2,
                'title' => 'Top 5 smartphone pin trâu, hiệu năng mạnh trong tầm giá',
                'image' => './images/tintuc2.jpg',
                'summary' => 'Tổng hợp 5 smartphone có pin khủng và hiệu năng tốt nhất trong tầm giá dưới 10 triệu đồng.',
                'content' => 'Với ngân sách dưới 10 triệu đồng, bạn vẫn có thể sở hữu những chiếc smartphone có pin trâu và hiệu năng mạnh. Các mẫu như Realme, Xiaomi, OPPO đều có những sản phẩm chất lượng tốt...',
                'date' => '2024-01-12',
                'author' => 'Tech Reviewer'
            ],
            [
                'id' => 3,
                'title' => 'Hướng dẫn chọn mua điện thoại phù hợp nhu cầu',
                'image' => './images/tintuc3.jpg',
                'summary' => 'Bí quyết chọn mua điện thoại phù hợp với nhu cầu sử dụng và ngân sách của bạn.',
                'content' => 'Việc chọn mua điện thoại không chỉ dựa vào giá cả mà còn phải xem xét nhiều yếu tố khác như nhu cầu sử dụng, thương hiệu yêu thích, tính năng cần thiết...',
                'date' => '2024-01-10',
                'author' => 'Mobile Expert'
            ],
            [
                'id' => 4,
                'title' => 'So sánh iPhone và Android: Nên chọn hệ điều hành nào?',
                'image' => './images/tintuc4.jpg',
                'summary' => 'Phân tích chi tiết ưu nhược điểm của iOS và Android để giúp bạn đưa ra quyết định đúng đắn.',
                'content' => 'iOS và Android là hai hệ điều hành phổ biến nhất hiện nay. Mỗi hệ điều hành đều có những ưu điểm riêng. iOS nổi tiếng với sự ổn định và bảo mật cao...',
                'date' => '2024-01-08',
                'author' => 'OS Specialist'
            ],
            [
                'id' => 5,
                'title' => 'Cách bảo quản và sử dụng điện thoại đúng cách',
                'image' => './images/tintuc5.jpg',
                'summary' => 'Những tips hữu ích để bảo quản và sử dụng điện thoại hiệu quả, kéo dài tuổi thọ thiết bị.',
                'content' => 'Để điện thoại của bạn hoạt động tốt và có tuổi thọ cao, bạn cần biết cách bảo quản và sử dụng đúng cách. Từ việc sạc pin, bảo vệ màn hình đến cập nhật phần mềm...',
                'date' => '2024-01-05',
                'author' => 'Device Care'
            ],
            [
                'id' => 6,
                'title' => 'Nơi mua điện thoại chính hãng giá tốt tại HÀ NỘI',
                'image' => './images/new1.jpg',
                'summary' => 'Gợi ý những địa chỉ mua điện thoại chính hãng uy tín và giá tốt tại Hà Nội.',
                'content' => 'Hà Nội có rất nhiều cửa hàng bán điện thoại, nhưng không phải nơi nào cũng đảm bảo chất lượng và giá cả hợp lý. Chúng tôi sẽ giới thiệu những địa chỉ uy tín...',
                'date' => '2024-01-03',
                'author' => 'Local Guide'
            ],
            [
                'id' => 7,
                'title' => 'Các thương hiệu smartphone phổ biến và uy tín hiện nay',
                'image' => './images/new2.jpg',
                'summary' => 'Tổng hợp các thương hiệu smartphone hàng đầu thế giới và những điểm nổi bật của từng thương hiệu.',
                'content' => 'Thị trường smartphone hiện nay có rất nhiều thương hiệu lớn nhỏ khác nhau. Apple, Samsung, Xiaomi, OPPO, Vivo, OnePlus... mỗi thương hiệu đều có những đặc điểm riêng...',
                'date' => '2024-01-01',
                'author' => 'Brand Analyst'
            ],
            [
                'id' => 8,
                'title' => 'Kinh nghiệm mua điện thoại trả góp không cần trả trước',
                'image' => './images/new3.jpg',
                'summary' => 'Hướng dẫn chi tiết cách mua điện thoại trả góp 0% lãi suất và không cần trả trước.',
                'content' => 'Mua điện thoại trả góp là lựa chọn phổ biến của nhiều người, đặc biệt là với những sản phẩm có giá cao. Tuy nhiên, không phải ai cũng biết cách tận dụng ưu đãi này...',
                'date' => '2023-12-28',
                'author' => 'Finance Expert'
            ]
        ];
        
        include "./../views/client/tintuc.php";
    }

    public function detail()
    {
        // Hiển thị danh mục cho header
        $category = $this->modelCategory->getAll();
        
        $id = $_GET['id'] ?? 1;
        
        // Dữ liệu tin tức chi tiết (có thể lấy từ database sau)
        $newsDetail = [
            'id' => $id,
            'title' => '7 Mẫu điện thoại nổi bật tháng này bạn không nên bỏ qua',
            'image' => './images/tintuc1.jpg',
            'content' => '<p>Tháng này, thị trường smartphone lại sôi động với những mẫu điện thoại mới được ra mắt. Từ iPhone 15 Pro Max với chip A17 Pro mạnh mẽ, Samsung Galaxy S24 Ultra với S Pen tích hợp, đến Xiaomi 14 Ultra với camera Leica chuyên nghiệp.</p>
            
            <h3>1. iPhone 15 Pro Max</h3>
            <p>iPhone 15 Pro Max là flagship mới nhất của Apple với chip A17 Pro mạnh mẽ, camera 48MP và thiết kế titan cao cấp. Đây là lựa chọn hoàn hảo cho những ai yêu thích iOS và cần hiệu năng tối đa.</p>
            
            <h3>2. Samsung Galaxy S24 Ultra</h3>
            <p>Samsung Galaxy S24 Ultra nổi bật với S Pen tích hợp, camera 200MP và màn hình AMOLED 6.8 inch. Đây là smartphone Android mạnh mẽ nhất hiện tại.</p>
            
            <h3>3. Xiaomi 14 Ultra</h3>
            <p>Xiaomi 14 Ultra gây ấn tượng với camera Leica chuyên nghiệp, chip Snapdragon 8 Gen 3 và thiết kế độc đáo. Đây là lựa chọn tốt cho những ai yêu thích nhiếp ảnh.</p>
            
            <h3>4. OPPO Find X7 Ultra</h3>
            <p>OPPO Find X7 Ultra có thiết kế độc đáo với camera ẩn, hiệu năng mạnh mẽ và màn hình chất lượng cao.</p>
            
            <h3>5. Vivo X100 Pro</h3>
            <p>Vivo X100 Pro nổi bật với camera Zeiss chất lượng cao và hiệu năng ổn định.</p>
            
            <h3>6. OnePlus 12</h3>
            <p>OnePlus 12 là flagship killer với giá cả hợp lý nhưng hiệu năng không thua kém các flagship khác.</p>
            
            <h3>7. Google Pixel 8 Pro</h3>
            <p>Google Pixel 8 Pro nổi tiếng với camera AI thông minh và trải nghiệm Android thuần túy.</p>
            
            <p>Đây là 7 mẫu điện thoại nổi bật nhất tháng này mà bạn không nên bỏ qua. Mỗi sản phẩm đều có những điểm mạnh riêng, phù hợp với nhu cầu khác nhau của người dùng.</p>',
            'date' => '2024-01-15',
            'author' => 'Admin',
            'views' => 1250
        ];
        
        include "./../views/client/tintuc_detail.php";
    }
}
?> 
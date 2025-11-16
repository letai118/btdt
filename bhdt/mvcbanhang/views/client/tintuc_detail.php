<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($newsDetail['title']) ?> - Tin tức công nghệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: rgb(153, 39, 96);
            --hover-color: rgb(147, 48, 12);
            --text-color: #3a223b;
            --border-color: rgb(44, 140, 9);
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
        
        .article-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 30px;
            transition: color 0.3s;
        }
        
        .back-link:hover {
            color: var(--hover-color);
        }
        
        .back-link i {
            margin-right: 8px;
        }
        
        .article-header {
            background: var(--background-white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }
        
        .article-title {
            color: var(--text-color);
            font-size: 2.2rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 20px;
        }
        
        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
        }
        
        .meta-item i {
            margin-right: 8px;
            color: var(--primary-color);
        }
        
        .article-image {
            width: 100%;
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .article-content {
            background: var(--background-white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            line-height: 1.8;
            color: var(--text-color);
        }
        
        .article-content h3 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin: 30px 0 15px 0;
            font-weight: 600;
        }
        
        .article-content p {
            margin-bottom: 20px;
            font-size: 1.05rem;
        }
        
        .article-content ul, .article-content ol {
            margin: 20px 0;
            padding-left: 30px;
        }
        
        .article-content li {
            margin-bottom: 10px;
        }
        
        .share-section {
            background: var(--background-white);
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-top: 30px;
            text-align: center;
        }
        
        .share-section h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.3rem;
        }
        
        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .share-btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 25px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: transform 0.3s;
        }
        
        .share-btn:hover {
            transform: translateY(-2px);
        }
        
        .share-btn i {
            margin-right: 8px;
        }
        
        .share-btn.facebook {
            background: #1877f2;
        }
        
        .share-btn.twitter {
            background: #1da1f2;
        }
        
        .share-btn.linkedin {
            background: #0077b5;
        }
        
        .related-articles {
            background: var(--background-white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-top: 30px;
        }
        
        .related-articles h3 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .related-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .related-card:hover {
            transform: translateY(-3px);
        }
        
        .related-image {
            width: 100%;
            height: 150px;
            overflow: hidden;
        }
        
        .related-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .related-content {
            padding: 20px;
        }
        
        .related-title {
            color: var(--text-color);
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.4;
        }
        
        @media (max-width: 768px) {
            .article-container {
                padding: 20px 15px;
            }
            
            .article-header,
            .article-content {
                padding: 25px 20px;
            }
            
            .article-title {
                font-size: 1.8rem;
            }
            
            .article-meta {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .article-image {
                height: 250px;
            }
            
            .share-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .related-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="article-container">
        <a href="./tintuc.php" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Quay lại danh sách tin tức
        </a>

        <div class="article-header">
            <h1 class="article-title"><?= htmlspecialchars($newsDetail['title']) ?></h1>
            <div class="article-meta">
                <span class="meta-item">
                    <i class="far fa-calendar-alt"></i>
                    <?= date('d/m/Y', strtotime($newsDetail['date'])) ?>
                </span>
                <span class="meta-item">
                    <i class="far fa-user"></i>
                    <?= htmlspecialchars($newsDetail['author']) ?>
                </span>
                <span class="meta-item">
                    <i class="far fa-eye"></i>
                    <?= number_format($newsDetail['views']) ?> lượt xem
                </span>
            </div>
            <div class="article-image">
                <img src="<?= $newsDetail['image'] ?>" alt="<?= htmlspecialchars($newsDetail['title']) ?>">
            </div>
        </div>

        <div class="article-content">
            <?= $newsDetail['content'] ?>
        </div>

        <div class="share-section">
            <h3><i class="fas fa-share-alt"></i> Chia sẻ bài viết</h3>
            <div class="share-buttons">
                <a href="#" class="share-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                    Facebook
                </a>
                <a href="#" class="share-btn twitter">
                    <i class="fab fa-twitter"></i>
                    Twitter
                </a>
                <a href="#" class="share-btn linkedin">
                    <i class="fab fa-linkedin-in"></i>
                    LinkedIn
                </a>
            </div>
        </div>

        <div class="related-articles">
            <h3><i class="fas fa-newspaper"></i> Bài viết liên quan</h3>
            <div class="related-grid">
                <div class="related-card">
                    <div class="related-image">
                        <img src="./images/tintuc2.jpg" alt="Top 5 smartphone pin trâu">
                    </div>
                    <div class="related-content">
                        <h4 class="related-title">Top 5 smartphone pin trâu, hiệu năng mạnh trong tầm giá</h4>
                    </div>
                </div>
                <div class="related-card">
                    <div class="related-image">
                        <img src="./images/tintuc3.jpg" alt="Hướng dẫn chọn mua điện thoại">
                    </div>
                    <div class="related-content">
                        <h4 class="related-title">Hướng dẫn chọn mua điện thoại phù hợp nhu cầu</h4>
                    </div>
                </div>
                <div class="related-card">
                    <div class="related-image">
                        <img src="./images/tintuc4.jpg" alt="So sánh iPhone và Android">
                    </div>
                    <div class="related-content">
                        <h4 class="related-title">So sánh iPhone và Android: Nên chọn hệ điều hành nào?</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$content = ob_get_clean();
include "./../views/client/layout.php";
?> 
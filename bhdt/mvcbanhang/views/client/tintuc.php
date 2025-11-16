<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức công nghệ - Cửa hàng điện thoại</title>
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
        
        .news-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .news-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .news-header h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .news-header p {
            color: var(--text-color);
            font-size: 1.1rem;
        }
        
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .news-card {
            background: var(--background-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .news-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }
        
        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        
        .news-card:hover .news-image img {
            transform: scale(1.05);
        }
        
        .news-content {
            padding: 25px;
        }
        
        .news-title {
            color: var(--text-color);
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .news-summary {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #888;
            font-size: 0.85rem;
        }
        
        .news-date {
            display: flex;
            align-items: center;
        }
        
        .news-date i {
            margin-right: 5px;
            color: var(--primary-color);
        }
        
        .news-author {
            display: flex;
            align-items: center;
        }
        
        .news-author i {
            margin-right: 5px;
            color: var(--primary-color);
        }
        
        .read-more {
            display: inline-block;
            background: linear-gradient(90deg, var(--primary-color), #f472b6);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            margin-top: 15px;
        }
        
        .read-more:hover {
            background: linear-gradient(90deg, var(--hover-color), #ec4899);
            transform: translateY(-2px);
        }
        
        .featured-section {
            background: var(--background-white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
        }
        
        .featured-section h2 {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .featured-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .featured-card:hover {
            transform: translateY(-3px);
        }
        
        .featured-image {
            width: 100%;
            height: 180px;
            overflow: hidden;
        }
        
        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .featured-content {
            padding: 20px;
        }
        
        .featured-title {
            color: var(--text-color);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.4;
        }
        
        .featured-summary {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        
        @media (max-width: 768px) {
            .news-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .news-header h1 {
                font-size: 2rem;
            }
            
            .news-container {
                padding: 20px 15px;
            }
            
            .featured-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="news-container">
        <div class="news-header">
            <h1><i class="fas fa-newspaper"></i> Tin tức công nghệ</h1>
            <p>Cập nhật những tin tức mới nhất về công nghệ và smartphone</p>
        </div>

        <div class="featured-section">
            <h2><i class="fas fa-star"></i> Bài viết nổi bật</h2>
            <div class="featured-grid">
                <?php 
                // Hiển thị 3 bài viết đầu tiên như bài viết nổi bật
                for ($i = 0; $i < 3 && $i < count($news); $i++): 
                    $article = $news[$i];
                ?>
                <div class="featured-card">
                    <div class="featured-image">
                        <img src="<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['title']) ?>">
                    </div>
                    <div class="featured-content">
                        <h3 class="featured-title"><?= htmlspecialchars($article['title']) ?></h3>
                        <p class="featured-summary"><?= htmlspecialchars($article['summary']) ?></p>
                        <a href="./tintuc.php?controller=tintuc&action=detail&id=<?= $article['id'] ?>" class="read-more">
                            Đọc thêm <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="news-grid">
            <?php foreach ($news as $article): ?>
            <div class="news-card" onclick="window.location.href='./tintuc.php?controller=tintuc&action=detail&id=<?= $article['id'] ?>'">
                <div class="news-image">
                    <img src="<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['title']) ?>">
                </div>
                <div class="news-content">
                    <h3 class="news-title"><?= htmlspecialchars($article['title']) ?></h3>
                    <p class="news-summary"><?= htmlspecialchars($article['summary']) ?></p>
                    <div class="news-meta">
                        <span class="news-date">
                            <i class="far fa-calendar-alt"></i>
                            <?= date('d/m/Y', strtotime($article['date'])) ?>
                        </span>
                        <span class="news-author">
                            <i class="far fa-user"></i>
                            <?= htmlspecialchars($article['author']) ?>
                        </span>
                    </div>
                    <a href="./tintuc.php?controller=tintuc&action=detail&id=<?= $article['id'] ?>" class="read-more">
                        Đọc thêm <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

<?php
$content = ob_get_clean();
include "./../views/client/layout.php";
?>

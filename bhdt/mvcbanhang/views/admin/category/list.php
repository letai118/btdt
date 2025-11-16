<?php
$obstart = ob_start();
?>
<div>
    <h2>Tìm kiếm</h2>
</div>
<h2>Danh mục sản phẩm</h2>
<div>
    <a href="./admin.php?controller=category&action=add"
        class="ws-btn mb-2">Thêm mới</a>
</div>
<table class="my_table">
    <tr>
        <th>ID</th>
        <th>Hãng sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Mô tả</th>
        <th>Hành động</th>
    </tr>
    <?php foreach (
        $category as $cat): ?>
        <tr>
            <td><?= $cat['id'] ?></td>
            <td><?= $cat['name'] ?></td>
            <td>
                <?php if (!empty($cat['image'])): ?>
                    <img src="<?= $cat['image'] ?>" alt="<?= $cat['name'] ?>" style="width:60px; height:40px; object-fit:cover; border-radius:6px;">
                <?php else: ?>
                    <img src="./images/tintuc1.jpg" alt="Default Image" style="width:60px; height:40px; object-fit:cover; border-radius:6px;">
                <?php endif; ?>
            </td>
            <td><?= $cat['description'] ?></td>
            <td>
                <a class="ws-btn"
                    href="./admin.php?controller=category&action=edit&id=<?= $cat['id'] ?>">
                    Sửa</a>
                <a class="ws-btn"
                    href="./admin.php?controller=category&action=delete&id=<?= $cat['id'] ?>"
                    onclick="return confirm('Bạn có chắc chắn Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$content = ob_get_clean();
include './../views/admin/layout.php';
?>
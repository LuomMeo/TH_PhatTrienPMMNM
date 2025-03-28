<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-white py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0 text-gray-800">Quản lý danh mục</h1>
                    <p class="text-muted mb-0">Quản lý tất cả danh mục sản phẩm trong hệ thống</p>
                </div>
                <a href="/Category/add" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>Thêm danh mục mới
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-4 py-3">ID</th>
                            <th class="border-0 px-4 py-3">Tên danh mục</th>
                            <th class="border-0 px-4 py-3">Mô tả</th>
                            <th class="border-0 px-4 py-3 text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td class="px-4 py-3"><?php echo $category->id; ?></td>
                                <td class="px-4 py-3 fw-bold text-primary">
                                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td class="px-4 py-3">
                                    <?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <a href="/Category/edit/<?php echo $category->id; ?>" 
                                       class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/Category/delete/<?php echo $category->id; ?>" 
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($categories)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    <i class="fas fa-box-open fa-3x mb-3"></i>
                                    <p class="mb-0">Chưa có danh mục nào</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
    }
    
    .btn-sm {
        width: 32px;
        height: 32px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
    }
</style> 
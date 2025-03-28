<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-white py-4">
                    <div class="d-flex align-items-center">
                        <a href="/Category/list" class="btn btn-outline-secondary btn-sm me-3">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <div>
                            <h1 class="h3 mb-0 text-gray-800">Thêm danh mục mới</h1>
                            <p class="text-muted mb-0">Điền thông tin để tạo danh mục mới</p>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php
                        $errors = $_SESSION['errors'] ?? [];
                        $old = $_SESSION['old'] ?? [];
                        unset($_SESSION['errors'], $_SESSION['old']);
                    ?>

                    <form action="/Category/save" method="POST" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="name" class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control form-control-lg <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" 
                                   id="name" 
                                   name="name" 
                                   value="<?php echo htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                   placeholder="Nhập tên danh mục"
                                   required>
                            <?php if (isset($errors['name'])): ?>
                                <div class="invalid-feedback">
                                    <?php echo $errors['name']; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Mô tả <span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-lg <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Nhập mô tả cho danh mục"
                                      required><?php echo htmlspecialchars($old['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                            <?php if (isset($errors['description'])): ?>
                                <div class="invalid-feedback">
                                    <?php echo $errors['description']; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>Lưu danh mục
                            </button>
                            <a href="/Category/list" class="btn btn-light btn-lg">
                                <i class="fas fa-times me-2"></i>Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control-lg {
        padding: 1rem;
        font-size: 1rem;
        border-radius: 0.5rem;
    }
    
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .btn-lg {
        padding: 1rem;
        font-size: 1rem;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(49, 130, 206, 0.1);
    }
</style> 
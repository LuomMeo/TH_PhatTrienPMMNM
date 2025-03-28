<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-0 animate__animated animate__fadeIn">
        <div class="card-header bg-gradient-success text-white py-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h4 mb-0">Sửa thông tin sản phẩm</h1>
                <a href="/Product/list" class="btn btn-light btn-sm">Quay lại</a>
            </div>
        </div>
        
        <div class="card-body p-4">
            <!-- Hiển thị thông báo lỗi -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger alert-dismissible fade show animate__animated animate__shakeX" role="alert">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><i class="fas fa-exclamation-circle me-2"></i><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Form chỉnh sửa -->
            <form method="POST" action="/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   class="form-control shadow-sm" 
                                   value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                                   placeholder="Tên sản phẩm" 
                                   required>
                            <label for="name" class="text-muted">Tên sản phẩm *</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" 
                                   id="price" 
                                   name="price" 
                                   class="form-control shadow-sm" 
                                   step="1000" 
                                   min="0"
                                   value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" 
                                   placeholder="Giá" 
                                   required>
                            <label for="price" class="text-muted">Giá (VNĐ) *</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <textarea id="description" 
                                      name="description" 
                                      class="form-control shadow-sm" 
                                      placeholder="Mô tả" 
                                      style="height: 120px" 
                                      required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                            <label for="description" class="text-muted">Mô tả sản phẩm *</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select id="category_id" 
                                    name="category_id" 
                                    class="form-select shadow-sm" 
                                    required>
                                <option value="" disabled>Chọn danh mục</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category->id; ?>" 
                                            <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <label for="category_id" class="text-muted">Danh mục *</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="form-label fw-bold">Hình ảnh sản phẩm</label>
                            <div class="input-group">
                                <input type="file" 
                                       id="image" 
                                       name="image" 
                                       class="form-control shadow-sm" 
                                       accept="image/*">
                                <input type="hidden" 
                                       name="existing_image" 
                                       value="<?php echo $product->image; ?>">
                            </div>
                            <?php if ($product->image): ?>
                                <div class="mt-3 position-relative d-inline-block">
                                    <img src="/<?php echo $product->image; ?>" 
                                         alt="Product Image" 
                                         class="img-thumbnail shadow-sm" 
                                         style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    <span class="badge bg-secondary position-absolute top-0 end-0">Hiện tại</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="submit" 
                                    class="btn btn-success btn-lg shadow-sm px-4">
                                <i class="fas fa-save me-2"></i>Lưu thay đổi
                            </button>
                            <a href="/Product/list" 
                               class="btn btn-outline-secondary btn-lg shadow-sm px-4">
                                <i class="fas fa-times me-2"></i>Hủy bỏ
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- CSS tùy chỉnh -->
<style>
    .card {
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }

    .card-header.bg-gradient-success {
        background: linear-gradient(45deg, #28a745, #34d058);
    }

    .form-control, .form-select {
        border-radius: 12px;
        padding: 0.75rem;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .form-floating label {
        padding-left: 1rem;
        color: #666;
    }

    .btn {
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .alert {
        border-radius: 12px;
        border-left: 5px solid #dc3545;
    }

    .img-thumbnail {
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .img-thumbnail:hover {
        transform: scale(1.03);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

<!-- Script validation and API integration -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const productId = <?php echo $product->id; ?>;

    // Load product data from API
    fetch(`/api/product/${productId}`)
        .then(response => response.json())
        .then(data => {
            // Populate form fields
            document.getElementById('name').value = data.name;
            document.getElementById('description').value = data.description;
            document.getElementById('price').value = data.price;
            document.getElementById('category_id').value = data.category_id;
        })
        .catch(error => {
            console.error('Error loading product:', error);
            showNotification('Không thể tải thông tin sản phẩm', 'error');
        });

    // Load categories from API
    fetch('/api/category')
        .then(response => response.json())
        .then(data => {
            const categorySelect = document.getElementById('category_id');
            // Clear existing options except the first one
            categorySelect.innerHTML = '<option value="" disabled>Chọn danh mục</option>';
            
            data.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                if (category.id == <?php echo $product->category_id; ?>) {
                    option.selected = true;
                }
                categorySelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error loading categories:', error);
            showNotification('Không thể tải danh mục sản phẩm', 'error');
        });

    // Form submission
    const form = document.querySelector('form');
    form.id = 'edit-product-form';
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Validate form
        if (!validateForm()) {
            return;
        }

        // Show loading state
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.innerHTML;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang lưu...';
        submitButton.disabled = true;

        const formData = new FormData(this);
        const jsonData = {};
        formData.forEach((value, key) => {
            if (key !== 'image' && key !== 'existing_image') { // Skip file inputs
                jsonData[key] = value;
            }
        });

        // Handle file upload separately if needed
        const imageFile = formData.get('image');
        if (imageFile && imageFile.size > 0) {
            // You might want to handle file upload differently
            console.log('Image file selected:', imageFile.name);
        }

        fetch(`/api/product/${productId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product updated successfully') {
                showNotification('Cập nhật sản phẩm thành công!', 'success');
                setTimeout(() => {
                    window.location.href = '/Product';
                }, 1000);
            } else {
                showNotification(data.message || 'Cập nhật sản phẩm thất bại', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Có lỗi xảy ra khi cập nhật sản phẩm', 'error');
        })
        .finally(() => {
            // Restore button state
            submitButton.innerHTML = originalText;
            submitButton.disabled = false;
        });
    });
});

function validateForm() {
    let price = document.getElementById('price').value;
    if (price < 0) {
        showNotification('Giá sản phẩm không thể âm!', 'error');
        return false;
    }
    
    let name = document.getElementById('name').value;
    if (!name.trim()) {
        showNotification('Vui lòng nhập tên sản phẩm!', 'error');
        return false;
    }

    let description = document.getElementById('description').value;
    if (!description.trim()) {
        showNotification('Vui lòng nhập mô tả sản phẩm!', 'error');
        return false;
    }

    let categoryId = document.getElementById('category_id').value;
    if (!categoryId) {
        showNotification('Vui lòng chọn danh mục!', 'error');
        return false;
    }

    return true;
}

function showNotification(message, type) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show animate__animated animate__fadeInDown`;
    alertDiv.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    // Insert alert before the form
    const form = document.getElementById('edit-product-form');
    form.parentNode.insertBefore(alertDiv, form);

    if (type === 'success') {
        setTimeout(() => {
            alertDiv.remove();
        }, 3000);
    }
}
</script>

<?php include 'app/views/shares/footer.php'; ?>
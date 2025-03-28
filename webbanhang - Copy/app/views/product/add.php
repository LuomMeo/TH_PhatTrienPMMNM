<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Thêm sản phẩm mới</h1>
        </div>
        <div class="card-body p-4">
            <div id="error-container"></div>

            <form id="add-product-form" method="POST" action="/Product/save" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Tên sản phẩm" required>
                            <label for="name">Tên sản phẩm</label>
                            <div class="invalid-feedback">Vui lòng nhập tên sản phẩm</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" id="price" name="price" class="form-control" step="0.01" placeholder="Giá" required>
                            <label for="price">Giá (VNĐ)</label>
                            <div class="invalid-feedback">Vui lòng nhập giá hợp lệ</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea id="description" name="description" class="form-control" placeholder="Mô tả" style="height: 100px" required></textarea>
                            <label for="description">Mô tả sản phẩm</label>
                            <div class="invalid-feedback">Vui lòng nhập mô tả sản phẩm</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select id="category_id" name="category_id" class="form-select" required>
                                <option value="" selected disabled>Chọn danh mục</option>
                            </select>
                            <label for="category_id">Danh mục</label>
                            <div class="invalid-feedback">Vui lòng chọn danh mục</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                            <input type="file" id="image" name="image" class="form-control" accept="image/*">
                            <div class="invalid-feedback">Vui lòng chọn hình ảnh hợp lệ</div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary btn-lg me-2">
                            <i class="fas fa-plus me-2"></i>Thêm sản phẩm
                        </button>
                        <a href="/Product" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    .card-header {
        padding: 1.5rem;
    }
    .form-control, .form-select {
        border-radius: 10px;
        padding: 0.75rem;
    }
    .form-floating label {
        padding-left: 1rem;
    }
    .btn {
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
    }
    .alert {
        border-radius: 10px;
    }
    .loading {
        opacity: 0.7;
        pointer-events: none;
    }
    .loading-spinner {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .loading .loading-spinner {
        display: block;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Load categories from API
    fetch('/api/category')
        .then(response => response.json())
        .then(data => {
            const categorySelect = document.getElementById('category_id');
            data.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error loading categories:', error);
            showNotification('Không thể tải danh mục sản phẩm', 'error');
        });

    // Form submission
    const form = document.getElementById('add-product-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Basic form validation
        if (!form.checkValidity()) {
            event.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        // Show loading state
        form.classList.add('loading');
        
        const formData = new FormData(this);
        const jsonData = {};
        formData.forEach((value, key) => {
            if (key !== 'image') { // Handle non-file inputs
                jsonData[key] = value;
            }
        });

        // Handle file upload separately if needed
        const imageFile = formData.get('image');
        if (imageFile && imageFile.size > 0) {
            // You might want to handle file upload differently
            // For now, we'll skip it as it needs special handling
            console.log('Image file selected:', imageFile.name);
        }

        fetch('/api/product', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product created successfully') {
                showNotification('Thêm sản phẩm thành công!', 'success');
                setTimeout(() => {
                    window.location.href = '/Product';
                }, 1000);
            } else {
                showNotification(data.message || 'Thêm sản phẩm thất bại', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Có lỗi xảy ra khi thêm sản phẩm', 'error');
        })
        .finally(() => {
            form.classList.remove('loading');
        });
    });
});

function showNotification(message, type) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    const container = document.getElementById('error-container');
    container.innerHTML = '';
    container.appendChild(alertDiv);

    if (type === 'success') {
        setTimeout(() => {
            alertDiv.remove();
        }, 3000);
    }
}
</script>

<?php include 'app/views/shares/footer.php'; ?>
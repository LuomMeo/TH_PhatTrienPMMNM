<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <div class="card border-0 shadow-lg overflow-hidden product-detail-card">
        <div class="card-header bg-gradient-primary text-white text-center py-4 position-relative">
            <h2 class="mb-0 fw-bold animate__animated animate__fadeIn">Chi Tiết Sản Phẩm</h2>
            <div class="header-overlay"></div>
        </div>
        <div class="card-body p-5">
            <?php if ($product): ?>
                <div class="row g-5 align-items-start">
                    <!-- Product Image Section -->
                    <div class="col-md-6">
                        <div class="position-relative overflow-hidden rounded-3 shadow-sm image-container">
                            <?php if ($product->image): ?>
                                <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                     class="img-fluid w-100 object-fit-cover transition-scale hover-scale" 
                                     alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                                     style="max-height: 450px;">
                            <?php else: ?>
                                <div class="w-100 bg-light d-flex align-items-center justify-content-center"
                                     style="max-height: 450px; height: 450px;">
                                    <span class="text-muted fw-bold fs-4">Không có ảnh</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Product Details Section -->
                    <div class="col-md-6">
                        <h3 class="card-title text-dark fw-bold mb-4 animate__animated animate__fadeInUp">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                        
                        <div class="bg-light p-4 rounded-3 mb-4 shadow-sm animate__animated animate__fadeInUp animate__delay-1s">
                            <p class="card-text text-dark mb-0 lh-lg">
                                <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
                            </p>
                        </div>

                        <div class="d-flex align-items-center mb-4 animate__animated animate__fadeInUp animate__delay-2s">
                            <span class="text-danger fw-bold display-6 me-3">
                                <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                            </span>
                            <span class="badge bg-success text-white px-3 py-2 fs-6">Còn hàng</span>
                        </div>

                        <p class="mb-5 animate__animated animate__fadeInUp animate__delay-2s">
                            <strong class="text-muted fs-5">Danh mục:</strong>
                            <span class="badge bg-info text-white px-4 py-2 fs-6 ms-2">
                                <?php echo !empty($product->category_name) ? 
                                    htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 
                                    'Chưa có danh mục'; ?>
                            </span>
                        </p>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 animate__animated animate__fadeInUp animate__delay-3s">
                            <a href="/Product/addToCart/<?php echo $product->id; ?>" 
                               class="btn btn-success btn-lg px-5 py-3 transition-all hover-shadow flex-grow-1">
                                <i class="fas fa-cart-plus me-2"></i>Thêm vào giỏ hàng
                            </a>
                            <a href="/Product" 
                               class="btn btn-outline-secondary btn-lg px-5 py-3 transition-all hover-shadow">
                                <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách sản phẩm
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger text-center py-5 my-4 rounded-3 shadow-sm animate__animated animate__shakeX">
                    <h4 class="alert-heading fw-bold mb-3">Không tìm thấy sản phẩm!</h4>
                    <p class="mb-4 fs-5">Vui lòng kiểm tra lại hoặc quay về danh sách sản phẩm.</p>
                    <a href="/Product/list" 
                       class="btn btn-outline-danger btn-lg px-5 py-2 transition-all hover-shadow">
                        Quay lại danh sách sản phẩm
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .product-detail-card {
        border-radius: 20px;
    }

    .bg-gradient-primary {
        background: linear-gradient(45deg, #007bff, #00b4ff);
    }

    .header-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        pointer-events: none;
    }

    .transition-scale {
        transition: transform 0.4s ease;
    }

    .hover-scale:hover {
        transform: scale(1.05);
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    .hover-shadow:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        transform: translateY(-3px);
    }

    .image-container {
        background: #f8f9fa;
        border-radius: 15px;
    }

    .btn-success {
        background: #28a745;
        border: none;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }

    .btn-success:hover {
        background: #218838;
    }

    .btn-outline-secondary {
        border-width: 2px;
    }

    .btn-outline-secondary:hover {
        background: #6c757d;
        color: white;
    }

    .btn-outline-danger {
        border-width: 2px;
    }

    .btn-outline-danger:hover {
        background: #dc3545;
        color: white;
    }

    .object-fit-cover {
        object-fit: cover;
    }

    .lh-lg {
        line-height: 1.8;
    }

    @media (max-width: 767px) {
        .card-body {
            padding: 2.5rem !important;
        }
        .display-6 {
            font-size: 1.5rem;
        }
        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }
    }
</style>

<!-- Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<?php include 'app/views/shares/footer.php'; ?>
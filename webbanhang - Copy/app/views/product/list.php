<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <!-- Banner Slider -->
    <div class="mb-5">
        <div id="bannerSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#bannerSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#bannerSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#bannerSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="banner-overlay"></div>
                    <img src="https://img.pikbest.com/origin/09/02/27/61IpIkbEsTsYE.jpg!w700wp" 
                         class="d-block w-100 banner-img" alt="Banner 1">
                    <div class="carousel-caption">
                        <div class="caption-content">
                            <span class="badge bg-danger mb-3">Mới ra mắt</span>
                            <h2 class="banner-title fw-bold text-white mb-4">
                                Sản Phẩm Công Nghệ<br>
                                <span class="highlight">Mới Nhất 2024</span>
                            </h2>
                            <p class="banner-desc mb-4">Khám phá những thiết bị hiện đại nhất với công nghệ đột phá, 
                            thiết kế sang trọng cùng hiệu năng vượt trội</p>
                            <div class="banner-buttons">
                                <a href="#" class="btn btn-lg btn-danger me-3">
                                    <span>Mua ngay</span>
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                                <a href="#" class="btn btn-lg btn-outline-light">
                                    <span>Tìm hiểu thêm</span>
                                    <i class="fas fa-info-circle ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner-overlay"></div>
                    <img src="https://intphcm.com/data/upload/banner-la-gi.jpg" 
                         class="d-block w-100 banner-img" alt="Banner 2">
                    <div class="carousel-caption">
                        <div class="caption-content">
                            <span class="badge bg-warning text-dark mb-3">Ưu đãi hot</span>
                            <h2 class="banner-title fw-bold text-white mb-4">
                                Siêu Sale Tháng 3<br>
                                <span class="highlight">Giảm Đến 50%</span>
                            </h2>
                            <p class="banner-desc mb-4">Cơ hội vàng để sở hữu những sản phẩm chất lượng với giá tốt nhất. 
                            Ưu đãi có hạn, nhanh tay đặt hàng!</p>
                            <div class="banner-buttons">
                                <a href="#" class="btn btn-lg btn-warning text-dark me-3">
                                    <span>Khám phá ngay</span>
                                    <i class="fas fa-gift ms-2"></i>
                                </a>
                                <a href="#" class="btn btn-lg btn-outline-light">
                                    <span>Xem chi tiết</span>
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner-overlay"></div>
                    <img src="https://cdn.tgdd.vn/hoi-dap/1355217/banner-tgdd-800x300.jpg" 
                         class="d-block w-100 banner-img" alt="Banner 3">
                    <div class="carousel-caption">
                        <div class="caption-content">
                            <span class="badge bg-primary mb-3">Khuyến mãi</span>
                            <h2 class="banner-title fw-bold text-white mb-4">
                                Mua Sắm Thông Minh<br>
                                <span class="highlight">Tiết Kiệm Tối Đa</span>
                            </h2>
                            <p class="banner-desc mb-4">Lựa chọn thông minh với hàng nghìn sản phẩm chất lượng. 
                            Cam kết giá tốt nhất thị trường!</p>
                            <div class="banner-buttons">
                                <a href="#" class="btn btn-lg btn-primary me-3">
                                    <span>Xem ngay</span>
                                    <i class="fas fa-shopping-cart ms-2"></i>
                                </a>
                                <a href="#" class="btn btn-lg btn-outline-light">
                                    <span>Tìm hiểu thêm</span>
                                    <i class="fas fa-angle-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider" data-bs-slide="prev">
                <div class="control-button">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider" data-bs-slide="next">
                <div class="control-button">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <span class="visually-hidden">Tiếp</span>
            </button>
        </div>
    </div>

    <!-- Tiêu đề và nút thêm sản phẩm -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="display-6 fw-bold text-dark mb-0">
                <?php if (isset($categoryInfo)): ?>
                    Sản phẩm <?php echo htmlspecialchars($categoryInfo->name); ?>
                <?php else: ?>
                    Danh sách sản phẩm
                <?php endif; ?>
            </h1>
            <p class="text-muted mt-2 mb-0">
                <?php if (isset($categoryInfo)): ?>
                    <?php echo htmlspecialchars($categoryInfo->description); ?>
                <?php else: ?>
                    Khám phá các sản phẩm chất lượng của chúng tôi
                <?php endif; ?>
            </p>
            <?php if (isset($categoryInfo)): ?>
                <a href="/Product" class="btn btn-link text-primary ps-0 mt-2">
                    <i class="fas fa-arrow-left me-1"></i>Xem tất cả sản phẩm
                </a>
            <?php endif; ?>
        </div>
        <?php if (SessionHelper::isAdmin()): ?>
            <a href="/Product/add" class="btn btn-danger btn-lg shadow-sm px-4">
                <i class="fas fa-plus-circle me-2"></i>Thêm sản phẩm mới
            </a>
        <?php endif; ?>
    </div>

    <!-- Danh sách sản phẩm dạng lưới -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
        <?php foreach ($products as $product): ?>
            <div class="col product-item">
                <div class="card h-100 shadow-sm border-0 product-card">
                    <!-- Hình ảnh sản phẩm -->
                    <div class="card-img-wrapper position-relative">
                        <?php if ($product->image): ?>
                            <a href="/Product/show/<?php echo $product->id; ?>" class="product-link">
                                <img src="/<?php echo $product->image; ?>" 
                                     class="card-img-top" 
                                     alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <span class="btn btn-sm btn-light">Xem chi tiết</span>
                                    </div>
                                </div>
                            </a>
                        <?php else: ?>
                            <div class="no-image-placeholder">
                                <i class="fas fa-image fa-3x text-muted"></i>
                                <p class="mt-2">Không có hình ảnh</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Nội dung sản phẩm -->
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">
                                <a href="/Product/show/<?php echo $product->id; ?>" 
                                   class="text-decoration-none text-dark product-name">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h5>
                            <span class="badge bg-primary"><?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>
                        <p class="card-text description-truncate mb-3">
                            <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text price-tag mb-0">
                                <?php echo number_format($product->price, 0, ',', '.'); ?> đ
                            </p>
                            <div class="action-buttons">
                                <?php if (SessionHelper::isAdmin()): ?>
                                    <a href="/Product/edit/<?php echo $product->id; ?>" 
                                       class="btn btn-sm btn-outline-warning me-1" 
                                       data-bs-toggle="tooltip" 
                                       title="Chỉnh sửa">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/Product/delete/<?php echo $product->id; ?>" 
                                       class="btn btn-sm btn-outline-danger me-1"
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');"
                                       data-bs-toggle="tooltip" 
                                       title="Xóa">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                <?php endif; ?>
                                <a href="/Product/addToCart/<?php echo $product->id; ?>" 
                                   class="btn btn-sm btn-primary"
                                   data-bs-toggle="tooltip" 
                                   title="Thêm vào giỏ hàng">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- CSS tùy chỉnh -->
<style>
    /* Banner styles */
    #bannerSlider {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .banner-img {
        height: 600px;
        object-fit: cover;
        transform: scale(1.1);
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        filter: brightness(0.9);
    }

    .carousel-item.active .banner-img {
        transform: scale(1);
    }

    .banner-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, 
            rgba(0,0,0,0.95) 0%, 
            rgba(0,0,0,0.8) 30%,
            rgba(0,0,0,0.4) 100%);
        z-index: 1;
    }

    .carousel-caption {
        text-align: left;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        display: flex;
        align-items: center;
        z-index: 2;
        padding: 0;
    }

    .caption-content {
        max-width: 650px;
        margin-left: 10%;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .carousel-item.active .caption-content {
        opacity: 1;
        transform: translateY(0);
    }

    .banner-title {
        font-size: 3.8rem;
        line-height: 1.2;
        letter-spacing: -0.02em;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .banner-title .highlight {
        color: #ffd700;
        position: relative;
        display: inline-block;
    }

    .banner-title .highlight::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 5px;
        width: 100%;
        height: 8px;
        background: rgba(255, 215, 0, 0.3);
        z-index: -1;
    }

    .banner-desc {
        font-size: 1.25rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
        max-width: 540px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    .banner-buttons {
        display: flex;
        align-items: center;
    }

    .banner-buttons .btn {
        padding: 1rem 2rem;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.3s ease;
        min-width: 180px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .banner-buttons .btn span {
        display: inline-block;
        transform: translateX(0);
        transition: transform 0.3s ease;
    }

    .banner-buttons .btn i {
        transform: translateX(0);
        transition: transform 0.3s ease;
    }

    .banner-buttons .btn:hover span {
        transform: translateX(-4px);
    }

    .banner-buttons .btn:hover i {
        transform: translateX(4px);
    }

    .banner-buttons .btn-outline-light {
        border-width: 2px;
    }

    .banner-buttons .btn-outline-light:hover {
        background: rgba(255,255,255,0.15);
    }

    .carousel-indicators {
        bottom: 40px;
        margin-bottom: 0;
        z-index: 3;
    }

    .carousel-indicators [data-bs-target] {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        margin: 0 8px;
        background-color: #fff;
        opacity: 0.4;
        border: 2px solid transparent;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .carousel-indicators .active {
        opacity: 1;
        transform: scale(1.2);
        background-color: #ffd700;
        border-color: #fff;
    }

    .control-button {
        width: 50px;
        height: 50px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: #fff;
        backdrop-filter: blur(4px);
        transition: all 0.3s ease;
    }

    .carousel-control-prev, .carousel-control-next {
        width: 10%;
        opacity: 1;
    }

    .carousel-control-prev:hover .control-button,
    .carousel-control-next:hover .control-button {
        background: rgba(255,255,255,0.3);
        transform: scale(1.1);
    }

    .badge {
        padding: 0.8em 1.4em;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 30px;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    @media (max-width: 991.98px) {
        .banner-img {
            height: 500px;
        }
        .banner-title {
            font-size: 3rem;
        }
        .banner-desc {
            font-size: 1.1rem;
        }
        .caption-content {
            max-width: 500px;
        }
    }

    @media (max-width: 767.98px) {
        .banner-img {
            height: 400px;
        }
        .banner-title {
            font-size: 2.5rem;
        }
        .banner-desc {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        .banner-buttons {
            flex-direction: column;
            gap: 1rem;
        }
        .banner-buttons .btn {
            width: 100%;
            margin: 0 !important;
        }
        .caption-content {
            max-width: 100%;
            margin: 0 1.5rem;
        }
    }

    /* Product Card styles */
    .product-item {
        transition: transform 0.3s ease;
    }

    .product-item:hover {
        transform: translateY(-10px);
    }

    .product-card {
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .product-card:hover {
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }

    .card-img-wrapper {
        height: 250px;
        background: #f8f9fa;
        border-radius: 15px 15px 0 0;
        overflow: hidden;
    }

    .card-img-top {
        height: 100%;
        width: 100%;
        object-fit: contain;
        padding: 1rem;
        transition: transform 0.5s ease;
    }

    .product-link {
        display: block;
        position: relative;
    }

    .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .product-link:hover .product-overlay {
        opacity: 1;
    }

    .product-link:hover .card-img-top {
        transform: scale(1.1);
    }

    .no-image-placeholder {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        color: #6c757d;
    }

    .product-name {
        font-size: 1.1rem;
        font-weight: 600;
        line-height: 1.4;
        transition: color 0.3s ease;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-name:hover {
        color: #dc3545 !important;
    }

    .description-truncate {
        font-size: 0.9rem;
        color: #6c757d;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.5;
    }

    .price-tag {
        color: #dc3545;
        font-size: 1.25rem;
        font-weight: 700;
    }

    .action-buttons .btn {
        width: 35px;
        height: 35px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .action-buttons .btn:hover {
        transform: translateY(-2px);
    }

    .badge {
        padding: 0.5em 1em;
        font-weight: 500;
        border-radius: 30px;
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .product-item {
        animation: fadeInUp 0.6s ease backwards;
    }

    .product-item:nth-child(1) { animation-delay: 0.1s; }
    .product-item:nth-child(2) { animation-delay: 0.2s; }
    .product-item:nth-child(3) { animation-delay: 0.3s; }
    .product-item:nth-child(4) { animation-delay: 0.4s; }
</style>

<!-- Initialize tooltips -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Load products from API
    fetch('/api/product')
        .then(response => response.json())
        .then(data => {
            updateProductList(data);
        })
        .catch(error => {
            console.error('Error loading products:', error);
        });
});

function updateProductList(products) {
    const productContainer = document.querySelector('.row.row-cols-1.row-cols-md-2.row-cols-lg-4');
    if (!productContainer) return;

    productContainer.innerHTML = '';

    products.forEach(product => {
        const productHTML = createProductCard(product);
        productContainer.insertAdjacentHTML('beforeend', productHTML);
    });

    // Reinitialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

function createProductCard(product) {
    const isAdmin = <?php echo SessionHelper::isAdmin() ? 'true' : 'false'; ?>;
    
    return `
        <div class="col product-item">
            <div class="card h-100 shadow-sm border-0 product-card">
                <div class="card-img-wrapper position-relative">
                    ${product.image ? `
                        <a href="/Product/show/${product.id}" class="product-link">
                            <img src="/${product.image}" 
                                 class="card-img-top" 
                                 alt="${escapeHtml(product.name)}">
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <span class="btn btn-sm btn-light">Xem chi tiết</span>
                                </div>
                            </div>
                        </a>
                    ` : `
                        <div class="no-image-placeholder">
                            <i class="fas fa-image fa-3x text-muted"></i>
                            <p class="mt-2">Không có hình ảnh</p>
                        </div>
                    `}
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0">
                            <a href="/Product/show/${product.id}" 
                               class="text-decoration-none text-dark product-name">
                                ${escapeHtml(product.name)}
                            </a>
                        </h5>
                        <span class="badge bg-primary">${escapeHtml(product.category_name)}</span>
                    </div>
                    <p class="card-text description-truncate mb-3">
                        ${escapeHtml(product.description)}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text price-tag mb-0">
                            ${formatPrice(product.price)} đ
                        </p>
                        <div class="action-buttons">
                            ${isAdmin ? `
                                <a href="/Product/edit/${product.id}" 
                                   class="btn btn-sm btn-outline-warning me-1" 
                                   data-bs-toggle="tooltip" 
                                   title="Chỉnh sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="deleteProduct(${product.id})" 
                                        class="btn btn-sm btn-outline-danger me-1"
                                        data-bs-toggle="tooltip" 
                                        title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            ` : ''}
                            <a href="/Product/addToCart/${product.id}" 
                               class="btn btn-sm btn-primary"
                               data-bs-toggle="tooltip" 
                               title="Thêm vào giỏ hàng">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function deleteProduct(id) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
        fetch(`/api/product/${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product deleted successfully') {
                // Reload products
                fetch('/api/product')
                    .then(response => response.json())
                    .then(data => {
                        updateProductList(data);
                        showNotification('Xóa sản phẩm thành công!', 'success');
                    });
            } else {
                showNotification('Xóa sản phẩm thất bại!', 'error');
            }
        })
        .catch(error => {
            console.error('Error deleting product:', error);
            showNotification('Xóa sản phẩm thất bại!', 'error');
        });
    }
}

function escapeHtml(unsafe) {
    return unsafe
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function formatPrice(price) {
    return new Intl.NumberFormat('vi-VN').format(price);
}

function showNotification(message, type) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
    alertDiv.style.zIndex = '9999';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    document.body.appendChild(alertDiv);
    
    setTimeout(() => {
        alertDiv.remove();
    }, 3000);
}
</script>
<?php include 'app/views/shares/footer.php'; ?>
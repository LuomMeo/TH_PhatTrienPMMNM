<footer class="footer bg-dark text-white mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <!-- Contact Information Column -->
            <div class="col-lg-4 col-md-6">
                <h5 class="text-uppercase fw-bold mb-4 position-relative">
                    Quản Lý Sản Phẩm
                    <span class="underline-effect"></span>
                </h5>
                <p class="text-muted">
                    Hệ thống quản lý sản phẩm tối ưu giúp bạn theo dõi và cập nhật 
                    thông tin sản phẩm một cách chuyên nghiệp và hiệu quả.
                </p>
                <div class="mt-3">
                    <small class="text-muted">
                        <i class="fas fa-envelope me-2"></i>Email: support@quanlysp.com
                    </small>
                </div>
            </div>

            <!-- Quick Links Column -->
            <div class="col-lg-4 col-md-6">
                <h5 class="text-uppercase fw-bold mb-4 position-relative">
                    Liên Kết Nhanh
                    <span class="underline-effect"></span>
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="/Product/" class="text-white text-decoration-none hover-link">
                            <i class="fas fa-angle-right me-2"></i>Danh sách sản phẩm
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/Product/add" class="text-white text-decoration-none hover-link">
                            <i class="fas fa-angle-right me-2"></i>Thêm sản phẩm
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Social Media Column -->
            <div class="col-lg-4 col-md-12">
                <h5 class="text-uppercase fw-bold mb-4 position-relative">
                    Kết Nối Với Chúng Tôi
                    <span class="underline-effect"></span>
                </h5>
                <div class="social-icons d-flex gap-3">
                    <a href="#" class="social-link facebook" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link twitter" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link instagram" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="copyright py-3 bg-gradient-dark text-center">
        <p class="mb-0">
            © 2025 Quản Lý Sản Phẩm. All rights reserved. 
            <span class="ms-2">Designed with <i class="fas fa-heart text-danger"></i></span>
        </p>
    </div>
</footer>

<!-- Custom CSS -->
<style>
    .footer {
    background: linear-gradient(180deg, #1e2529, #171b1f);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
}

.footer h5 {
    font-size: 1.25rem;
    letter-spacing: 0.5px;
    color: #ffffff;
}

.underline-effect {
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(90deg, #007bff, #00c4ff);
    transition: width 0.4s ease-in-out, transform 0.3s ease;
}

h5:hover .underline-effect {
    width: 80px;
    transform: translateX(5px);
}

.text-muted {
    color: rgba(255, 255, 255, 0.75) !important;
    font-size: 0.95rem;
    line-height: 1.6;
}

.hover-link {
    position: relative;
    display: inline-block;
    color: #e0e0e0;
    font-size: 0.95rem;
    transition: all 0.3s ease-in-out;
}

.hover-link:hover {
    color: #00aaff !important;
    transform: translateX(8px);
}

.hover-link::before {
    content: '';
    position: absolute;
    width: 0;
    height: 1px;
    bottom: -2px;
    left: 0;
    background: #00aaff;
    transition: width 0.3s ease-in-out;
}

.hover-link:hover::before {
    width: 100%;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.08);
    color: #ffffff;
    font-size: 1.1rem;
    text-decoration: none;
    transition: all 0.4s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.social-link:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
}

.facebook:hover { 
    background: #4267b2; 
    border-color: #4267b2; 
}

.twitter:hover { 
    background: #1da1f2; 
    border-color: #1da1f2; 
}

.instagram:hover { 
    background: linear-gradient(45deg, #f58529, #dd2a7b, #8134af); 
    border-color: #dd2a7b; 
}

.bg-gradient-dark {
    background: linear-gradient(180deg, #171b1f, #121517);
    border-top: 1px solid rgba(255, 255, 255, 0.03);
}

.copyright {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
    letter-spacing: 0.3px;
}

.copyright .text-danger {
    transition: transform 0.3s ease;
}

.copyright:hover .text-danger {
    transform: scale(1.2);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .footer .col-lg-4 {
        margin-bottom: 2rem;
    }
    
    .social-icons {
        justify-content: center;
    }
    
    .underline-effect {
        bottom: -6px;
    }
}
</style>

<!-- Font Awesome (update to latest version) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
      crossorigin="anonymous" referrerpolicy="no-referrer" />
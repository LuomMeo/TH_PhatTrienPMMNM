<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3182ce;
            --secondary-color: #2c5282;
            --text-color: #2d3748;
            --background-color: #f7fafc;
            --hover-color: rgba(49, 130, 206, 0.1);
        }

        * {
            transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .navbar {
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0.75rem 2rem;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }

        .navbar-brand i {
            color: var(--primary-color);
            margin-right: 10px;
            transform: scale(1);
        }

        .navbar-brand:hover i {
            transform: rotate(15deg) scale(1.1);
        }

        .nav-link {
            color: var(--text-color);
            font-weight: 500;
            position: relative;
            border-radius: 8px;
            margin: 0 0.25rem;
            display: flex;
            align-items: center;
        }

        .nav-link i {
            margin-right: 8px;
            color: var(--primary-color);
            opacity: 0.8;
        }

        .nav-link:hover {
            background-color: var(--hover-color);
            color: var(--primary-color);
        }

        .nav-link:hover i {
            opacity: 1;
            transform: translateX(3px);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 10px;
        }

        .dropdown-item {
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: var(--hover-color);
            transform: translateX(5px);
        }

        .username {
            background-color: rgba(49, 130, 206, 0.1);
            color: var(--primary-color);
            border-radius: 6px;
            padding: 0.25rem 0.5rem;
            font-weight: 500;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .form-control {
            border-radius: 20px;
            padding: 0.5rem 1rem;
            border-color: rgba(49, 130, 206, 0.2);
        }

        .btn-search {
            border-radius: 20px;
            margin-left: 10px;
            display: flex;
            align-items: center;
        }

        @media (max-width: 991px) {
            .navbar-nav {
                background-color: white;
                border-radius: 10px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                padding: 1rem;
            }

            .nav-link {
                padding: 0.75rem 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><i class="fas fa-box-open"></i> ShopVinhZ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/Product/"><i class="fas fa-list"></i> Danh sách sản phẩm</a>
                </li>
                <?php if (SessionHelper::isAdmin()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/Product/add"><i class="fas fa-plus-circle"></i> Thêm sản phẩm</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" 
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tags"></i> Quản lý danh mục
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                            <a class="dropdown-item" href="/Category/list"><i class="fas fa-list"></i> Danh sách danh mục</a>
                            <a class="dropdown-item" href="/Category/add"><i class="fas fa-plus"></i> Thêm danh mục mới</a>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-th-large"></i> Danh mục
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/products/phones">Điện thoại</a>
                        <a class="dropdown-item" href="/products/laptops">Laptop</a>
                        <a class="dropdown-item" href="/products/audio">Thiết bị âm thanh</a>
                        <a class="dropdown-item" href="/products/tablets">Máy tính bảng</a>
                        <a class="dropdown-item" href="/products/accessories">Phụ kiện</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="form-inline search-form" action="/search" method="get">
                        <input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm..." name="q" required>
                        <button class="btn btn-outline-primary btn-search" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <?php
                    if (SessionHelper::isLoggedIn()) {
                        echo "<a class='nav-link'><i class='fas fa-user'></i> <span class='username'>" . htmlspecialchars($_SESSION['username']) . "</span></a>";
                    } else {
                        echo "<a class='nav-link' href='/account/login'><i class='fas fa-sign-in-alt'></i> Login</a>";
                    }
                    ?>
                </li>
                <?php if (SessionHelper::isLoggedIn()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/account/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Search Results Modal -->
    <div class="modal fade" id="searchResultsModal" tabindex="-1" role="dialog" aria-labelledby="searchResultsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchResultsModalLabel">Kết quả tìm kiếm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="searchResults" class="row"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const searchInput = this.querySelector('input[name="q"]');
            const searchTerm = searchInput.value.trim();
            
            if (searchTerm) {
                fetch(`/webbanhang/api/product/search?q=${encodeURIComponent(searchTerm)}`)
                    .then(response => response.json())
                    .then(products => {
                        const resultsContainer = document.getElementById('searchResults');
                        resultsContainer.innerHTML = '';

                        if (products.length === 0) {
                            resultsContainer.innerHTML = '<div class="col-12 text-center py-4"><p>Không tìm thấy sản phẩm nào</p></div>';
                        } else {
                            products.forEach(product => {
                                const productCard = `
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100 shadow-sm">
                                            ${product.image ? `
                                                <img src="/${product.image}" class="card-img-top" alt="${escapeHtml(product.name)}" 
                                                     style="height: 200px; object-fit: cover;">
                                            ` : `
                                                <div class="text-center py-4 bg-light">
                                                    <i class="fas fa-image fa-3x text-muted"></i>
                                                </div>
                                            `}
                                            <div class="card-body">
                                                <h5 class="card-title">${escapeHtml(product.name)}</h5>
                                                <p class="card-text text-muted">${escapeHtml(product.description)}</p>
                                                <p class="card-text">
                                                    <strong class="text-primary">${formatPrice(product.price)} VNĐ</strong>
                                                </p>
                                                <a href="/Product/detail/${product.id}" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-info-circle"></i> Chi tiết
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                resultsContainer.innerHTML += productCard;
                            });
                        }
                        $('#searchResultsModal').modal('show');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        const resultsContainer = document.getElementById('searchResults');
                        resultsContainer.innerHTML = '<div class="col-12 text-center py-4"><p class="text-danger">Có lỗi xảy ra khi tìm kiếm</p></div>';
                        $('#searchResultsModal').modal('show');
                    });
            }
        });

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
    </script>
</body>
</html>
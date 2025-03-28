<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <!-- Tiêu đề -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 mb-0">Giỏ hàng của bạn</h1>
        <a href="/Product" class="btn btn-outline-secondary shadow-sm">
            <i class="fas fa-arrow-left me-2"></i>Tiếp tục mua sắm
        </a>
    </div>

    <?php if (!empty($cart)): ?>
        <!-- Danh sách sản phẩm trong giỏ -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="py-3">Sản phẩm</th>
                                <th scope="col" class="py-3">Giá</th>
                                <th scope="col" class="py-3">Số lượng</th>
                                <th scope="col" class="py-3">Tổng</th>
                                <th scope="col" class="py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $grandTotal = 0;
                            foreach ($cart as $id => $item): 
                                $subTotal = $item['price'] * $item['quantity'];
                                $grandTotal += $subTotal;
                            ?>
                                <tr id="product-<?php echo $id; ?>">
                                    <!-- Thông tin sản phẩm -->
                                    <td class="d-flex align-items-center">
                                        <?php if ($item['image']): ?>
                                            <img src="/<?php echo $item['image']; ?>" 
                                                 alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>" 
                                                 class="img-thumbnail me-3" 
                                                 style="width: 80px; height: 80px; object-fit: cover;">
                                        <?php endif; ?>
                                        <h5 class="mb-0">
                                            <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </h5>
                                    </td>

                                    <!-- Giá -->
                                    <td>
                                        <?php echo number_format($item['price'], 0, ',', '.'); ?> VND
                                    </td>

                                    <!-- Số lượng -->
                                    <td>
                                        <div class="input-group input-group-sm" style="width: 140px;">
                                            <button class="btn btn-outline-secondary" 
                                                    type="button" 
                                                    onclick="updateQuantity(<?php echo $id; ?>, -1, this)">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" 
                                                   class="form-control text-center quantity-input" 
                                                   value="<?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>" 
                                                   min="1" 
                                                   data-product-id="<?php echo $id; ?>" 
                                                   onchange="updateQuantityManual(this)">
                                            <button class="btn btn-outline-secondary" 
                                                    type="button" 
                                                    onclick="updateQuantity(<?php echo $id; ?>, 1, this)">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>

                                    <!-- Tổng tiền sản phẩm -->
                                    <td class="fw-bold text-primary subtotal" data-subtotal="<?php echo $subTotal; ?>">
                                        <?php echo number_format($subTotal, 0, ',', '.'); ?> VND
                                    </td>

                                    <!-- Xóa sản phẩm -->
                                    <td>
                                        <button class="btn btn-danger btn-sm shadow-sm" 
                                                onclick="removeFromCart(<?php echo $id; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tổng cộng và nút thanh toán -->
            <div class="card-footer bg-white border-top-0 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        Tổng cộng: 
                        <span class="text-primary fw-bold grand-total">
                            <?php echo number_format($grandTotal, 0, ',', '.'); ?> VND
                        </span>
                    </h4>
                    <a href="/Product/checkout" class="btn btn-success btn-lg shadow-sm px-4">
                        <i class="fas fa-check me-2"></i>Thanh toán
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Giỏ hàng trống -->
        <div class="card shadow-sm border-0 text-center py-5">
            <div class="card-body">
                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Giỏ hàng của bạn đang trống</h4>
                <p>Bắt đầu mua sắm để thêm sản phẩm vào giỏ!</p>
                <a href="/Product" class="btn btn-primary shadow-sm px-4">
                    <i class="fas fa-shopping-bag me-2"></i>Bắt đầu mua sắm
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- CSS tùy chỉnh -->
<style>
    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .table th, .table td {
        border: none;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.3s ease;
    }

    .img-thumbnail {
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .img-thumbnail:hover {
        transform: scale(1.05);
    }

    .input-group-sm .btn {
        padding: 0.25rem 0.5rem;
    }

    .quantity-input {
        border-radius: 5px;
        padding: 0.25rem;
        font-size: 1rem;
        width: 50px;
    }

    .btn {
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

<!-- Script xử lý số lượng và xóa sản phẩm -->
<script>
    function updateQuantity(productId, change, button) {
        const input = button.parentElement.querySelector('.quantity-input');
        let newQuantity = parseInt(input.value) + change;
        
        if (newQuantity < 1) return; // Không cho số lượng nhỏ hơn 1
        
        input.value = newQuantity;
        updateCart(productId, newQuantity);
    }

    function updateQuantityManual(input) {
        let newQuantity = parseInt(input.value);
        let productId = input.getAttribute('data-product-id');
        
        if (newQuantity < 1) {
            input.value = 1; // Đặt lại về 1 nếu nhập nhỏ hơn 1
            newQuantity = 1;
        }
        
        updateCart(productId, newQuantity);
    }

    function updateCart(productId, quantity) {
        fetch(`/Product/updateCart/${productId}/${quantity}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Cập nhật tổng tiền sản phẩm
                const row = document.getElementById(`product-${productId}`);
                const subtotalElement = row.querySelector('.subtotal');
                const newSubtotal = data.price * quantity;
                subtotalElement.textContent = newSubtotal.toLocaleString('vi-VN') + ' VND';
                subtotalElement.setAttribute('data-subtotal', newSubtotal);

                // Cập nhật tổng giỏ hàng
                const grandTotalElement = document.querySelector('.grand-total');
                let grandTotal = 0;
                document.querySelectorAll('.subtotal').forEach(item => {
                    grandTotal += parseInt(item.getAttribute('data-subtotal'));
                });
                grandTotalElement.textContent = grandTotal.toLocaleString('vi-VN') + ' VND';
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function removeFromCart(productId) {
        if (confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')) {
            fetch(`/Product/removeFromCart/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const row = document.getElementById(`product-${productId}`);
                    row.remove();

                    // Cập nhật tổng giỏ hàng
                    const grandTotalElement = document.querySelector('.grand-total');
                    let grandTotal = 0;
                    document.querySelectorAll('.subtotal').forEach(item => {
                        grandTotal += parseInt(item.getAttribute('data-subtotal'));
                    });
                    grandTotalElement.textContent = grandTotal.toLocaleString('vi-VN') + ' VND';

                    // Nếu giỏ hàng trống, tải lại trang
                    if (document.querySelectorAll('tbody tr').length === 0) {
                        location.reload();
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
</script>

<?php include 'app/views/shares/footer.php'; ?>
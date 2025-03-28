<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 text-center">
                <div class="card-header bg-gradient-success text-white py-4">
                    <h1 class="h3 mb-0"><i class="fas fa-check-circle me-2"></i>Xác nhận đơn hàng</h1>
                </div>
                <div class="card-body p-5">
                    <!-- Thông báo thành công -->
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
                        <h4 class="fw-bold" style="color: #2c3e50;">Đặt hàng thành công!</h4>
                        <p class="text-muted">Cảm ơn bạn đã mua sắm với chúng tôi. Đơn hàng của bạn đã được xử lý thành công.</p>
                    </div>

                    <!-- Thông tin đơn hàng (giả định) -->
                    <?php if (!empty($order)): ?>
                        <div class="order-details bg-light p-4 rounded-3 mb-4">
                            <h5 class="fw-bold mb-3" style="color: #2c3e50;">Chi tiết đơn hàng</h5>
                            <div class="row text-start">
                                <div class="col-md-6">
                                    <p><strong>Mã đơn hàng:</strong> #<?php echo htmlspecialchars($order['id'], ENT_QUOTES, 'UTF-8'); ?></p>
                                    <p><strong>Ngày đặt:</strong> <?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></p>
                                    <p><strong>Phương thức thanh toán:</strong> 
                                        <?php echo $order['payment_method'] === 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng'; ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Họ tên:</strong> <?php echo htmlspecialchars($order['name'], ENT_QUOTES, 'UTF-8'); ?></p>
                                    <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($order['address'], ENT_QUOTES, 'UTF-8'); ?></p>
                                    <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($order['phone'], ENT_QUOTES, 'UTF-8'); ?></p>
                                </div>
                            </div>
                            <!-- Danh sách sản phẩm -->
                            <div class="table-responsive mt-3">
                                <table class="table table-borderless">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $grandTotal = 0;
                                        foreach ($order['items'] as $item): 
                                            $subTotal = $item['price'] * $item['quantity'];
                                            $grandTotal += $subTotal;
                                        ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo $item['quantity']; ?></td>
                                                <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</td>
                                                <td><?php echo number_format($subTotal, 0, ',', '.'); ?> VND</td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="fw-bold">
                                            <td colspan="3" class="text-end">Tổng cộng:</td>
                                            <td><?php echo number_format($grandTotal, 0, ',', '.'); ?> VND</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-center gap-3">
                        <a href="/Product" class="btn btn-primary btn-lg shadow-sm px-4">
                            <i class="fas fa-shopping-bag me-2"></i>Tiếp tục mua sắm
                        </a>
                        <?php if (!empty($order)): ?>
                            <a href="/Order/details/<?php echo $order['id']; ?>" class="btn btn-outline-dark btn-lg shadow-sm px-4">
                                <i class="fas fa-eye me-2"></i>Xem chi tiết đơn hàng
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS tùy chỉnh -->
<style>
    .bg-gradient-success {
        background: linear-gradient(45deg, #28a745, #34d058);
    }

    .card {
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .card-header {
        border-bottom: none;
    }

    .order-details {
        border: 1px solid #e9ecef;
    }

    .table th, .table td {
        border: none;
        padding: 0.75rem;
    }

    .table thead th {
        background-color: #f8f9fa;
        color: #495057;
    }

    .table tfoot td {
        color: #2c3e50;
        font-size: 1.1rem;
    }

    .btn {
        border-radius: 12px;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(45deg, #007bff, #00b4db);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #0056b3, #0088b3);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .btn-outline-dark {
        border-color: #2c3e50;
        color: #2c3e50;
    }

    .btn-outline-dark:hover {
        background-color: #2c3e50;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .fa-check-circle {
        color: #28a745;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>
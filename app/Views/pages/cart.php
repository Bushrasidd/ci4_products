<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Shopping Cart</h2>
    <?php if (empty($cartItems)) : ?>
        <div class="alert alert-info">Your cart is empty. <a href="<?= base_url() ?>">Continue shopping</a></div>
    <?php else : ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item) : ?>
                        <tr>
                            <td><?= esc($item['name']) ?></td>
                            <td>
                                <img src="<?= base_url($item['img_path']) ?>" 
                                     alt="<?= esc($item['name']) ?>" 
                                     style="max-width: 100px;">
                            </td>
                            <td>$<?= number_format($item['price'], 2) ?></td>
                            <td>
                                <input type="number" 
                                       class="form-control quantity-input" 
                                       value="<?= $item['quantity'] ?>" 
                                       min="1" 
                                       data-product-id="<?= $item['product_id'] ?>"
                                       style="width: 80px;">
                            </td>
                            <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm remove-item" 
                                        data-product-id="<?= $item['product_id'] ?>">
                                    Remove
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Total:</strong></td>
                        <td><strong>$<?= number_format($total, 2) ?></strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="text-right mt-3">
            <a href="<?= base_url() ?>" class="btn btn-secondary">Continue Shopping</a>
            <button class="btn btn-primary">Proceed to Checkout</button>
        </div>
    <?php endif; ?>
</div>

<script>
$(document).ready(function() {
    // Update quantity
    $('.quantity-input').change(function() {
        const productId = $(this).data('product-id');
        const quantity = $(this).val();
        
        $.ajax({
            url: '<?= base_url('cart/updateQuantity') ?>',
            type: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                <?= csrf_token() ?>: '<?= csrf_hash() ?>'
            },
            success: function(response) {
                if (response.success) {
                    $('#cartCount').text(response.cartCount);
                    location.reload(); // Reload to update totals
                }
            }
        });
    });

    // Remove item
    $('.remove-item').click(function() {
        const productId = $(this).data('product-id');
        const row = $(this).closest('tr');
        
        $.ajax({
            url: '<?= base_url('cart/remove') ?>',
            type: 'POST',
            data: {
                product_id: productId,
                <?= csrf_token() ?>: '<?= csrf_hash() ?>'
            },
            success: function(response) {
                if (response.success) {
                    row.remove();
                    $('#cartCount').text(response.cartCount);
                    
                    if ($('tbody tr').length === 0) {
                        location.reload();
                    } else {
                        location.reload(); // Reload to update totals
                    }
                }
            }
        });
    });
});
</script>
<?= $this->endSection() ?> 
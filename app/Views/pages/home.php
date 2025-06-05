<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="text-center py-5">
    <h1 class="display-4">Experience Excellence in Every Product</h1>
    <p class="lead">Handpicked for quality, designed for elegance.</p>
</div>

<div class="row mt-4">
    <?php foreach ($products as $product): ?>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-image-container" style="background-image:url('<?= $product['img_path'] ?>')">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $product['name'] ?></h5>
                <p class="card-text"><?= $product['description'] ?></p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="h5 mb-0">₹<?= number_format($product['price'], 2) ?></span>
                </div>
                <form class="add-to-cart-form">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.add-to-cart-form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const productId = this.querySelector('input[name="product_id"]').value;
            
            fetch('<?= base_url('cart/add') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: 'product_id=' + productId
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Product added to cart!');
                    // You can update cart count here if needed
                } else {
                    alert('Failed to add product to cart');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding to cart');
            });
        });
    });
});
</script>
<?= $this->endSection() ?> 
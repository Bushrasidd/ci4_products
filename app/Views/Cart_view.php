<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Your Shopping Cart</h1>
    <?php if (empty($items)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><img src="<?= base_url($item['img_path']) ?>" width="50" /></td>
                        <td><?= $item['name'] ?></td>
                        <td>₹<?= $item['price'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>₹<?= $item['price'] * $item['quantity'] ?></td>
                        <td>
                            <a href="<?= base_url('cart/remove/' . $item['product_id']) ?>" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <h4>Total: ₹<?= $total ?></h4>
        <a href="<?= base_url('cart/clear') ?>" class="btn btn-warning">Clear Cart</a>
    <?php endif ?>
    
    <div class="mt-3">
        <a href="<?= base_url() ?>" class="btn btn-primary">Continue Shopping</a>
    </div>
</body>
</html>

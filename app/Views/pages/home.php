<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="text-center py-5">
    <h1 class="display-4">Welcome to Our Website</h1>
    <p class="lead">We're here to help you achieve your goals.</p>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Our Mission</h5>
                <p class="card-text">To provide exceptional service and innovative solutions to our valued customers.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Our Vision</h5>
                <p class="card-text">To become the leading provider of quality services in our industry.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Our Values</h5>
                <p class="card-text">Integrity, innovation, and customer satisfaction are at the core of everything we do.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 
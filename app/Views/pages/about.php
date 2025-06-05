<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="text-center mb-4">About Us</h1>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Who We Are</h5>
                <p class="card-text">
                    We are a dedicated team of professionals committed to delivering excellence in everything we do. 
                    Our journey began with a simple idea: to make a difference in our industry by providing innovative solutions.
                </p>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Our Team</h5>
                <p class="card-text">
                    Our team consists of passionate individuals who bring diverse skills and experiences to the table. 
                    We believe in collaboration, continuous learning, and pushing boundaries to achieve the best results.
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Why Choose Us</h5>
                <ul class="list-unstyled">
                    <li>✓ Years of industry experience</li>
                    <li>✓ Dedicated customer support</li>
                    <li>✓ Innovative solutions</li>
                    <li>✓ Quality assurance</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 
<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'ci4_database';

try {
    $conn = new mysqli($hostname, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    echo "Database connection successful!\n";
    
    // Create cart_items table
    $sql = "CREATE TABLE IF NOT EXISTS cart_items (
        cart_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_id INT(11) NOT NULL,
        quantity INT(11) DEFAULT 1,
        session_id VARCHAR(255) NOT NULL,
        name VARCHAR(50) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        img_path TEXT,
        created_at DATETIME NULL,
        updated_at DATETIME NULL,
        INDEX(session_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    if ($conn->query($sql) === TRUE) {
        echo "cart_items table created successfully\n";
    } else {
        echo "Error creating cart_items table: " . $conn->error . "\n";
    }

    // Create products table
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        img_path VARCHAR(255) NOT NULL,
        description TEXT NULL,
        created_at DATETIME NULL,
        updated_at DATETIME NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    if ($conn->query($sql) === TRUE) {
        echo "products table created successfully\n";
    } else {
        echo "Error creating products table: " . $conn->error . "\n";
    }

    // Insert sample products
    $products = [
        [
            'name' => 'Nike Dunk Low',
            'price' => 99.99,
            'img_path' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff',
            'description' => 'Iconic basketball-turned-streetwear sneaker with classic style.'
        ],
        [
            'name' => 'Air Jordan 1 Mid',
            'price' => 129.99,
            'img_path' => 'https://images.unsplash.com/photo-1552346154-21d32810aba3',
            'description' => 'Legendary basketball shoe with timeless appeal and comfort.'
        ],
        [
            'name' => 'Nike Air VaporMax Plus',
            'price' => 199.99,
            'img_path' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa',
            'description' => 'Revolutionary cushioning meets retro-futuristic design.'
        ],
        [
            'name' => 'Nike Blazer Mid',
            'price' => 109.99,
            'img_path' => 'https://images.unsplash.com/photo-1597248881519-db089d3744a5',
            'description' => 'Vintage-inspired basketball shoe with modern comfort features.'
        ],
        [
            'name' => 'Nike Metcon',
            'price' => 139.99,
            'img_path' => 'https://images.unsplash.com/photo-1605348532760-6753d2c43329',
            'description' => 'Ultimate training shoe for stability and durability.'
        ],
        [
            'name' => 'Nike Zegama',
            'price' => 159.99,
            'img_path' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a',
            'description' => 'Trail running shoe with superior grip and durability.'
        ]
    ];

    $now = date('Y-m-d H:i:s');
    foreach ($products as $product) {
        $sql = "INSERT INTO products (name, price, img_path, description, created_at, updated_at) 
                VALUES (
                    '{$product['name']}', 
                    {$product['price']}, 
                    '{$product['img_path']}', 
                    '{$product['description']}',
                    '{$now}',
                    '{$now}'
                )";

        if ($conn->query($sql) === TRUE) {
            echo "Product {$product['name']} inserted successfully\n";
        } else {
            echo "Error inserting product {$product['name']}: " . $conn->error . "\n";
        }
    }
    
    $conn->close();
    echo "All operations completed!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLAM | Shopping Cart</title>
    <style>
        :root {
            --primary-color: #222;
            --secondary-color: #f8f0e8;
            --accent-color: #d4af7a;
            --text-color: #333;
            --light-gray: #f9f9f9;
            --medium-gray: #e0e0e0;
            --dark-gray: #777;
            --border-radius: 4px;
            --box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
            --font-primary: 'Poppins', sans-serif;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-primary);
        }
        
        body {
            background-color: #fff;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        header {
            background-color: var(--primary-color);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            color: white;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
            text-decoration: none;
        }
        
        .nav-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .nav-icon {
            color: white;
            font-size: 20px;
            position: relative;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--accent-color);
            color: white;
            font-size: 11px;
            font-weight: 600;
            height: 18px;
            width: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }
        
        .page-title {
            padding: 30px 0;
            background-color: var(--secondary-color);
            margin-bottom: 40px;
        }
        
        .page-title h1 {
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            color: var(--primary-color);
        }
        
        .cart-page {
            display: flex;
            flex-direction: column;
            gap: 40px;
            margin-bottom: 60px;
        }
        
        @media (min-width: 992px) {
            .cart-page {
                flex-direction: row;
                align-items: flex-start;
            }
            
            .cart-items {
                flex: 1;
            }
            
            .cart-summary {
                width: 350px;
            }
        }
        
        .cart-items {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }
        
        .cart-header {
            padding: 15px 20px;
            border-bottom: 1px solid var(--medium-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .cart-header h2 {
            font-size: 18px;
            font-weight: 600;
        }
        
        .item-count {
            background-color: var(--accent-color);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }
        
        .cart-item {
            display: flex;
            padding: 20px;
            border-bottom: 1px solid var(--medium-gray);
            position: relative;
        }
        
        .item-image {
            width: 100px;
            height: 130px;
            object-fit: cover;
            border-radius: var(--border-radius);
            background-color: var(--light-gray);
        }
        
        .item-details {
            flex: 1;
            padding-left: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .item-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        
        .item-name {
            font-weight: 500;
            font-size: 16px;
            color: var(--primary-color);
        }
        
        .item-category {
            color: var(--dark-gray);
            font-size: 14px;
        }
        
        .item-size {
            font-size: 14px;
            color: var(--dark-gray);
            margin-bottom: 5px;
        }
        
        .size-selector {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }
        
        .size-option {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid var(--medium-gray);
            border-radius: 50%;
            cursor: pointer;
            font-size: 12px;
            transition: var(--transition);
        }
        
        .size-option:hover {
            border-color: var(--accent-color);
        }
        
        .size-option.selected {
            background-color: var(--accent-color);
            color: white;
            border-color: var(--accent-color);
        }
        
        .item-actions {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 15px;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            border: 1px solid var(--medium-gray);
            border-radius: var(--border-radius);
            overflow: hidden;
        }
        
        .quantity-btn {
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--light-gray);
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: var(--transition);
        }
        
        .quantity-btn:hover {
            background-color: var(--medium-gray);
        }
        
        .quantity-input {
            width: 40px;
            height: 30px;
            text-align: center;
            border: none;
            border-left: 1px solid var(--medium-gray);
            border-right: 1px solid var(--medium-gray);
            font-size: 14px;
        }
        
        .quantity-input:focus {
            outline: none;
        }
        
        .item-price {
            font-weight: 600;
            font-size: 16px;
            color: var(--primary-color);
        }
        
        .remove-item {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: var(--dark-gray);
            transition: var(--transition);
        }
        
        .remove-item:hover {
            color: #e74c3c;
        }
        
        .empty-cart {
            padding: 40px 20px;
            text-align: center;
        }
        
        .empty-cart-icon {
            font-size: 60px;
            color: var(--medium-gray);
            margin-bottom: 20px;
        }
        
        .empty-cart h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .empty-cart p {
            color: var(--dark-gray);
            margin-bottom: 20px;
        }
        
        .continue-shopping {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: white;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .continue-shopping:hover {
            background-color: #000;
        }
        
        .cart-summary {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 20px;
            position: sticky;
            top: 100px;
        }
        
        .summary-header {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--medium-gray);
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }
        
        .summary-item.total {
            font-size: 16px;
            font-weight: 600;
            padding-top: 15px;
            margin-top: 15px;
            border-top: 1px solid var(--medium-gray);
        }
        
        .coupon-code {
            margin: 20px 0;
        }
        
        .coupon-input {
            display: flex;
            margin-top: 10px;
        }
        
        .coupon-field {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid var(--medium-gray);
            border-radius: var(--border-radius) 0 0 var(--border-radius);
            font-size: 14px;
        }
        
        .coupon-field:focus {
            outline: none;
            border-color: var(--accent-color);
        }
        
        .apply-coupon {
            padding: 0 15px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .apply-coupon:hover {
            background-color: #000;
        }
        
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background-color: var(--accent-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .checkout-btn:hover {
            background-color: #c19a65;
        }
        
        .continue-btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            border-radius: var(--border-radius);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            text-decoration: none;
        }
        
        .continue-btn:hover {
            background-color: var(--light-gray);
        }
        
        .payment-methods {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        .payment-method {
            width: 40px;
            height: 25px;
            object-fit: contain;
            opacity: 0.6;
        }
        
        /* Added styles for the cross-sell section */
        .cross-sell {
            margin-top: 60px;
            margin-bottom: 60px;
        }
        
        .section-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
            position: relative;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 2px;
            background-color: var(--accent-color);
        }
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }
        
        .product-card {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background-color: var(--light-gray);
        }
        
        .product-info {
            padding: 15px;
        }
        
        .product-category {
            font-size: 12px;
            color: var(--dark-gray);
            margin-bottom: 5px;
        }
        
        .product-name {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--primary-color);
        }
        
        .product-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .price {
            font-weight: 600;
            font-size: 16px;
            color: var(--primary-color);
        }
        
        .add-to-cart {
            width: 32px;
            height: 32px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--accent-color);
            color: white;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .add-to-cart:hover {
            background-color: #c19a65;
        }
        
        /* Toast notification */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: white;
            padding: 15px 25px;
            border-radius: var(--border-radius);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateY(100px);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
            z-index: 1000;
        }
        
        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        .toast-icon {
            font-size: 20px;
            color: #2ecc71;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 15px;
            }
            
            .item-details {
                padding-left: 0;
                width: 100%;
            }
            
            .item-actions {
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }
            
            .size-selector {
                justify-content: center;
            }
            
            .remove-item {
                top: 10px;
                right: 10px;
            }
        }
        
        @media (max-width: 576px) {
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
            
            .page-title h1 {
                font-size: 24px;
            }
        }
        
        /* Added icons */
        .icon {
            display: inline-block;
            height: 1em;
            width: 1em;
            vertical-align: middle;
            position: relative;
        }
        
        /* SVG Icons */
        .icon-cart:before {
            content: '🛒';
        }
        
        .icon-heart:before {
            content: '♡';
        }
        
        .icon-user:before {
            content: '👤';
        }
        
        .icon-search:before {
            content: '🔍';
        }
        
        .icon-trash:before {
            content: '🗑️';
        }
        
        .icon-bag:before {
            content: '👜';
        }
        
        .icon-check:before {
            content: '✓';
        }
        
        /* Notification badge */
        .notification {
            display: flex;
            align-items: center;
            background-color: #dcf8f1;
            border-left: 4px solid #2ecc71;
            padding: 15px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
        }
        
        .notification-icon {
            margin-right: 10px;
            color: #2ecc71;
            font-size: 18px;
        }
        
        .notification-message {
            font-size: 14px;
            color: #333;
        }
    </style>
    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo">GLAM</a>
                <div class="nav-icons">
                    <a href="#" class="nav-icon"><span class="icon icon-search"></span></a>
                    <a href="#" class="nav-icon"><span class="icon icon-heart"></span></a>
                    <a href="#" class="nav-icon">
                        <span class="icon icon-cart"></span>
                        <span class="cart-count">3</span>
                    </a>
                    <a href="#" class="nav-icon"><span class="icon icon-user"></span></a>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Page Title -->
    <div class="page-title">
        <div class="container">
            <h1>Shopping Cart</h1>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="container">
        <!-- Notification -->
        <div class="notification">
            <span class="notification-icon">✓</span>
            <div class="notification-message">Free shipping on all orders over $100!</div>
        </div>
        
        <!-- Cart Section -->
        <div class="cart-page">
            <!-- Cart Items -->
            <div class="cart-items">
                <div class="cart-header">
                    <h2>Your Shopping Bag</h2>
                    <span class="item-count">3 Items</span>
                </div>
                
                <!-- Cart Item 1: Jumpsuit -->
                <div class="cart-item">
                    <img src="/api/placeholder/200/300" alt="Elegant Jumpsuit" class="item-image">
                    <div class="item-details">
                        <div class="item-info">
                            <h3 class="item-name">Elegant Wide Leg Jumpsuit</h3>
                            <span class="item-category">Jumpsuits</span>
                            <div class="item-size">Size: <strong>M</strong></div>
                            
                            <div class="size-selector">
                                <div class="size-option">XS</div>
                                <div class="size-option">S</div>
                                <div class="size-option selected">M</div>
                                <div class="size-option">L</div>
                                <div class="size-option">XL</div>
                            </div>
                        </div>
                        
                        <div class="item-actions">
                            <div class="quantity-selector">
                                <button class="quantity-btn decrease-qty">-</button>
                                <input type="text" class="quantity-input" value="1" min="1" max="10">
                                <button class="quantity-btn increase-qty">+</button>
                            </div>
                            <div class="item-price">$89.99</div>
                        </div>
                    </div>
                    <button class="remove-item"><span class="icon icon-trash"></span></button>
                </div>
                
                <!-- Cart Item 2: Heels -->
                <div class="cart-item">
                    <img src="/api/placeholder/200/300" alt="Stiletto Heels" class="item-image">
                    <div class="item-details">
                        <div class="item-info">
                            <h3 class="item-name">Stiletto Strappy Heels</h3>
                            <span class="item-category">Shoes</span>
                            <div class="item-size">Size: <strong>38</strong></div>
                            
                            <div class="size-selector">
                                <div class="size-option">36</div>
                                <div class="size-option">37</div>
                                <div class="size-option selected">38</div>
                                <div class="size-option">39</div>
                                <div class="size-option">40</div>
                            </div>
                        </div>
                        
                        <div class="item-actions">
                            <div class="quantity-selector">
                                <button class="quantity-btn decrease-qty">-</button>
                                <input type="text" class="quantity-input" value="1" min="1" max="10">
                                <button class="quantity-btn increase-qty">+</button>
                            </div>
                            <div class="item-price">$64.99</div>
                        </div>
                    </div>
                    <button class="remove-item"><span class="icon icon-trash"></span></button>
                </div>
                
                <!-- Cart Item 3: Espadrilles (Mapallaz) -->
                <div class="cart-item">
                    <img src="/api/placeholder/200/300" alt="Espadrille Wedges" class="item-image">
                    <div class="item-details">
                        <div class="item-info">
                            <h3 class="item-name">Classic Wedge Espadrilles</h3>
                            <span class="item-category">Mapallaz</span>
                            <div class="item-size">Size: <strong>39</strong></div>
                            
                            <div class="size-selector">
                                <div class="size-option">36</div>
                                <div class="size-option">37</div>
                                <div class="size-option">38</div>
                                <div class="size-option selected">39</div>
                                <div class="size-option">40</div>
                            </div>
                        </div>
                        
                        <div class="item-actions">
                            <div class="quantity-selector">
                                <button class="quantity-btn decrease-qty">-</button>
                                <input type="text" class="quantity-input" value="1" min="1" max="10">
                                <button class="quantity-btn increase-qty">+</button>
                            </div>
                            <div class="item-price">$49.99</div>
                        </div>
                    </div>
                    <button class="remove-item"><span class="icon icon-trash"></span></button>
                </div>
                
                <!-- Empty Cart (Hidden by default) -->
                <div class="empty-cart" style="display: none;">
                    <div class="empty-cart-icon">
                        <span class="icon icon-bag"></span>
                    </div>
                    <h3>Your cart is empty</h3>
                    <p>Looks like you haven't added any items to your cart yet.</p>
                    <a href="#" class="continue-shopping">Continue Shopping</a>
                </div>
            </div>
            
            <!-- Cart Summary -->
            <div class="cart-summary">
                <h3 class="summary-header">Order Summary</h3>
                
                <div class="summary-item">
                    <span>Subtotal</span>
                    <span>$204.97</span>
                </div>
                
                <div class="summary-item">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>
                
                <div class="summary-item">
                    <span>Tax</span>
                    <span>$16.40</span>
                </div>
                
                <div class="summary-item">
                    <span>Discount</span>
                    <span>-$0.00</span>
                </div>
                
                <div class="summary-item total">
                    <span>Total</span>
                    <span>$221.37</span>
                </div>
                
                <div class="coupon-code">
                    <label for="coupon">Promo Code</label>
                    <div class="coupon-input">
                        <input type="text" id="coupon" class="coupon-field" placeholder="Enter promo code">
                        <button class="apply-coupon">Apply</button>
                    </div>
                </div>
                
                <button class="checkout-btn">Proceed to Checkout</button>
                <a href="#" class="continue-btn">Continue Shopping</a>
                
                <div class="payment-methods">
                    <img src="/api/placeholder/40/25" alt="Visa" class="payment-method">
                    <img src="/api/placeholder/40/25" alt="Mastercard" class="payment-method">
                    <img src="/api/placeholder/40/25" alt="Amex" class="payment-method">
                    <img src="/api/placeholder/40/25" alt="PayPal" class="payment-method">
                    <img src="/api/placeholder/40/25" alt="Apple Pay" class="payment-method">
                </div>
            </div>
        </div>
        
        <!-- Cross Sell Section -->
        <div class="cross-sell">
            <h2 class="section-title">You May Also Like</h2>
            
            <div class="product-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <img src="/api/placeholder/200/250" alt="Floral Dress" class="product-image">
                    <div class="product-info">
                        <div class="product-category">Dresses</div>
                        <h3 class="product-name">Floral Summer Maxi Dress</h3>
                        <div class="product-price">
                            <span class="price">$59.99</span>
                            <button class="add-to-cart">+</button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product-card">
                    <img src="/api/placeholder/200/250" alt="Party Dress" class="product-image">
                    <div class="product-info">
                        <div class="product-category">Dresses</div>
                        <h3 class="product-name">Elegant Evening Party Dress</h3>
                        <div class="product-price">
                            <span class="price">$79.99</span>
                            <button class="add-to-cart">+</button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product-card">
                    <img src="/api/placeholder/200/250" alt="Casual Jumpsuit" class="product-image">
                    <div class="product-info">
                        <div class="product-category">Jumpsuits</div>
                        <h3 class="product-name">Casual Linen Jumpsuit</h3>
                        <div class="product-price">
                            <span class="price">$69.99</span>
                            <button class="add-to-cart">+</button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="product-card">
                    <img src="/api/placeholder/200/250" alt="Platform Heels" class="product-image">
                    <div class="product-info">
                        <div class="product-category">Shoes</div>
                        <h3 class="product-name">Platform Block Heels</h3>
                        <div class="product-price">
                            <span class="price">$54.99</span>
                            <button class="add-to-cart">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <span class="toast-icon">✓</span>
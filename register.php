<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Access</title>
    <style>
        :root {
            --primary-color: #4a6fdc;
            --primary-dark: #3a5bb9;
            --light-gray: #f8f9fa;
            --dark-gray: #495057;
            --border-radius: 8px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: 440px;
            overflow: hidden;
        }
        
        .header {
            padding: 24px;
            text-align: center;
            background-color: var(--light-gray);
            border-bottom: 1px solid #e9ecef;
        }
        
        .header h1 {
            font-size: 24px;
            color: var(--dark-gray);
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .header p {
            color: #6c757d;
            font-size: 15px;
        }
        
        .tab-control {
            display: flex;
            border-bottom: 1px solid #e9ecef;
        }
        
        .tab-control button {
            flex: 1;
            background: none;
            border: none;
            padding: 16px;
            font-size: 15px;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }
        
        .tab-control button.active {
            color: var(--primary-color);
        }
        
        .tab-control button.active:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .form-container {
            padding: 24px;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--dark-gray);
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ced4da;
            border-radius: var(--border-radius);
            font-size: 15px;
            transition: var(--transition);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(74, 111, 220, 0.15);
        }
        
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .form-check input {
            margin-right: 8px;
        }
        
        .form-check label {
            font-size: 14px;
            color: #6c757d;
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: var(--border-radius);
            background-color: var(--primary-color);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
        }
        
        .helper-text {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }
        
        .helper-text a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .helper-text a:hover {
            text-decoration: underline;
        }
        
        .password-container {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
        }
        
        .success-message {
            color: #28a745;
            text-align: center;
            padding: 15px;
            display: none;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
        
        @media (max-width: 480px) {
            .container {
                box-shadow: none;
            }
            
            .header h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 id="form-title">Welcome Back</h1>
            <p id="form-subtitle">Sign in to access your account</p>
        </div>
        
        <div class="tab-control">
            <button id="login-tab" class="active">Login</button>
            <button id="register-tab">Register</button>
        </div>
        
        <div class="form-container">
            <!-- Login Form -->
            <div id="login-content" class="tab-content active">
                <form id="login-form">
                    <div class="form-group">
                        <label for="login-email">Email Address</label>
                        <input type="email" class="form-control" id="login-email" placeholder="Enter your email" required>
                        <div class="error-message" id="login-email-error"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <div class="password-container">
                            <input type="password" class="form-control" id="login-password" placeholder="Enter your password" required>
                            <button type="button" class="password-toggle" id="login-toggle-password">Show</button>
                        </div>
                        <div class="error-message" id="login-password-error"></div>
                    </div>
                    
                    <div class="form-check">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                    
                    <button type="submit" class="btn">Sign In</button>
                    <div class="success-message" id="login-success">Login successful!</div>
                    
                    <span class="helper-text">
                        <a href="#" id="forgot-password-link">Forgot your password?</a>
                    </span>
                </form>
            </div>
            
            <!-- Register Form -->
            <div id="register-content" class="tab-content">
                <form id="register-form">
                    <div class="form-group">
                        <label for="register-name">Full Name</label>
                        <input type="text" class="form-control" id="register-name" placeholder="Enter your full name" required>
                        <div class="error-message" id="register-name-error"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-email">Email Address</label>
                        <input type="email" class="form-control" id="register-email" placeholder="Enter your email" required>
                        <div class="error-message" id="register-email-error"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-password">Password</label>
                        <div class="password-container">
                            <input type="password" class="form-control" id="register-password" placeholder="Create a password" required>
                            <button type="button" class="password-toggle" id="register-toggle-password">Show</button>
                        </div>
                        <div class="error-message" id="register-password-error"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-confirm">Confirm Password</label>
                        <div class="password-container">
                            <input type="password" class="form-control" id="register-confirm" placeholder="Confirm your password" required>
                            <button type="button" class="password-toggle" id="confirm-toggle-password">Show</button>
                        </div>
                        <div class="error-message" id="register-confirm-error"></div>
                    </div>
                    
                    <div class="form-check">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">I agree to the Terms of Service and Privacy Policy</label>
                    </div>
                    
                    <button type="submit" class="btn">Create Account</button>
                    <div class="success-message" id="register-success">Registration successful!</div>
                </form>
            </div>
            
            <!-- Forgot Password Form -->
            <div id="forgot-password-content" class="tab-content">
                <form id="forgot-password-form">
                    <div class="form-group">
                        <label for="forgot-email">Email Address</label>
                        <input type="email" class="form-control" id="forgot-email" placeholder="Enter your email" required>
                        <div class="error-message" id="forgot-email-error"></div>
                    </div>
                    
                    <button type="submit" class="btn">Reset Password</button>
                    <div class="success-message" id="forgot-success">Password reset instructions have been sent to your email</div>
                    
                    <span class="helper-text">
                        <a href="#" id="back-to-login">Back to login</a>
                    </span>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching logic
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');
            const loginContent = document.getElementById('login-content');
            const registerContent = document.getElementById('register-content');
            const forgotPasswordContent = document.getElementById('forgot-password-content');
            const forgotPasswordLink = document.getElementById('forgot-password-link');
            const backToLoginLink = document.getElementById('back-to-login');
            const formTitle = document.getElementById('form-title');
            const formSubtitle = document.getElementById('form-subtitle');
            
            // Toggle password visibility
            const passwordToggles = document.querySelectorAll('.password-toggle');
            passwordToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.textContent = 'Hide';
                    } else {
                        input.type = 'password';
                        this.textContent = 'Show';
                    }
                });
            });
            
            // Tab switching functionality
            loginTab.addEventListener('click', function() {
                loginTab.classList.add('active');
                registerTab.classList.remove('active');
                loginContent.classList.add('active');
                registerContent.classList.remove('active');
                forgotPasswordContent.classList.remove('active');
                formTitle.textContent = 'Welcome Back';
                formSubtitle.textContent = 'Sign in to access your account';
            });
            
            registerTab.addEventListener('click', function() {
                registerTab.classList.add('active');
                loginTab.classList.remove('active');
                registerContent.classList.add('active');
                loginContent.classList.remove('active');
                forgotPasswordContent.classList.remove('active');
                formTitle.textContent = 'Create an Account';
                formSubtitle.textContent = 'Fill in your details to get started';
            });
            
            forgotPasswordLink.addEventListener('click', function(e) {
                e.preventDefault();
                loginContent.classList.remove('active');
                registerContent.classList.remove('active');
                forgotPasswordContent.classList.add('active');
                loginTab.classList.remove('active');
                registerTab.classList.remove('active');
                formTitle.textContent = 'Reset Password';
                formSubtitle.textContent = 'Enter your email to receive reset instructions';
            });
            
            backToLoginLink.addEventListener('click', function(e) {
                e.preventDefault();
                loginTab.classList.add('active');
                registerTab.classList.remove('active');
                loginContent.classList.add('active');
                forgotPasswordContent.classList.remove('active');
                formTitle.textContent = 'Welcome Back';
                formSubtitle.textContent = 'Sign in to access your account';
            });
            
            // Form validation
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const forgotPasswordForm = document.getElementById('forgot-password-form');
            
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = document.getElementById('login-email').value;
                const password = document.getElementById('login-password').value;
                let isValid = true;
                
                // Email validation
                if (!validateEmail(email)) {
                    showError('login-email-error', 'Please enter a valid email address');
                    isValid = false;
                } else {
                    hideError('login-email-error');
                }
                
                // Password validation
                if (password.length < 8) {
                    showError('login-password-error', 'Password must be at least 8 characters');
                    isValid = false;
                } else {
                    hideError('login-password-error');
                }
                
                if (isValid) {
                    // Here you would typically send the data to your server
                    document.getElementById('login-success').style.display = 'block';
                    setTimeout(() => {
                        document.getElementById('login-success').style.display = 'none';
                    }, 3000);
                    loginForm.reset();
                }
            });
            
            registerForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const name = document.getElementById('register-name').value;
                const email = document.getElementById('register-email').value;
                const password = document.getElementById('register-password').value;
                const confirm = document.getElementById('register-confirm').value;
                const terms = document.getElementById('terms').checked;
                let isValid = true;
                
                // Name validation
                if (name.trim().length < 2) {
                    showError('register-name-error', 'Please enter your full name');
                    isValid = false;
                } else {
                    hideError('register-name-error');
                }
                
                // Email validation
                if (!validateEmail(email)) {
                    showError('register-email-error', 'Please enter a valid email address');
                    isValid = false;
                } else {
                    hideError('register-email-error');
                }
                
                // Password validation
                if (password.length < 8) {
                    showError('register-password-error', 'Password must be at least 8 characters');
                    isValid = false;
                } else if (!/\d/.test(password) || !/[a-zA-Z]/.test(password)) {
                    showError('register-password-error', 'Password must contain both letters and numbers');
                    isValid = false;
                } else {
                    hideError('register-password-error');
                }
                
                // Confirm password
                if (password !== confirm) {
                    showError('register-confirm-error', 'Passwords do not match');
                    isValid = false;
                } else {
                    hideError('register-confirm-error');
                }
                
                if (isValid) {
                    // Here you would typically send the data to your server
                    document.getElementById('register-success').style.display = 'block';
                    setTimeout(() => {
                        document.getElementById('register-success').style.display = 'none';
                        loginTab.click(); // Switch to login tab after successful registration
                    }, 3000);
                    registerForm.reset();
                }
            });
            
            forgotPasswordForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = document.getElementById('forgot-email').value;
                let isValid = true;
                
                // Email validation
                if (!validateEmail(email)) {
                    showError('forgot-email-error', 'Please enter a valid email address');
                    isValid = false;
                } else {
                    hideError('forgot-email-error');
                }
                
                if (isValid) {
                    // Here you would typically send the data to your server
                    document.getElementById('forgot-success').style.display = 'block';
                    setTimeout(() => {
                        document.getElementById('forgot-success').style.display = 'none';
                    }, 3000);
                    forgotPasswordForm.reset();
                }
            });
            
            // Helper functions
            function validateEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
            
            function showError(id, message) {
                const errorElement = document.getElementById(id);
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }
            
            function hideError(id) {
                document.getElementById(id).style.display = 'none';
            }
        });
    </script>
</body>
</html>
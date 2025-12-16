// script.js
document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault(); // Prevent form from submitting traditionally
    
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const messageDiv = document.getElementById('message');
    const loginContainer = document.getElementById('loginContainer');
    const loginBtn = document.getElementById('loginBtn');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    
    // Clear previous messages and animations
    messageDiv.innerHTML = '';
    messageDiv.className = '';
    loginContainer.classList.remove('shake', 'error-glow', 'success-glow', 'fade-out');
    usernameInput.classList.remove('input-error');
    passwordInput.classList.remove('input-error');
    
    // Basic validation
    if (!username || !password) {
        showMessage('Please fill in all fields', 'error');
        loginContainer.classList.add('shake', 'error-glow');
        if (!username) usernameInput.classList.add('input-error');
        if (!password) passwordInput.classList.add('input-error');
        return;
    }
    
    // Show loading state
    loginBtn.innerHTML = 'Logging in...';
    loginBtn.classList.add('loading');
    loginBtn.disabled = true;
    
    try {
        // Create FormData object
        const formData = new FormData();
        formData.append('username', username);
        formData.append('password', password);
        
        // Send data to PHP for validation
        const response = await fetch('validate.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.text();
        
        // Remove loading state
        loginBtn.innerHTML = 'Login';
        loginBtn.classList.remove('loading');
        loginBtn.disabled = false;
        
        if (data === 'success') {
            // Success animation and message
            showMessage('✅ Login successful! Redirecting...', 'success');
            loginContainer.classList.add('success-glow');
            
            // Add fade out effect
            setTimeout(() => {
                loginContainer.classList.add('fade-out');
            }, 1000);
            
            // Redirect to Directory.html after successful login
            setTimeout(() => {
                window.location.href = 'Home.html';
            }, 1500);
        } else {
            // Error animation and message
            showMessage('❌ Invalid username or password', 'error');
            loginContainer.classList.add('shake', 'error-glow');
            usernameInput.classList.add('input-error');
            passwordInput.classList.add('input-error');
            
            // Clear password field on error
            document.getElementById('password').value = '';
            
            // Focus back on username field
            setTimeout(() => {
               usernameInput.focus();
            }, 100);
        }
    } catch (error) {
        // Remove loading state on error
        loginBtn.innerHTML = 'Login';
        loginBtn.classList.remove('loading');
        loginBtn.disabled = false;
        
        console.error('Error:', error);
        showMessage('⚠️ An error occurred. Please try again.', 'error');
        loginContainer.classList.add('shake');
    }
});

function showMessage(message, type) {
    const messageDiv = document.getElementById('message');
    
    // Create message with icon based on type
    let icon = '';
    if (type === 'success') {
        icon = '✅';
        messageDiv.className = 'success-message';
    } else {
        icon = '❌';
        messageDiv.className = 'error-message';
    }
    
    // Animate message appearance
    messageDiv.style.opacity = '0';
    messageDiv.style.transform = 'translateY(-10px)';
    messageDiv.innerHTML = `${icon} ${message}`;
    
    // Trigger animation
    setTimeout(() => {
        messageDiv.style.transition = 'all 0.3s ease';
        messageDiv.style.opacity = '1';
        messageDiv.style.transform = 'translateY(0)';
    }, 10);
}

// Add visual feedback on input focus
document.querySelectorAll('input').forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
        this.parentElement.style.transition = 'transform 0.2s ease';
    });
    
    input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'scale(1)';
    });
    
    // Remove error state when user starts typing
    input.addEventListener('input', function() {
        this.classList.remove('input-error');
        const loginContainer = document.getElementById('loginContainer');
        loginContainer.classList.remove('shake');
    });
});

// Add keyboard shortcut (Ctrl+Enter to submit)
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 'Enter') {
        document.getElementById('loginForm').requestSubmit();
    }
});

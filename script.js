// script.js
document.addEventListener('DOMContentLoaded', function() {
  const passkeyInput = document.getElementById('passkeyInput');
  const passkeyBtn = document.getElementById('passkeyBtn');
  const myButton = document.getElementById('myButton');
  const captchaBox = document.getElementById('captchaBox');
  const statusMessage = document.getElementById('statusMessage');

  // Show status message
  function showMessage(text, isError = false) {
    statusMessage.textContent = text;
    statusMessage.className = `status-message ${isError ? 'error-msg' : 'success-msg'}`;
    statusMessage.innerHTML = `
      <i class="fas ${isError ? 'fa-times-circle' : 'fa-check-circle'}"></i>
      ${text}
    `;
    statusMessage.style.display = 'flex';
    
    setTimeout(() => {
      statusMessage.style.display = 'none';
    }, 3000);
  }

  // Add shake effect
  function addShake(element) {
    element.classList.remove('shake');
    void element.offsetWidth; // Trigger reflow
    element.classList.add('shake');
  }

  // Add glow effect
  function addGlow(element, isSuccess) {
    element.classList.remove('glow-success', 'glow-error');
    void element.offsetWidth; // Trigger reflow
    element.classList.add(isSuccess ? 'glow-success' : 'glow-error');
  }

  // Passkey authentication (server-side check)
  passkeyBtn.addEventListener('click', function() {
    const userInput = passkeyInput.value.trim();

    if (!userInput) {
      addShake(passkeyInput);
      showMessage("Please enter a passkey", true);
      addGlow(captchaBox, false);
      return;
    }

    // Send to PHP for validation
    fetch('checkpasskey.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'passkey=' + encodeURIComponent(userInput)
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        myButton.disabled = false;
        passkeyInput.value = '';
        showMessage(data.message);
        addGlow(captchaBox, true);

        myButton.innerHTML = `
          <i class="fas fa-check-circle"></i> 
          Access Secure Portal
          <i class="fas fa-arrow-right" style="margin-left: auto;"></i>
        `;
      } else {
        addShake(captchaBox);
        showMessage(data.message, true);
        addGlow(captchaBox, false);
        passkeyInput.value = '';
        passkeyInput.focus();
      }
    })
    .catch(err => {
      showMessage("Server error. Please try again later.", true);
      console.error(err);
    });
  });

  // Open Link button functionality
  myButton.addEventListener('click', function() {
    if (!myButton.disabled) {
      captchaBox.style.transform = 'scale(1.05)';
      setTimeout(() => {
        captchaBox.style.transform = '';
      }, 300);

      showMessage("Redirecting to secure portal...");

      setTimeout(() => {
        alert("Redirecting to secure portal... (This would open the actual link)");
        // In production: window.location.href = "your-secure-link.html";
      }, 1000);
    }
  });

  // Enter key support
  passkeyInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      passkeyBtn.click();
    }
  });

  // Hover effect
  captchaBox.addEventListener('mouseenter', function() {
    this.style.transform = 'translateY(-5px)';
  });

  captchaBox.addEventListener('mouseleave', function() {
    this.style.transform = '';
  });

  // Initial focus
  passkeyInput.focus();
});

// script.js

function checkPasskey() {
  const keyInput = document.getElementById("passkeyInput");
  const captchaBox = document.getElementById("captchaBox");
  const openButton = document.getElementById("myButton");
  const key = keyInput.value.trim();

  // Reset classes before each check
  captchaBox.classList.remove("glow-success", "glow-error", "shake");

  fetch("checkPasskey.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "passkey=" + encodeURIComponent(key)
  })
    .then(res => res.text())
    .then(data => {
      if (data === "success") {
        // Enable button + green glow
        openButton.disabled = false;
        captchaBox.classList.add("glow-success");

        // Add click handler to open Directory.html
        openButton.onclick = () => {
          window.location.href = "Directory.html";
        };
      } else {
        // Disable button + red glow + shake
        openButton.disabled = true;
        captchaBox.classList.add("glow-error", "shake");

        // Remove shake after animation
        setTimeout(() => captchaBox.classList.remove("shake"), 400);
      }
    })
    .catch(err => console.error("Error:", err));
}

// Attach event listeners after DOM loads
document.addEventListener("DOMContentLoaded", () => {
  // Passkey check button
  document.getElementById("passkeyBtn").addEventListener("click", checkPasskey);

  // Hover effects for Open Link button
  const btn = document.getElementById("myButton");
  btn.addEventListener("mouseover", () => {
    if (!btn.disabled) {
      btn.style.backgroundColor = "#4CAF50";
    }
  });
  btn.addEventListener("mouseout", () => {
    btn.style.backgroundColor = "";
  });
});

// Inside document.addEventListener("DOMContentLoaded", ...)
document.getElementById("passkeyInput").addEventListener("keypress", (e) => {
  if (e.key === "Enter") {
    checkPasskey();
  }
});

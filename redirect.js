// redirect.js
// Check session status
        fetch('check_session.php')
            .then(response => response.json())
            .then(data => {
                if (data.logged_in) {
                    document.getElementById('loginStatus').textContent = 'Logged In';
                    document.getElementById('username').textContent = data.username;
                    document.getElementById('sessionStatus').textContent = 'Active';
                } else {
                    // Redirect to login if not authenticated
                    window.location.href = 'index.html';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                window.location.href = 'index.html';
            });

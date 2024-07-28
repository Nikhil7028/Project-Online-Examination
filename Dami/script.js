document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var form = this;
    var formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'welcome.php';
        } else {
            document.getElementById('error-message').innerText = data.message;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

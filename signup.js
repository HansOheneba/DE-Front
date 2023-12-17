

function submitForm() {
    const name = document.getElementById('name').value;
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;


    if (!name || !username || !email || !password || !confirmPassword) {
        alert('Please fill in all fields.');
        return;
    }


    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return;
    }

    const formData = {
        name: name,
        username: username,
        email: email,
        password: password,
        confirmPassword: confirmPassword
    };

    fetch('http://localhost/DE-Back/v1/register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
    })
        .then(response => response.json())
        .then(data => {
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');
            const messageContainer = document.getElementById('messageContainer');

            if (data.data.token) {
                successMessage.textContent = 'Account created successfully!';
                successMessage.classList.remove('hidden');
                successMessage.classList.add('success');
                errorMessage.classList.add('hidden');
                messageContainer.classList.remove('hidden'); 

                let timer = setTimeout(() => {
                    clearTimeout(timer);
                    window.location.href = 'encrypt.php';
                }, 1000);
            } else {
                errorMessage.textContent = data.message || 'Registration failed.';
                errorMessage.classList.remove('hidden');
                errorMessage.classList.add('error');
                successMessage.classList.add('hidden');
                messageContainer.classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}



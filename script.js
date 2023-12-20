function submitForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!email || !password) {
        alert('Please fill in all fields.');
        return;
    }

    const formData = {
        email: email,
        password: password
    };

    fetch('http://localhost/DE-Back/v1/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
    })
        .then(response => response.json())
        .then(data => {
            if (data.data.token) {
                sessionStorage.setItem('authToken', data.data.token);

                fetch('http://localhost/DE-Back/v1/decode.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${data.data.token}`
                    },
                    body: JSON.stringify({ token: data.data.token }),
                })
                    .then(apiRes => apiRes.json())
                    .then(apiData => {
                        sessionStorage.setItem('userData', JSON.stringify(apiData));
                        window.location.href = apiData.redirect;
                    })
                    .catch(apiError => {
                        console.error('API Error:', apiError);
                    });

                console.log('Token saved in sessionStorage.');
            } else {
                alert(data.message || 'Login failed.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

document.addEventListener('DOMContentLoaded', function() {
    const userDataString = sessionStorage.getItem('userData');

    if (userDataString) {
        const userData = JSON.parse(userDataString);
        const userName = userData.name; 
        const userEmail = userData.email; 


        console.log('User Name:', userName);
        console.log('User Email:', userEmail);
     

        const usernameElement = document.getElementById('username');
        const emailElement = document.getElementById('userEmail');
        const currentUsernameInput = document.getElementById('currentUsername');
        const currentEmailInput = document.getElementById('currentEmail');

        if (usernameElement) {
         
            usernameElement.textContent = userName;
        }

        if (emailElement) {
           
            emailElement.textContent = userEmail;

        }
        if (currentUsernameInput) {
           
            currentUsernameInput.value = userName;
            currentUsernameInput.disabled = true;
        }

        if (currentEmailInput) {
            
            currentEmailInput.value = userEmail;
            currentEmailInput.disabled = true;
        }
    }
});
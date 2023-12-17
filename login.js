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
                console.log('API Response:', apiData);
                
               
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

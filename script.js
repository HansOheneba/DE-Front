function submitSignupForm() {

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
        password: password
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


function submitLoginForm() {
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

document.addEventListener('DOMContentLoaded', function () {
    const userDataString = sessionStorage.getItem('userData');

    if (userDataString) {
        const userData = JSON.parse(userDataString);
        const userName = userData.username;
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


function logout() {

    const authToken = sessionStorage.getItem('authToken');


    if (authToken) {

        fetch('http://localhost/DE-Back/v1/logout.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${authToken}`
            },
        })
        .then(response => response.json())
        .then(data => {

            sessionStorage.clear();

            window.location.href = 'login.php';
        })
        .catch(error => {
            console.error('Logout Error:', error);

            sessionStorage.clear();
            window.location.href = 'login.php';
        });
    } else {

        window.location.href = 'login.php';
    }
}
function deleteUser() {
    const userToken = sessionStorage.getItem('authToken');

    if (!userToken) {
        console.error('User token not available. Please log in.');
        return;
    }

    fetch('http://localhost/DE-Back/v1/delete.php', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${userToken}`,
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 200) {
                console.log(data.message);
                sessionStorage.clear();
                window.location.href = 'login.php';
            } else if (data.status === 401) {
                console.error(data.message);
            } else {
                console.error(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


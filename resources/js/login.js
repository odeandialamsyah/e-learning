document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('loginForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        const loginData = {
            email: formData.get('email'),
            password: formData.get('password'),
        };

        axios.post('/api/login', loginData)
            .then(response => {
                const token = response.data.access_token;
                // Simpan token di localStorage atau cookie
                localStorage.setItem('auth_token', token);
                // Set header Authorization untuk permintaan berikutnya
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
                // Redirect ke halaman home
                window.location.href = response.data.redirect_url;
            })
            .catch(error => {
                console.error('Error logging in:', error);
            });
    });
});

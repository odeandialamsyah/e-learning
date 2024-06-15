document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registerForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        const registerData = {
            name: formData.get('name'),
            email: formData.get('email'),
            password: formData.get('password'),
            password_confirmation: formData.get('password_confirmation'),
        };

        axios.post('/api/register', registerData)
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
                console.error('Error registering:', error);
            });
    });
});

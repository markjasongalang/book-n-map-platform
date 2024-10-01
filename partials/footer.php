        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Check if signed in
                fetch('./api/partials', {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    if (data.signed_in) {
                        document.querySelector('nav .menu ul .sign-in').style.display = "none";
                        document.querySelector('nav .menu ul .register').style.display = "none";
                    } else {
                        document.querySelector('nav .menu ul .profile').style.display = "none";
                    }
                })
                .catch(error => console.error('Error:', error));

                // Toggle profile dropdown
                const profile = document.querySelector('nav .menu ul .profile');
                profile.addEventListener('click', () => {
                    const profileDropdown = document.querySelector('nav .menu ul .profile-dropdown');
                    profileDropdown.classList.toggle('show');
                });
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('nav .menu ul .profile')) {
                        const profileDropdown = document.querySelector('nav .menu ul .profile-dropdown');
                        if (profileDropdown.classList.contains('show')) {
                            profileDropdown.classList.remove('show');
                        }
                    }
                });
            });

            // Handle logout
            document.querySelector('#logout-form').addEventListener('submit', (e) => {
                e.preventDefault();

                const formData = new FormData(e.target);
                formData.append(e.submitter.name, true);

                fetch("./api/partials", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.logout_success) {
                        window.location.href = data.url;
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        </script>
    </body>
</html>
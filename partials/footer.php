        <script>
            document.addEventListener('DOMContentLoaded', () => {
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
        </script>
    </body>
</html>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const profile = document.querySelector('nav .menu ul .profile');
                const profileDropdown = document.querySelector('nav .menu ul .profile-dropdown');
                profile.addEventListener('click', () => {
                    profileDropdown.classList.toggle('show');
                });
            });
        </script>
    </body>
</html>
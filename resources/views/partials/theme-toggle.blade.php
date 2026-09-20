<button onclick="toggleTheme()" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-lg">
    <span id="themeIcon">🌙</span>
</button>

<script>
    function toggleTheme() {
        const isDark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        document.getElementById('themeIcon').innerText = isDark ? '☀️' : '🌙';
    }
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('themeIcon').innerText = document.documentElement.classList.contains('dark') ? '☀️' : '🌙';
    });
</script>
import 'flowbite';
import './bootstrap';
import Chart from 'chart.js/auto';

// APLICAR EL TEMA ABANS DEL RENDER
const html = document.documentElement;
const storedTheme = localStorage.getItem('theme');
if (storedTheme === 'dark' || (!storedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    html.classList.add('dark');
} else {
    html.classList.remove('dark');
}

// INTERACCIÓ I EVENT LISTENERS
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggleDarkMode');

    console.log('Classes inicials del <html>:', html.classList.value);

    toggleBtn?.addEventListener('click', () => {
        html.classList.toggle('dark');
        const newTheme = html.classList.contains('dark') ? 'dark' : 'light';
        localStorage.setItem('theme', newTheme);
        console.log('🔁 Tema canviat a:', newTheme);
    });

    // Tancar notificacions automàticament
    const notification = document.getElementById('toastSuccess');
    if (notification) {
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 5000);
    }
});

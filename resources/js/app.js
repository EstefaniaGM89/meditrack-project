// APLICAR TEMA ABANS DEL RENDER (pre-render)
const html = document.documentElement;
const storedTheme = localStorage.getItem('theme');

if (storedTheme === 'dark' || (!storedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    html.classList.add('dark');
} else {
    html.classList.remove('dark');
}

// LLIBRERIES
import 'flowbite';
import './bootstrap';
import Chart from 'chart.js/auto';

// INTERACCIÓ DESPRÉS DE CÀRREGA
document.addEventListener('DOMContentLoaded', () => {
    const checkbox = document.getElementById("checkbox");

    // Iniciar estat del toggle
    if (checkbox) {
        checkbox.checked = html.classList.contains("dark");

        checkbox.addEventListener("change", () => {
            const isDark = checkbox.checked;
            html.classList.toggle("dark", isDark);
            localStorage.setItem("theme", isDark ? "dark" : "light");
        });
    }

    //   notificacions ( quan s'implemntin aquestes )
    const notification = document.getElementById('toastSuccess');
    if (notification) {
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 5000);
    }

    // Enviar formulari automàticament si s'esborra el filtre de cerca
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        const form = searchInput.closest('form');
        searchInput.addEventListener('input', () => {
            if (searchInput.value === '') {
                form.submit();
            }
        });
    }
});

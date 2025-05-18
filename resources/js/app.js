// Aplicar tema abans (per evitar flash de color)
const html = document.documentElement;
const isAuthPage = document.body.dataset.auth === "true";

// Aplica mode dinàmic (dark o light) si no estem a la pàgina d'autenticació
if (!isAuthPage) {
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme === 'dark' || (!storedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        html.classList.add('dark');
    } else {
        html.classList.remove('dark');
    }
}

// Llibreries
import 'flowbite';
import './bootstrap';
import Chart from 'chart.js/auto';

// Interacció després de carregar la pàgina
document.addEventListener('DOMContentLoaded', () => {
    
    const checkbox = document.getElementById("checkbox");

    // Pantalla de benvinguda
    const splash = document.getElementById('splash');
    if (splash) {
        setTimeout(() => {
            splash.classList.add('opacity-0');
            setTimeout(() => splash.remove(), 1000);
        }, 1000);
    }

    // Iniciar estat del toggle (només si hi ha toggle present i no estem a auth)
    if (checkbox && !isAuthPage) {
        checkbox.checked = html.classList.contains("dark");

        checkbox.addEventListener("change", () => {
            const isDark = checkbox.checked;
            html.classList.toggle("dark", isDark);
            localStorage.setItem("theme", isDark ? "dark" : "light");
        });
    }

    // Notificacions (quan s'implementin aquestes)
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

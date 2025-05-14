// ✅ APLICAR TEMA ANTES DEL RENDER (pre-render)
const html = document.documentElement;
const storedTheme = localStorage.getItem('theme');

if (storedTheme === 'dark' || (!storedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    html.classList.add('dark');
} else {
    html.classList.remove('dark');
}

// ✅ LLIBRERIES
import 'flowbite';
import './bootstrap';
import Chart from 'chart.js/auto';

// ✅ INTERACCIÓ DESPRÉS DE CÀRREGA
document.addEventListener('DOMContentLoaded', () => {
    const checkbox = document.getElementById("checkbox");

    // Iniciar l'estat del toggle
    if (checkbox) {
        if (html.classList.contains("dark")) {
            checkbox.checked = true;
        } else {
            checkbox.checked = false;
        }

        checkbox.addEventListener("change", () => {
            const isDark = checkbox.checked;
            if (isDark) {
                html.classList.add("dark");
                localStorage.setItem("theme", "dark");
            } else {
                html.classList.remove("dark");
                localStorage.setItem("theme", "light");
            }
        });
    }

    // ✅ Tancar notificacions
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

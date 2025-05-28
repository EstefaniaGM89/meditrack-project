// Llibreries
import 'flowbite';
import './bootstrap';

// Aplicar tema abans (per evitar flash de color)
const html = document.documentElement;
const isAuthPage = document.body.dataset.auth === "true";

// Aplica mode dinàmic (dark o light) si no estem a auth
if (!isAuthPage) {
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme === 'dark' || (!storedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        html.classList.add('dark');
    } else {
        html.classList.remove('dark');
    }
}

// Interacció amb el DOM
// El document ha de ser carregat abans d'executar el codi
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

    // Iniciar estat del toggle (si hi ha i no estem a auth)
    if (checkbox && !isAuthPage) {
        checkbox.checked = html.classList.contains("dark");

        checkbox.addEventListener("change", () => {
            const isDark = checkbox.checked;
            html.classList.toggle("dark", isDark);
            localStorage.setItem("theme", isDark ? "dark" : "light");
        });
    }

    // Tancar notificació d'èxit automàticament
    const notification = document.getElementById('toastSuccess');
    if (notification) {
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 500);
        }, 5000);
    }

    // Tancar errors de validació automàticament
    const errorAlert = document.getElementById('alertaErrors');
    if (errorAlert) {
        setTimeout(() => {
            errorAlert.style.opacity = '0';
            setTimeout(() => errorAlert.remove(), 500);
        }, 5000);
    }

    // Enviar formulari si s'esborra la cerca
    document.querySelector('input[name="search"]')?.addEventListener('input', function () {
        if (this.value === '') {
            this.form?.submit();
        }
    });

        // Tancar alerta d'errors fent clic
    const btnTancar = document.getElementById('btnTancarAlerta');
    const alerta = document.getElementById('alertaErrors');
    if (btnTancar && alerta) {
        btnTancar.addEventListener('click', () => {
            alerta.remove();
        });
    }

});

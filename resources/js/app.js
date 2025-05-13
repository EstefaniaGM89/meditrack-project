import 'flowbite';
import Chart from 'chart.js/auto'; // Si fas servir gràfics

document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggleDarkMode');
    const html = document.documentElement;

    // DEBUG: mostra classes inicials
    console.log('Classes inicials del <html>:', html.classList.value);

    // Aplica tema guardat
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme === 'dark') {
        html.classList.add('dark');
        console.log(' Tema carregat: dark');
    } else {
        html.classList.remove('dark');
        console.log(' Tema carregat: light');
    }

    //  Toggle al clicar el botó
    toggleBtn?.addEventListener('click', () => {
        html.classList.toggle('dark');
        const newTheme = html.classList.contains('dark') ? 'dark' : 'light';
        localStorage.setItem('theme', newTheme);
        console.log('🔁 Tema canviat a:', newTheme);
    });

    //  Tancar notificacions automàticament
    const notification = document.getElementById('notification');
    if (notification) {
        setTimeout(() => {
            notification.style.opacity = 0;
            setTimeout(() => {
                notification.style.display = 'none';
            }, 1000);
        }, 5000);
    }

    //  Fade a notificacions blaves (opcionals)
    const blueNotifications = document.querySelectorAll('.bg-blue-500');
    blueNotifications.forEach(notification => {
        setTimeout(() => {
            notification.classList.add('opacity-0', 'transition-opacity');
        }, 5000);
    });

    //  Gràfic de dashboard
    const chartCanvas = document.getElementById('dashboardChart');
    if (chartCanvas) {
        new Chart(chartCanvas, {
            type: 'bar',
            data: {
                labels: ['Pacients', 'Medicaments', 'Recordatoris'],
                datasets: [{
                    label: 'Totals',
                    data: [
                        parseInt(chartCanvas.dataset.pacientsCount || 0),
                        parseInt(chartCanvas.dataset.medicamentsCount || 0),
                        parseInt(chartCanvas.dataset.recordatorisCount || 0),
                    ],
                    backgroundColor: ['#6366F1', '#EC4899', '#F59E0B'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }
});

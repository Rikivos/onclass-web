import "./bootstrap";
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";

// Script to Handle Dropdown From Navbar
document.addEventListener('DOMContentLoaded', () => {
    const profileButton = document.querySelector('.profile-button');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    profileButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
});


// Script to Handle Calendar From dashboard
document.addEventListener("DOMContentLoaded", function () {
    // Mini Calendar
    const miniCalendarEl = document.getElementById("mini-calendar");
    const miniCalendar = new FullCalendar.Calendar(miniCalendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: false, 
        fixedWeekCount: false,
        dayMaxEvents: false,   
        height: 'auto',     
        events: [
            { title: 'Daily Standup', start: '2024-01-02' },
        ],
    });
    miniCalendar.render();

    // Kalender Utama
    const mainCalendarEl = document.getElementById("main-calendar");
    const mainCalendar = new FullCalendar.Calendar(mainCalendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
            { title: 'Daily Standup', start: '2024-01-02T08:00:00' },
            { title: 'Budget Review', start: '2024-01-04T09:00:00' },
            { title: 'Sasha Jay 121', start: '2024-01-05T10:00:00' },
            { title: 'Web Team Progress', start: '2024-01-11T11:00:00' },
            { title: 'Social team briefing', start: '2024-01-12T12:00:00' },
        ],
    });
    mainCalendar.render();
});

// Script to Handle Modal From logbook
const openModal = document.getElementById("openModal");
const closeModal = document.getElementById("closeModal");
const modal = document.getElementById("modal");

// Open modal when button is clicked
openModal.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

// Close modal when "Batal" is clicked
closeModal.addEventListener("click", () => {
    modal.classList.add("hidden");
});

// Optional: Close modal when clicking outside it
window.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.classList.add("hidden");
    }
});



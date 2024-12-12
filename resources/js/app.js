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
    const calendarEl = document.getElementById("calendar");

    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin],
            initialView: "dayGridMonth",
        });

        calendar.render();
    }
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



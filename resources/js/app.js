import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        initialView: 'dayGridMonth',
        locale: 'pt-br',
        navLinks: true,
        selectable: true,
        selectMirror: true,
        editable: true,
        initialDate: '2024-05-02',
        slotMinTime: '08:00:00',
        slotMaxTime: '21:00:00',
        dateClick: function(info) {
            alert('Date: ' + info.dateStr);
            console.log(info);
        },
        eventClick: function(info){
            console.log(info);
        },
        eventDrop: function(info){
            console.log(info);
        },
        events: [
        {
            title: 'Meeting',
            start: '2024-05-12T10:30:00',
            end: '2024-05-12T12:30:00'
        },
        {
            title: 'Lunch',
            start: '2024-05-12T12:00:00'
        },
        {
            title: 'Meeting',
            start: '2024-05-12T14:30:00'
        },
        {
            title: 'Birthday Party',
            start: '2024-05-13T07:00:00'
        },
        {
            title: 'Click for Google',
            url: 'https://google.com/',
            start: '2024-05-28'
        }
        ]
    });
    

    calendar.render();
    }); 

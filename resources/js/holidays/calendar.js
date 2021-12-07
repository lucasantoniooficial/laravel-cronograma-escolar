const axios = require('axios');

document.addEventListener('DOMContentLoaded', async  function() {
    const year = window.location.pathname.split('/admin/holidays/')[1];
    const events = (await axios.get(`/api/events/year/${year}`)).data;
    const container = document.getElementById('container-calendar');
    events.forEach((events, k) => {
        var containerCol = document.createElement('div');
        containerCol.setAttribute('class', 'col-6')
        var containerCalendar = document.createElement('div');
        containerCalendar.setAttribute('id',`calendar-${k}`)
        containerCol.appendChild(containerCalendar);
        container.appendChild(containerCol);

        let calendar = new FullCalendar.Calendar(document.getElementById(`calendar-${k}`), {
            initialView: 'dayGridMonth',
            locale: 'pt-br',
            themeSystem: 'bootstrap',
            headerToolbar: {
                start: 'title',
                center: '',
                end: '',
            },
            contentHeight: 520,
            initialDate: events[0].start,
            events: events
        });

        calendar.render();
    })
});



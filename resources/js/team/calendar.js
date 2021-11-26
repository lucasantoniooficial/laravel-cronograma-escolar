const axios = require('axios');

document.addEventListener('DOMContentLoaded', async  function() {
    const id = window.location.pathname.split('/admin/teams/')[1];


    const events = (await axios.get(`/api/events/${id}`)).data;
    console.log(events);
    const container = document.getElementById('container-calendar');
    events.forEach((item, key) => {
        var containerCol = document.createElement('div');
        containerCol.setAttribute('class', 'col-6')
        var containerCalendar = document.createElement('div');
        containerCalendar.setAttribute('id',`calendar-${key}`)
        containerCol.appendChild(containerCalendar);
        container.appendChild(containerCol);
        console.log(item)
        let calendar = new FullCalendar.Calendar(document.getElementById(`calendar-${key}`), {
            initialView: 'dayGridMonth',
            locale: 'pt-br',
            themeSystem: 'bootstrap',
            headerToolbar: {
                start: 'title',
                center: '',
                end: '',
            },
            initialDate: item[0].start,
            events: item
        });

        calendar.render();
    })
});



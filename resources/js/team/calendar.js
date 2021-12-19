const axios = require('axios');

document.addEventListener('DOMContentLoaded', async  function() {
    const id = window.location.pathname.split('/admin/teams/')[1] ?? window.location.pathname.split('/teams/')[1];
    const years = (await axios.get(`/api/events/${id}`)).data;
    const container = document.getElementById('container-calendar');
    years.forEach((months, k) => {
        months.forEach((days, key) => {
            var containerCol = document.createElement('div');
            containerCol.setAttribute('class', 'col-6')
            var containerCalendar = document.createElement('div');
            containerCalendar.setAttribute('id',`calendar-${k}-${key}`)
            container.appendChild(containerCol);
            containerCol.appendChild(containerCalendar);
            let calendar = new FullCalendar.Calendar(document.getElementById(`calendar-${k}-${key}`), {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                themeSystem: 'bootstrap',
                headerToolbar: {
                    start: 'title',
                    center: '',
                    end: '',
                },
                contentHeight: 520,
                initialDate: days[0].start,
                events: days
            });

            calendar.render();
        })
    })
});



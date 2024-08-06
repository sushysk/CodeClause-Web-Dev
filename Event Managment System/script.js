document.getElementById('event-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const eventName = document.getElementById('event-name').value;
    const eventDate = document.getElementById('event-date').value;
    const eventDescription = document.getElementById('event-description').value;

    const eventItem = document.createElement('li');
    eventItem.innerHTML = `<h3>${eventName}</h3>
                           <p><strong>Date:</strong> ${eventDate}</p>
                           <p>${eventDescription}</p>`;
    document.getElementById('events').appendChild(eventItem);

    document.getElementById('event-form').reset();
});

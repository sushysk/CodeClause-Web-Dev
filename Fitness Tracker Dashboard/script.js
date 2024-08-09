// Activity Log functionality
document.getElementById('activity-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const activityName = document.getElementById('activity-name').value;
    const activityDuration = document.getElementById('activity-duration').value;

    const activityList = document.getElementById('activity-list');
    const newActivity = document.createElement('li');
    newActivity.textContent = `${activityName} - ${activityDuration} mins`;

    activityList.appendChild(newActivity);

    // Update Progress Chart (add logic here for real data)
    updateProgressChart(activityDuration);

    // Clear form fields
    document.getElementById('activity-name').value = '';
    document.getElementById('activity-duration').value = '';
});

// Progress Chart functionality (Mockup)
const canvas = document.getElementById('progressCanvas');
const ctx = canvas.getContext('2d');

function updateProgressChart(duration) {
    // This function will update the progress chart with new data.
    // Here is a mockup to simulate the chart update:
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw a colorful bar for demonstration
    ctx.fillStyle = '#34e89e';
    ctx.fillRect(50, canvas.height - duration * 2, 100, duration * 2);

    ctx.fillStyle = '#0f3443';
    ctx.fillText(`${duration} mins`, 65, canvas.height - duration * 2 - 10);
}

// Initial dummy chart
updateProgressChart(0);

document.getElementById('activity-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const stepsInput = document.getElementById('steps-input').value;
    const caloriesInput = document.getElementById('calories-input').value;
    const distanceInput = document.getElementById('distance-input').value;

    document.getElementById('steps').textContent = stepsInput;
    document.getElementById('calories').textContent = caloriesInput;
    document.getElementById('distance').textContent = `${distanceInput} km`;

    document.getElementById('activity-form').reset();
});

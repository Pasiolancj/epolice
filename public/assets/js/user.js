document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById('defaultModalButton').click();
});
const modalButton = document.getElementById('editModalButton');
const modal = document.getElementById('editModal');

modalButton.addEventListener('click', function () {
    modal.style.display = 'block';
});

window.addEventListener('click', function (event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});

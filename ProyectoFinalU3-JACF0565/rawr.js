document.addEventListener('DOMContentLoaded', (event) => {
    const userLabel = document.getElementById('user-label');
    const popup = document.getElementById('popup3');
    const closePopup = document.getElementById('close-popup3');

    if (userLabel) {
        userLabel.addEventListener('click', () => {
            popup.style.display = 'block';
        });
    }

    if (closePopup) {
        closePopup.addEventListener('click', () => {
            popup.style.display = 'none';
        });
    }

    window.addEventListener('click', (event) => {
        if (event.target == popup) {
            popup.style.display = 'none';
    }
    });
});
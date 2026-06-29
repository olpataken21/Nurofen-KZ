document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('popup-inform');
    const agreeBtn = popup?.querySelector('.agree');
    const noAgreeBtn = popup?.querySelector('.no-agree');

    if (!popup) return;

    const COOKIE_NAME = 'nurofen_medical_confirmed';
    const COOKIE_DAYS = 30;
    const REDIRECT_URL = 'https://www.gaviscon.ru/';

    function getCookie(name) {
        const prefix = name + '=';
        const cookies = document.cookie.split(';');

        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            if (cookie.indexOf(prefix) === 0) {
                return decodeURIComponent(cookie.substring(prefix.length));
            }
        }

        return null;
    }

    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        document.cookie = name + '=' + encodeURIComponent(value)
            + ';expires=' + date.toUTCString()
            + ';path=/'
            + ';SameSite=Lax';
    }

    if (getCookie(COOKIE_NAME) === 'true') {
        popup.style.display = 'none';
        return;
    }

    popup.style.display = 'flex';

    if (agreeBtn) {
        agreeBtn.addEventListener('click', function () {
            setCookie(COOKIE_NAME, 'true', COOKIE_DAYS);
            popup.style.display = 'none';
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    Fancybox.bind("[data-fancybox]", {
        dragToClose: false,
        placeFocusBack: false,
        closeButton: false,
    });
});

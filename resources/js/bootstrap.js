window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import flatpickr from "flatpickr";
import monthSelectPlugin from "flatpickr/dist/plugins/monthSelect/index"
import styles from "flatpickr/dist/plugins/monthSelect/style.css"
import { Spanish } from "flatpickr/dist/l10n/es.js"

window.flatpickr = flatpickr;
window.flatpickr_spanish = Spanish;

flatpickr('.flatpickr-datetime', {
    enableTime: true,
    locale: Spanish,
    minDate: new Date(),
    maxDate: new Date(new Date().setFullYear(new Date().getFullYear() + 1))
})

flatpickr('.flatpickr', {
    locale: Spanish
})

flatpickr('.flatpickr-birth', {
    locale: Spanish,
    minDate: new Date(new Date().setFullYear(new Date().getFullYear() - 85)),
    maxDate: new Date(new Date().setFullYear(new Date().getFullYear() - 18))
})

flatpickr('.flatpickr-birth-children', {
    locale: Spanish,
    minDate: new Date(new Date().setFullYear(new Date().getFullYear() - 18)),
    maxDate: new Date(new Date().setFullYear(new Date().getFullYear()))
})

flatpickr(".flatpickr-month-select", {
    "locale": Spanish,
    "altInput": true,
    "minDate": new Date(),
    "plugins": [
        new monthSelectPlugin({
          shorthand: true, //defaults to false
          altFormat: "F Y", //defaults to "F Y"
          dateFormat: "Y-m-01", //defaults to "F Y"
          theme: "light" // defaults to "light"
        })
    ]

  });

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

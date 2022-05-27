require('./bootstrap');

import Alpine from 'alpinejs';

import swal from 'sweetalert2';
window.Swal = swal;

window.Alpine = Alpine;

Alpine.start();
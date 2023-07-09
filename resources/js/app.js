import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

import { Spanish } from "flatpickr/dist/l10n/es.js"
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.css';

flatpickr("#datepicker", {
    dateFormat: "d-m-Y",
    "locale": Spanish
});
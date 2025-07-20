import './bootstrap';
import Alpine from 'alpinejs';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    // Register directive untuk x-flatpickr
    Alpine.directive('flatpickr', (el, { expression }, { evaluate }) => {
        flatpickr(el, evaluate(expression));
    });
});

// Start Alpine setelah directives terdaftar
Alpine.start();

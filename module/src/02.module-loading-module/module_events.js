// Modul declarat inline
import { _inc, _dec } from './module_operations.js';

console.log('module events.js executed');

const input = document.getElementById('val');

document.getElementById('plus').addEventListener('click', function (event) {
    input.value = _inc(input.value);
});

document.getElementById('minus').addEventListener('click', function (event) {
    input.value = _dec(input.value);
});

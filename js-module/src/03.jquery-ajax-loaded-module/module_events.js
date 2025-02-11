// Modul declarat inline
import { _inc, _dec } from './module_operations.js';

console.log('module module_events.js executed');

function registerEvents()
{
    const input = document.getElementById('val');

    document.getElementById('plus').addEventListener('click', function (event) {
        input.value = _inc(input.value);
    });

    document.getElementById('minus').addEventListener('click', function (event) {
        input.value = _dec(input.value);
    });

    console.log('"registerEvents" from module_events.js is executed');
}

export { registerEvents }

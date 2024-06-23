function _inc(value)
{
    return parseInt(value) + 1;
}

function _dec(value)
{
    return parseInt(value) - 1;
}

console.log('module operations.js loaded');

export { _inc, _dec }

console.log('module operations.js executed');

function _inc(value)
{
    return parseInt(value) + 1;
}

function _dec(value)
{
    return parseInt(value) - 1;
}

export { _inc, _dec }

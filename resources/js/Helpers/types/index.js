export const isFilled = (itemValue) => {
    if (itemValue === undefined || itemValue === null || isNaN(itemValue)) {
        return false;
    }

    return true;
}

export const toBool = (value) => {
    if (isNumeric(value)) {
        return Boolean(Number(value));
    }

    if (!value) {
        return Boolean(value);
    }

    let type = typeof value;

    type = `${type}`.toLowerCase();

    if (type === 'boolean') {
        return value;
    }

    if (type === 'object') {
        return Boolean(value && Object.keys(value)?.length);
    }

    let values = {
        'undefined': false,
        'null': false,
        'no': false,
        'nao': false,
        'false': false,
        'f': false,
        'off': false,
        'não': false,
        'n': false,
        '0': false,
        0: false,

        'yes': true,
        'y': true,
        'sim': true,
        'true': true,
        't': true,
        'on': true,
        's': true,
        '1': true,
        1: true,
    };

    if (type in values || value in values) {
        return Boolean(values[type] ?? values[value] ?? null);
    }

    return Boolean(value);
}

export const toBoolean = (value) => {
    return Boolean(toBool(value));
}

export const booleanToString = (value, yesLabel = 'yes', noLabel = 'no') => {
    value = toBoolean(value);
    yesLabel = ifStringOr(yesLabel, 'yes');
    noLabel = ifStringOr(noLabel, 'no');

    return value ? yesLabel : noLabel;
}

export const isArray = (value) => {
    return value && Array.isArray(value);
}

export const isObject = (value) => {
    return value && typeof value === 'object' && !Array.isArray(value);
}

export const isFunction = (value) => {
    return typeof value === 'function';
}

export const isString = (value) => {
    return typeof value === 'string';
}

export const isNumber = (value) => {
    return typeof value === 'number';
}

export const isValidNumber = (value) => {
    return typeof value === 'number' && !isNaN(value);
}

export const isNumeric = (value) => {
    return isValidNumber(Number(value));
}

export const ifArrayOr = (value, defaultValue = null) => {
    return isArray(value) ? value : defaultValue;
}

export const ifObjectOr = (value, defaultValue = null) => {
    return isObject(value) ? value : defaultValue;
}

export const ifStringOr = (value, defaultValue = null) => {
    return isString(value) ? value : defaultValue;
}

export const ifNumberOr = (value, defaultValue = null) => {
    return isNumber(value) ? value : defaultValue;
}

export const ifValidNumberOr = (value, defaultValue = null) => {
    return isValidNumber(value) ? value : defaultValue;
}

export const ifNumericOr = (value, defaultValue = null) => {
    return isNumeric(value) ? Number(value) : defaultValue;
}

export const count = (value) => {
    if ([undefined, null, '', 0, false].includes(value)) {
        return 0;
    }

    let valueType = typeof value;

    if (valueType === 'string' || Array.isArray(value)) {
        return value.length;
    }

    if (valueType === 'object') {
        return Object.keys(value || {}).length;
    }

    return `${value}`.length;
}

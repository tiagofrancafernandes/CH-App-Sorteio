export {
    currencyFormat,
} from './formaters.ts'

export const generateRandomString = (length = 5, ofThisChars = null) => {
    const characters = ofThisChars ?? 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let result = '';
    for (let i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result;
}

export const limit = (text, max = -1, after = '...', strictSize = true) => {
    if (typeof text !== 'string') {
        return '';
    }

    max = !isNaN(parseInt(max)) && max >= 0  ? parseInt(max) : -1;

    if (max === -1 || max >= text.length) {
        return text;
    }

    after = after && typeof after === 'string' ? after : '';

    if (strictSize && after.length > max) {
        return `${after}`.slice(0, max);
    }

    return strictSize ? `${text}`.slice(0, max - after.length) + after : text.slice(0, max) + after;
}

export const trimSlashes = (str = '') => {
    if (!str || typeof str !== 'string') {
        return '';
    }

    return str.replace(/^\/+|\/+$/g, '');
};

import {
    generateRandomString,
    limit,
    trimSlashes,
} from '@/Helpers/string/index';

export {
    generateRandomString,
    limit,
    trimSlashes,
}

export const toTitle = (text) => {
    if (!text || typeof text !== 'string') {
      return '';
    }

    text = validChars(text, new RegExp('[a-zA-Z0-9\-\ ]+'));

    text = text.replaceAll(/  /gi, '');
    for (let char of ['-', '.', '_', ',', '"', '  ']) {
        char = (char === '.') ? '\\' + char : char;
        char = (char.trim() === '') ? ' ' : char;
        text = text.replaceAll(new RegExp(`${char}`, 'ig'), ' ').trim();
    }

    text = text.replaceAll(/  /gi, ' ');

    // Divide a string em words
    let words = text.toLowerCase().split(' ');

    // Converte a primeira letra de cada palavra em maiúscula
    let regex = new RegExp('[a-zA-Z0-9\ ]+');
    for (let i = 0; i < words.length; i++) {
        let word = words[i];
        let wordFirstLetter = word.charAt(0);
        wordFirstLetter = regex.test(wordFirstLetter) ? wordFirstLetter : '';

        words[i] = (regex.test(wordFirstLetter) ? wordFirstLetter.toUpperCase() : '') + word.slice(1);
    }

    // Junta as words em uma única string

    return words.join(' ');
}

export const validChars = (text, regex = null) => {
    if (!text || typeof text !== 'string') {
        return '';
    }

    regex = regex || new RegExp('[a-zA-Z0-9\ ]+');

    return text.split('')
        .map(char => regex.test(char) ? char : ' ')
        .filter(char => regex.test(char))
        .join('')
        .split('   ')
        .map(char => char.trim())
        .join(' ')
        .split('  ')
        .join(' ')
        .trim();
}

export const asCurrency = (currency, locale, options = {}) => {
    locale = locale && typeof locale === 'string' ? locale : 'en-US';

    options = options && typeof options === 'object' && !Array.isArray(options) ? options : {};

    try {
        return new Intl.NumberFormat(locale, {
            style: 'currency',
            currency,
            ...options,
        });
    } catch (error) {
        console.error(error);

        return null;
    }
}

export const currencyFormat = (value, currency, locale, options = {}) => {
    value = !isNaN(value - 0) ? value - 0 : 0;
    return asCurrency(currency, locale, options).format(value);
}

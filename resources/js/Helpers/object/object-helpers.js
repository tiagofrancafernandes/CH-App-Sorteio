import { get } from 'lodash';

const validKey = (key) => {
    key = typeof key === 'string' || Array.isArray(key) ? key : null

    if (key === null) {
        return null;
    }

    return Array.isArray(key) ? key.join('.') : key;
}

export const dataGet = (data, key, defaultValue = null) => {
    data = typeof data === 'object' ? data : {};
    key = validKey(key);

    if (key === null) {
        return null;
    }

    return get(data, key, defaultValue);
}

/**
 * whereCompare(123, '=','123') // true
 * whereCompare(123, '==','123') // true
 * whereCompare(123, '===','123') // false
 * whereCompare(123, '123') // true
 * whereCompare(123, (val) => val == '123') // true
 * whereCompare(123, (val) => val === '123') // false
*/
export const whereCompare = (value, valueOrOperator, valueToCompare = '_NO_VALUE_') => {
    if (value === '_NO_VALUE_') {
        return false;
    }

    if (valueToCompare === '_NO_VALUE_' && typeof valueOrOperator === 'function') {
        valueToCompare = valueOrOperator;
        valueOrOperator = 'function';
    }

    if (valueToCompare === '_NO_VALUE_') {
        valueToCompare = valueOrOperator;
        valueOrOperator = '=';
    }

    valueOrOperator = typeof valueOrOperator === 'string' ? valueOrOperator.trim().toLowerCase() : null;

    if (![
        '=', '==', '===',
        '!=', '!==', '<>', 'not',
        '>', '<', '<=', '>=',
        'like', 'ilike',
        'function',
    ].includes(valueOrOperator)) {
        return false;
    }

    let compareResult = false;

    if (['function',].includes(valueOrOperator)) {
        try {
            valueToCompare = typeof valueToCompare === 'function' ? valueToCompare : () => false;
            return valueToCompare(value) ? true : false;
        } catch (error) {
            return false;
        }
    }

    if (['!=', '!==', '<>', 'not',].includes(valueOrOperator)) {
        compareResult = (valueOrOperator == '!==') ? (value !== valueToCompare) : (value != valueToCompare);
        return compareResult ? true : false;
    }

    if (['=', '==', '===',].includes(valueOrOperator)) {
        compareResult = (valueOrOperator == '===') ? (value === valueToCompare) : (value == valueToCompare);
        return compareResult ? true : false;
    }

    if (valueOrOperator === 'like') {
        compareResult = ((Array.isArray(value) || typeof value === 'string') ? value : []).includes(valueToCompare);
        return compareResult ? true : false;
    }

    if (valueOrOperator === 'ilike') {
        value = (Array.isArray(value) || typeof value === 'string') ? value : [];
        compareResult = (typeof value === 'string' ? `${value}`.toLowerCase() : value).includes(
            `${valueToCompare}`.toLowerCase()
        );

        return compareResult ? true : false;
    }

    switch (valueOrOperator) {
        case '>':
            return valueToCompare > value;
        case '<':
            return valueToCompare < value;
        case '<=':
            return valueToCompare <= value;
        case '>=':
            return valueToCompare >= value;
    }

    return false;
}

/**
 * getWhere({a: 123}, 'a', '=','123') // 123
 * getWhere({a: 123}, 'a', '==','123') // 123
 * getWhere({a: 123}, 'a', '===','123') // null
 * getWhere({a: 123}, 'a', '123') // 123
 * getWhere({a: 123}, 'a', (val) => val == '123') // 123
 * getWhere({a: 123}, 'a', (val) => val === '123') // null
*/
export const getWhere = (data, key, valueOrOperator, valueToCompare = '_NO_VALUE_') => {
    data = typeof data === 'object' ? data : {};
    key = validKey(key);

    if (key === null) {
        return null;
    }

    let value = get(data, key, '_NO_VALUE_');

    if (value === '_NO_VALUE_') {
        return null;
    }

    return whereCompare(value, valueOrOperator, valueToCompare) ? value : null;
}

/**
 * filterWhere([...], 'price', 25)
 * filterWhere([...], 'price', '!=', 25)
 * filterWhere([...], 'price', '===', 25)
 * filterWhere([...], 'price', (val) => val != '123')
 * filterWhere([...], 'price', (val) => val !== '123')
 * filterWhere([...], 'price', (val) => val === '123')
 */
export const filterWhere = (data, key, valueOrOperator, valueToCompare = '_NO_VALUE_') => {
    if (typeof data !== 'object') {
        return null
    }

    key = validKey(key);

    if (key === null) {
        return null;
    }

    data = Array.isArray(data) ? data : [data];

    return data.filter(
        item => {
            item = typeof item === 'object' ? item : {};

            return whereCompare(
                get(item, key),
                valueOrOperator,
                valueToCompare,
            )
        }
    ) || [];
}

/**
 * findWhere([...], 'price', 25)
 * findWhere([...], 'price', '!=', 25)
 * findWhere([...], 'price', '===', 25)
 * findWhere([...], 'price', (val) => val != '123')
 * findWhere([...], 'price', (val) => val !== '123')
 * findWhere([...], 'price', (val) => val === '123')
 * findWhere(props?.ticketGroupList?.all, 'buildQuery', '==', selectedTicketBuildQuery),
 * findWhere(props?.ticketGroupList?.all, 'buildQuery', 'function', (value) => value == selectedTicketBuildQuery),
 */
export const findWhere = (data, key, valueOrOperator, valueToCompare = '_NO_VALUE_') => {
    if (typeof data !== 'object') {
        return null
    }

    key = validKey(key);

    if (key === null) {
        return null;
    }

    data = Array.isArray(data) ? data : [data];

    return data.find(
        item => {
            item = typeof item === 'object' ? item : {};

            return whereCompare(
                get(item, key),
                valueOrOperator,
                valueToCompare,
            );
        }
    );
}

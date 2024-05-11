export const currencyFormat = (value: any, currency: string, locale ?: string): null|string => {
    value = parseFloat(value);

    if (isNaN(value)) {
        return null
    }
    locale = locale  || 'en';

    let formater = new Intl.NumberFormat(
        locale,
        {
            style: 'currency',
            currency,
        }
    );

    return formater.format(value);
}

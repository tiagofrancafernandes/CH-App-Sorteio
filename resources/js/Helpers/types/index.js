export const isFilled = (itemValue) => {
    if (itemValue === undefined || itemValue === null || isNaN(itemValue)) {
        return false;
    }

    return true;
}

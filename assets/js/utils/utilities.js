function getMonthName(monthNumber, locales = 'en-US') {
    const date = new Date();
    date.setMonth(monthNumber - 1);

    return date.toLocaleDateString(locales, {
        month: 'short',
        timeZone: 'UTC'
    });
}
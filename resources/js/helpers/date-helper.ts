export function getCurrentDate(nextDay: boolean = false) {
    const tomorrow = new Date();
    tomorrow.setDate(new Date().getDate() + 1);

    const date = nextDay ? tomorrow : new Date();

    return date.getFullYear() + '-' + getMonthWithLeadingZero(date) + '-' + getDayWithLeadingZero(date);
}

export function getFormattedDate(date: any) {
    const formattedDate = new Date(date);

    return formattedDate.getFullYear() + '-' + getMonthWithLeadingZero(formattedDate) + '-' + getDayWithLeadingZero(formattedDate);
}

function getMonthWithLeadingZero(date: Date) {
    return (date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1);
}

function getDayWithLeadingZero(date: Date) {
    return (date.getDate() < 10 ? '0' + (date.getDate() + 1) : date.getDate());
}

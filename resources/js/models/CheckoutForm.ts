export class CheckoutForm {
    private email: string;
    private name: string;
    private dateOfBirth: string;
    private country: string;
    private zipCode: string;
    private address: string;
    private phone: string;
    private info: string;
    private paymentMethod: string;

    constructor(
        email: string = '',
        name: string = '',
        dateOfBirth: string = '',
        country: string = '',
        zipCode: string = '',
        address: string = '',
        phone: string = '',
        info: string = '',
        paymentMethod: string = '',

    ) {
        this.email = email;
        this.name = name;
        this.dateOfBirth = dateOfBirth;
        this.country = country;
        this.zipCode = zipCode;
        this.address = address;
        this.phone = phone;
        this.info = info;
        this.paymentMethod = paymentMethod;
    }
}

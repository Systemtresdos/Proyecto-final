export function sumaComponent() {
    return {
        num1: 0,
        num2: 0,
        num3: 0,
        get suma() {
            return Number(this.num1) + Number(this.num2) + Number(this.num3);
        },
        get promedio() {
            return this.suma / 3;
        },
    };
}
export function contadorComponent() {
    return {
        count: 0,
        incrementar() {
            this.count++;
        },
        decrementar() {
            this.count--;
        },
    };
}

export function toggleComponent() {
    return {
        abierto: false,
        toggle() {
            this.abierto = !this.abierto;
        },
    };
}

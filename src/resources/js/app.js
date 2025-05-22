import "./bootstrap";

import "./alertas";

import Alpine from "alpinejs";

import {
    sumaComponent,
    contadorComponent,
    toggleComponent,
} from "./components/calculos";

Alpine.data("sumaComponent", sumaComponent);
Alpine.data("contadorComponent", contadorComponent);
Alpine.data("toggleComponent", toggleComponent);

window.Alpine = Alpine;

Alpine.start();

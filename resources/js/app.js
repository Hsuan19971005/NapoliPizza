require("./bootstrap");
import { initializeDeliveryInfoPage } from "./orders/deliveryInfo";
import Alpine from "alpinejs";

window.Alpine = Alpine;
window.initializeDeliveryInfoPage = initializeDeliveryInfoPage;

Alpine.start();

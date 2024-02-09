require("./bootstrap");
import { initializeDeliveryInfoPage } from "./orders/deliveryInfo";
import { initializeStoreLocationPage } from "./pages/districtInfo";
import Alpine from "alpinejs";

window.Alpine = Alpine;
window.initializeStoreLocationPage = initializeStoreLocationPage;
window.initializeDeliveryInfoPage = initializeDeliveryInfoPage;

Alpine.start();

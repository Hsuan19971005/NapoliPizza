require("./bootstrap");
import { initializeDeliveryInfoPage } from "./orders/deliveryInfo";
import { initialOrderFoodPage } from "./orders/orderFood";
import { initializeStoreLocationPage } from "./pages/districtInfo";
import Alpine from "alpinejs";

window.Alpine = Alpine;
window.initializeStoreLocationPage = initializeStoreLocationPage;
window.initializeDeliveryInfoPage = initializeDeliveryInfoPage;
window.initialOrderFoodPage = initialOrderFoodPage;

Alpine.start();

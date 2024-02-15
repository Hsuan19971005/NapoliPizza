require("./bootstrap");
import { initializeDeliveryInfoPage } from "./orders/deliveryInfo";
import { initialOrderFoodPage } from "./orders/orderFood";
import { initializeStoreLocationPage } from "./pages/districtInfo";
import { initialCheckFoodPage } from "./orders/checkFood";
import Alpine from "alpinejs";

window.Alpine = Alpine;
window.initializeStoreLocationPage = initializeStoreLocationPage;
window.initializeDeliveryInfoPage = initializeDeliveryInfoPage;
window.initialOrderFoodPage = initialOrderFoodPage;
window.initialCheckFoodPage = initialCheckFoodPage;

Alpine.start();

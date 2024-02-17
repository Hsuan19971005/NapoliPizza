require("./bootstrap");
import { initializeDeliveryInfoPage } from "./orders/deliveryInfo";
import { initialOrderFoodPage } from "./orders/orderFood";
import { initializeStoreLocationPage } from "./pages/districtInfo";
import { initializeMenuPage } from "./pages/menu";
import { initialCheckFoodPage } from "./orders/checkFood";
import { initialCreateOrderPage } from "./orders/createOrder";
import Alpine from "alpinejs";

window.Alpine = Alpine;
window.initializeStoreLocationPage = initializeStoreLocationPage;
window.initializeDeliveryInfoPage = initializeDeliveryInfoPage;
window.initialOrderFoodPage = initialOrderFoodPage;
window.initialCheckFoodPage = initialCheckFoodPage;
window.initialCreateOrderPage = initialCreateOrderPage;
window.initializeMenuPage = initializeMenuPage;

Alpine.start();

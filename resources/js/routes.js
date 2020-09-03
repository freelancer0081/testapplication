import Home from "./components/HomeComponent.vue";
import CreateData from "./components/CreateComponent.vue";
export const routes = [
    {
        path: "/",
        component: Home
    },
    {
        path: "/create",
        component: CreateData
    },
    {
        path: "/edit",
        component: CreateData,
        
    },
];

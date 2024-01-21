/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import Index from "./components/Index.vue";

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */
const router = createRouter({
    // чтобы в SPA сохранялась история типа как в браузере
    history: createWebHistory(),

    // настройка роутов
    // path - путь, component - vue компонент
    routes: [
        {
            // подключение через динамичный импорт
            // path: '/people', component: () => {return import('./components/Person/Index.vue')},
            // т.к. у нас просто возврат в стрелочной функции, можно опустить {} и return:
            // не забывать, что стрелочные функции не создают своего контекста (т.е. this)
            path: '/people', component: () => import('./components/Person/Index.vue'),
            // name типа как в Laravel
            name: 'person.index'
        },
        {
            path: '/people/create', component: () => import('./components/Person/Create.vue'),
            name: 'person.create'
        },
    ]

});

const app = createApp({
    components: {
        Index
    }
});
app.use(router);

// import PostComponent from "./components/PostComponent.vue";
// app.component('post-component', PostComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');

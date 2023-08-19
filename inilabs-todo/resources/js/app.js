import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";

// Import components
import App from "./components/App.vue";
import TodoList from "./components/TodoList.vue";
import TodoForm from "./components/TodoForm.vue";
import Todo from "./components/Todo.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/", component: TodoList },
        { path: "/todos/create", component: TodoForm },
        { path: "/todos/:id", component: Todo },
        { path: "/todos/:id/edit", component: TodoForm },
    ],
});

const app = createApp(App);
app.use(router);
app.mount("#app");

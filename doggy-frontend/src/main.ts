import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import "@/index.css";
import mitt from 'mitt'

const emitter = mitt()
export default emitter

createApp(App).use(router).mount('#app')

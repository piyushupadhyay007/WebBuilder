import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import MainLayout from './Layouts/MainLayout.vue'
createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });

    if (!pages[`./Pages/${name}.vue`]) {
        throw new Error(`Page ${name} not found`);
      }
  
    const page = pages[`./Pages/${name}.vue`];

    if (!page) {
      throw new Error(`Page ${name} not found`);
    }

    // Set default layout
    page.default.layout = page.default.layout || MainLayout;

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el);
  },
});

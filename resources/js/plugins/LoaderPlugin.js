import { createApp, reactive } from 'vue';
import Loader from './Loader.vue';

const ToastPlugin = {
  install(app) {
    const toastContainer = document.createElement('div');
    document.body.appendChild(toastContainer);

    const bus = reactive({});

    const instance = createApp(Loader, {
      bus
    });
    instance.mount(toastContainer);

    app.config.globalProperties.$showLoader = function(message, duration=3000) {
      bus.message = message;
      bus.isVisible = true;
    };

    app.config.globalProperties.$hideLoader = function(message, duration=3000) {
        bus.message = message;
        bus.isVisible = false;
      };
  }
};

export default ToastPlugin;
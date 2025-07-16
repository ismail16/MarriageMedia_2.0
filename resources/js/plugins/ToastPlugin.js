import { createApp, reactive } from 'vue';
import Toaster from './Toaster.vue';

const ToastPlugin = {
  install(app) {
    const toastContainer = document.createElement('div');
    document.body.appendChild(toastContainer);

    const bus = reactive({});
    const instance = createApp(Toaster, {
      bus
    });

    instance.mount(toastContainer);

    app.config.globalProperties.$toast = function(message, type = 'info', duration=2000) {
      bus.message = message;
      bus.type = type;
      bus.isVisible = true;
      setTimeout(() => {
        bus.isVisible = false;
      }, duration);
    };
  }
};

export default ToastPlugin;
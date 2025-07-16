<template>
    <div v-if="bus.isVisible" :class="['toast', bus.type]">

        <i v-if="bus.type == 'success'" class="mdi mdi-checkbox-marked-circle h5 mr-2"></i>
        <i v-if="bus.type == 'warning'" class="mdi mdi-alert h5 mr-2"></i>
        <i v-if="bus.type == 'error'" class="mdi mdi-alert-circle h5 mr-2"></i>
        <i v-if="bus.type == 'info'" class="mdi mdi-information h5 mr-2"></i>

        <span>{{ bus.message }}</span>
        <button @click="close" class="close-button">×</button>
        <div class="progress-bar">..</div>
    </div>
</template>

<script>
export default {
    props: {
        bus: Object,
        // autoCloseDuration: Number // Added prop to receive auto-close duration
    },
    data() {
        return {
            isVisible: false,
            message: '',
            type: '',
            progressTimeout: null
        };
    },
    methods: {
        // show(message, type = 'info') {
        //     this.message = message;
        //     this.type = type;
        //     this.isVisible = true;
        //     this.startProgressAnimation();
        //     // setTimeout(() => {
        //     //     this.isVisible = false;
        //     // }, 3000); // Adjust the timeout as needed
        // },

        close() {
            this.bus.isVisible = false;
            clearTimeout(this.bus.progressTimeout);
        },
        // close() {
        //     this.isVisible = false;
        //     clearTimeout(this.progressTimeout);
        // },

        // startProgressAnimation() {
        //     this.bus.progressTimeout = setTimeout(() => {
        //         this.bus.isVisible = false;
        //     }, 3000); // Adjust the timeout as needed
        // },
    },
    watch: {
        'bus.isVisible': function (value) {
            if (value) {
                const duration = this.bus.duration || this.autoCloseDuration; // Use dynamic or default duration
                setTimeout(() => {
                    this.bus.isVisible = false;
                }, 500000);
            }
        }
    }
};
</script>

<style scoped>
.toast {
    position: fixed;
    top: 75px;
    right: 0px;
    transform: translateX(-5%);
    padding: 15px 20px;
    border-radius: 5px;
    font-size: 16px;
    z-index: 999;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}

.info {
    background-color: #ffffff;
    color: #2196F3;
}


.progress-bar {
    width: 100%;
    height: 5px;
    background-color: #2196F3;
    position: absolute;
    bottom: 0;
    left: 0;
    animation: progressBarAnimation 3s linear forwards;
}

.success {
    background-color: #fff;
    color: #2ecc71;
}

.success>.progress-bar {
    width: 100%;
    height: 5px;
    background-color: #2ecc71;
    position: absolute;
    bottom: 0;
    left: 0;
    animation: progressBarAnimation 3s linear forwards;
}

.warning {
    background-color: #fff;
    color: #f39c12;
}

.warning>.progress-bar {
    width: 100%;
    height: 5px;
    background-color: #f39c12;
    position: absolute;
    bottom: 0;
    left: 0;
    animation: progressBarAnimation 3s linear forwards;
}

.error {
    background-color: #fff;
    color: #e74c3c;
}

.error>.progress-bar {
    width: 100%;
    height: 5px;
    background-color: #e74c3c;
    position: absolute;
    bottom: 0;
    left: 0;
    animation: progressBarAnimation 3s linear forwards;
}

.primary {
    background-color: #fff;
    color: #1425e0;
}

.primary>.progress-bar {
    width: 100%;
    height: 5px;
    background-color: #1425e0;
    position: absolute;
    bottom: 0;
    left: 0;
    animation: progressBarAnimation 3s linear forwards;
}

.close-button {
    border: none;
    background: none;
    color: #000;
    font-weight: bold;
    cursor: pointer;
    margin-left: 10px;
    top: 0;
}



.icon {
    margin-right: 10px;
}

@keyframes progressBarAnimation {
    from {
        width: 100%;
    }

    to {
        width: 0%;
    }
}
</style>
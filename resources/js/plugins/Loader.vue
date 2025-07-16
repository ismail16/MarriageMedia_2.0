<template>
    <div v-if="bus.isVisible" :class="['loader', bus.type]">
        <div class="text-center">
            <span class="load"></span>
        </div>
        <!-- <button @click="close" class="close-button">×</button> -->
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
        };
    },
    methods: {
        close() {
            this.bus.isVisible = false;
            clearTimeout(this.bus.progressTimeout);
        },
    },
    watch: {
        'bus.isVisible': function (value) {
            if (value) {
                setTimeout(() => {
                    this.bus.isVisible = false;
                }, 500000);
            }
        }
    }
};
</script>

<style scoped>
.load {
    width: 75px;
    height: 75px;
    border: 4px solid #FFF;
    border-radius: 50%;
    display: inline-block;
    position: relative;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
    top: 150px;
    /* background: #c9b8b8; */
}

.load::after {
    content: '';
    box-sizing: border-box;
    position: absolute;
    left: 50%;
    top: 0;
    background: #13f20f;
    width: 3px;
    height: 24px;
    transform: translateX(-50%);
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.loader {
    position: fixed;
    top: 70px;
    right: 0px;
    /* transform: translateX(-5%); */
    padding: 15px 20px;
    border-radius: 5px;
    font-size: 16px;
    z-index: 11;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    width: 100%;
    height: 100%;
    background: #21212178;
}

.info {
    /* background-color: #ffffff; */
    color: #2196F3;
    height: 100vh;
}

.info>.progress-bar {
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
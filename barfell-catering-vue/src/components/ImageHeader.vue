<template>
    <div id="inicio" class="image-header" ref="imageHeader">
        <div class="image-transition">
            <div class="overlay"></div>
            <div class="content">
                <img class="logo" src="@/assets/logo_home.png" alt="Barfell logo" />
                <p>BARRAS MÓVILES PARA FIESTAS Y EVENTOS</p>
                <div class="icon-text">
                    <a v-if="isMobile"
                        :href="'whatsapp://send?phone=+598' + phoneNumber + '&text=' + encodeURIComponent(predefinedMessage)"
                        target="_blank" class="whatsapp-link mobile-only">
                        <img src="@/assets/whatsapp_icon.png" alt="WhatsApp Icon" />
                        <span>{{ phoneNumber }}</span>
                    </a>
                    <div v-else class="whatsapp-link desktop-only">
                        <img src="@/assets/whatsapp_icon.png" alt="WhatsApp Icon" />
                        <span>{{ phoneNumber }}</span>
                    </div>
                </div>
                <div :class="['floating-widget', { 'fade-in': isMobile && scrolled }]" v-show="isMobile">
                    <a :href="'whatsapp://send?phone=+598' + phoneNumber + '&text=' + encodeURIComponent(predefinedMessage)"
                        target="_blank">
                        <img src="@/assets/whatsapp_green.png" alt="WhatsApp Icon" />
                    </a>
                </div>
                <div class="image-container" v-for="(image, index) in images" :key="index"
                    :class="{ active: currentIndex === index }">
                    <img :src="image.url" :alt="image.description">
                </div>
                <div @click="scrollTo('nosotros')" class="scroll-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            phoneNumber: '099459246',
            predefinedMessage: 'Hola! vengo desde la página web de BarfellCatering y me gustaría obtener más información.',
            scrolled: false,
            images: [
                { url: require('@/assets/images/image1.jpeg'), description: 'Image 1' },
                { url: require('@/assets/images/image2.jpeg'), description: 'Image 2' },
                { url: require('@/assets/images/image3.jpeg'), description: 'Image 3' },
                { url: require('@/assets/images/image4.jpeg'), description: 'Image 4' },
                { url: require('@/assets/images/image5.jpeg'), description: 'Image 5' },
                { url: require('@/assets/images/image6.jpeg'), description: 'Image 6' }
            ],
            currentIndex: 0
        };
    },
    computed: {
        isMobile() {
            const mobile = window.innerWidth <= 768;
            return mobile;
        },
    },
    mounted() {
        this.startImageTransition();
    },
    methods: {
        checkScroll() {
            const imageHeaderHeight = this.$refs.imageHeader.offsetHeight;
            this.$nextTick(() => {
                this.scrolled = window.scrollY > imageHeaderHeight;
            });
        },
        scrollTo(id) {
            const element = document.getElementById(id);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        },
        startImageTransition() {
            setInterval(() => {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
            }, 5000);
        },
    },
    created() {
        window.addEventListener('scroll', this.checkScroll);
    },
    unmounted() {
        window.removeEventListener('scroll', this.checkScroll);
    },
};
</script>

<style scoped>
.center-text {
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 2em;
    text-align: center;
    opacity: 0;
    animation: fadeIn 2s ease-in-out forwards;
    z-index: 2;
    color: white;
}

p {
    position: absolute;
    top: 40%;
    /* Adjust as needed */
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    font-size: 2em;
    /* Adjust as needed */
    z-index: 2;
    margin-bottom: 40px
}

.icon-text {
    position: absolute;
    top: 65%;
    /* Adjust as needed */
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    font-size: 2em;
    /* Adjust as needed */
    z-index: 2;
}

.icon-text img {
    width: 24px;
    /* Adjust as needed */
    height: 24px;
    /* Adjust as needed */
    margin-right: 10px;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

.whatsapp-link {
    color: white;
    text-decoration: none;
}

.mobile-only {
    display: none;
}

.desktop-only {
    display: block;
}

@media only screen and (max-width: 768px) {
    .mobile-only {
        display: block;
    }

    .desktop-only {
        display: none;
    }
}

.divider {
    height: 100px;
    background: linear-gradient(to right top, #ffffff 50%, #f0f0f0 50%);
}

.logo {
    width: 180px;
    /* Adjust as needed */
    height: 180px;
    position: absolute;
    top: 22%;
    /* Adjust as needed */
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
}

.image-transition {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

.image-container {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-container.active {
    opacity: 1;
}

.scroll-arrow {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    animation: bounce 2s infinite;
    z-index: 1;
    cursor: pointer;
}

/* Adjust the arrow for screens with width less than 600px */
@media (max-width: 600px) {
    .scroll-arrow {
        bottom: 60px;
        /* Adjust as needed */
        /* Other styles here */
    }
}

.scroll-arrow i {
    color: white;
    font-size: 2em;
}

@keyframes bounce {

    0%,
    20%,
    50%,
    80%,
    100% {
        transform: translateX(-50%) translateY(0);
    }

    40% {
        transform: translateX(-50%) translateY(-30px);
    }

    60% {
        transform: translateX(-50%) translateY(-15px);
    }
}

.floating-widget {
    position: fixed;
    bottom: 40px;
    right: 20px;
    z-index: 1000;
    opacity: 0;
    transition: opacity 0.5s;
}

.floating-widget img {
    width: 40px;
    height: 40px;
}

.floating-widget.fade-in {
    opacity: 1;
}
</style>
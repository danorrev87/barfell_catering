<template>
    <div class="swiper-container">
        <swiper :slides-per-view="1" :loop="true" :autoplay="{ delay: 5000 }" :breakpoints="breakpoints">
            <swiper-slide v-for="(image, index) in images" :key="index">
                <div class="image-container" :style="{ backgroundImage: 'url(' + image.url + ')' }">
                    <img :src="image.url" :alt="image.description" class="image-element" />
                    <div class="overlay"></div>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/swiper-bundle.css';

// Importing Autoplay and Lazy directly from swiper
import SwiperCore, { Autoplay, Lazy } from 'swiper';

// Use Swiper modules
SwiperCore.use([Autoplay, Lazy]);

export default {
    components: {
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            images: [
                { url: require('@/assets/images/image1.jpeg'), description: 'Description of image 1' },
                { url: require('@/assets/images/image2.jpeg'), description: 'Description of image 2' },
                { url: require('@/assets/images/image3.jpeg'), description: 'Description of image 3' },
                { url: require('@/assets/images/image4.jpeg'), description: 'Description of image 4' },
                { url: require('@/assets/images/image5.jpeg'), description: 'Description of image 5' },
                { url: require('@/assets/images/image6.jpeg'), description: 'Description of image 6' }
            ],
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            }
        };
    }
}
</script>


<style scoped>
.swiper-container {
    width: 100%;
    height: 100vh;
}

.image-container {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    position: relative;
}

.image-element {
    display: none;
    /* Hide the img element as we use background images, shown only for accessibility */
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.75);
    z-index: 1;
    /* Ensure it doesn't interfere with other interactive elements */
}
</style>
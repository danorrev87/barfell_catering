<template>
    <div id="tragos" class="drink-menu">
        <img src="../assets/barfell-drink.png" alt="Drink Menu Title" class="drink-title" />
        <div class="drink-grid">
            <div v-for="(drink, index) in drinks" :key="drink.id" class="drink-item" @mouseover="mouseEnter(index)"
                @mouseleave="mouseLeave" ref="drinkItems">
                <img :src="drink.image" :alt="drink.name" class="drink-image" @click="toggleBubble(index)" />
                <div v-show="activeBubble === index || hoverIndex === index"
                    :class="{ 'bubble': true, 'bubble-right': isNearRightEdge(index) }">
                    <h2 v-html="drink.name"></h2>
                    <p class="drink-description">{{ drink.description }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            drinks: [
                {
                    id: 1,
                    name: 'Caipiroska <br/> Caipiriña <br/> Caipirisima',
                    description: 'Maracuya / Frutos Rojos / Mango / Kiwi / Frutilla',
                    image: require('@/assets/images/caipiroska.png'), // Replace with the actual path to your image
                },
                {
                    id: 2,
                    name: 'Mojito',
                    description: 'Maracuya / Frutos Rojos / Mango / Kiwi / Frutilla / Coco / Sandía',
                    image: require('@/assets/images/mojito.png'), // Replace with the actual path to your image
                },
                {
                    id: 3,
                    name: 'Daikiri',
                    description: 'Ananá / Frutilla',
                    image: require('@/assets/images/daikiri.png'), // Replace with the actual path to your image
                },
                {
                    id: 4,
                    name: 'Vermouth Rooster',
                    description: 'Blanco / Rosso',
                    image: require('@/assets/images/vermouth.png'), // Replace with the actual path to your image
                },
            ],
            activeBubble: null,
            hoverIndex: null
        }
    },
    methods: {
        toggleBubble(index) {
            this.activeBubble = this.activeBubble === index ? null : index;
        },
        mouseEnter(index) {
            this.hoverIndex = index;
        },
        mouseLeave() {
            this.hoverIndex = null;
        },
        isNearRightEdge(index) {
        this.$nextTick(() => {
            const item = this.$refs.drinkItems[index];
            const bounding = item.getBoundingClientRect();
            return bounding.right > (window.innerWidth || document.documentElement.clientWidth);
        });
    }
    }
};
</script>

<style scoped>
.drink-title {
    width: 50%;
    /* adjust as needed */
    height: auto;
    /* maintain aspect ratio */
    object-fit: contain;
    /* ensure the image scales correctly */
    display: block;
    /* to allow for centering */
    margin: 0 auto;
    /* center the image */
}

.drink-menu {
    padding-top: 80px;
    box-shadow: inset 0 20px 40px -10px #000000;
    /* Add an inset shadow at the top */
    width: 100vw;
    /* Full viewport width */
    display: flex;
    /* Use flexbox for layout */
    flex-wrap: wrap;
    /* Allow the items to wrap as needed */
    justify-content: space-around;
    /* Center items along the line */
    position: relative;
    /* Set position to relative to contain the pseudo-element */
    overflow: hidden;
    /* Hide the parts of the pseudo-element that are outside the container */
}

.first-drink {
    position: absolute;
    top: 10%;
    /* Adjust as needed */
    left: 18%;
    /* Adjust as needed */
}

.second-drink {
    position: absolute;
    top: 20%;
    /* Adjust as needed */
    left: 60%;
    transform: translateX(-50%);
}

.third-drink {
    position: absolute;
    top: 50%;
    /* Adjust as needed */
    left: 70%;
    transform: translateX(-50%);
}

.first-drink .drink-image {
    width: 100px;
    /* Adjust to desired width */
}

.second-drink .drink-image {
    width: 100px;
    /* Adjust to desired width */
}

.third-drink .drink-image {
    width: 100px;
    /* Adjust to desired width */
}

.fourth-drink .drink-image {
    width: 120px;
    /* Adjust to desired width */
}

.drink-menu::before {
    content: "";
    /* Create a pseudo-element */
    position: absolute;
    /* Position it absolutely within the .drink-menu container */
    top: 0;
    /* Align it to the top of the container */
    left: 0;
    /* Align it to the left of the container */
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    background:
        linear-gradient(to bottom, #000000 0%, transparent 20%, transparent 80%, #000000 100%),
        radial-gradient(circle at center, transparent, #000000 70%),
        url('~@/assets/images/background3.jpeg');
    background-size: cover, cover, cover;
    /* Resize the gradients and the background image to cover the entire container */
    background-repeat: no-repeat;
    /* Do not repeat the background image */
    background-position: center;
    /* Center the background image */
    background-attachment: fixed;
    /* Make the background image position fixed with respect to the viewport */
    z-index: -1;
    /* Place it behind the items */
}

.drink-menu::after {
    content: "";
    /* Create another pseudo-element */
    position: absolute;
    /* Position it absolutely within the .drink-menu container */
    top: 0;
    /* Align it to the top of the container */
    left: 0;
    /* Align it to the left of the container */
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    background-color: rgba(0, 0, 0, 0.5);
    /* Black overlay with 50% opacity */
    z-index: -1;
    /* Place it behind the items, but in front of the ::before pseudo-element */
}

.drink-item:hover,
.drink-item:active {
    z-index: 1;
}

.drink-item {
    position: relative;
}

.drink-image {
    width: 200px;
    /* Adjust to desired width */
    height: auto;
    /* Maintain aspect ratio */
    animation: float 3s ease-in-out infinite;
    position: relative;
    margin-right: 20px;
}

.drink-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.bubble {
    /* styles for the bubble */
    position: absolute;
    z-index: 1;
    background: white;
    border-radius: 10px;
    padding: 10px;
    display: none;
}

.bubble-right {
    right: 0; /* position the bubble at the right edge of the .drink-item */
}

/* Responsive styles for small devices */
@media (max-width: 600px) {
    .drink-menu {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .drink-item {
        width: 100%;
        /* take full width */
        text-align: center;
        /* center the content */
        position: relative;
    }

    .drink-image {
        width: 50%;
        /* reduce image size */
        height: auto;
        /* maintain aspect ratio */
        margin: 0 auto;
        /* center the image */
    }

    .bubble {
        display: block;
    }
}

/* Styles for larger devices */
@media (min-width: 601px) {
    .drink-item:hover .bubble {
        display: block;
    }
}

.drink-description {
    position: absolute;
    background-color: #000;
    /* Non-transparent color */
    color: white;
    border-radius: 50%;
    padding: 20px;
    box-sizing: border-box;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    text-align: center;
    transform-origin: center center;
    transform: scale(0);
    width: 200px;
    /* Increased width */
    height: 200px;
    /* Increased height */
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1.2;
    /* Adjust as needed */
    border: 2px solid white;
    /* White border */
    overflow: hidden;
    /* Hide text that goes outside the bubble */
    word-wrap: break-word;
    /* Break words to the next line */
}

.drink-item:hover .drink-description {
    opacity: 1;
    visibility: visible;
    animation: bubbleOpen 0.3s ease-out forwards, pulse 1s infinite ease-in-out;
}

@keyframes bubbleOpen {
    0% {
        transform: scale(0);
    }

    100% {
        transform: scale(1);
    }
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(0.95);
    }

    100% {
        transform: scale(1);
    }
}

@keyframes float {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(-20px);
    }

    100% {
        transform: translateY(0px);
    }
}
</style>
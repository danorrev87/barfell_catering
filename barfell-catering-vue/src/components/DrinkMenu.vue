<template>
    <div id="tragos" class="drink-menu">
        <div v-for="(drink, index) in drinks" :key="drink.id" class="drink-item"
            :class="{ 'first-drink': index === 0, 'second-drink': index === 1, 'third-drink': index === 2, 'fourth-drink': index === 3 }" :title="`Más info aquí ${drink.name}`">
            <img :src="drink.image" :alt="drink.name" class="drink-image" />
            <h2 v-html="drink.name"></h2>
            <p class="drink-description">{{ drink.description }}</p>
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
        };
    },
};
</script>

<style scoped>
.drink-menu {
    padding-top: 170px;
    box-shadow: inset 0 20px 40px -10px #000000;
    /* Add an inset shadow at the top */
    width: 100vw;
    /* Full viewport width */
    height: 100vh;
    /* Full viewport height */
    display: flex;
    /* Use flexbox for layout */
    flex-wrap: wrap;
    /* Allow the items to wrap as needed */
    justify-content: center;
    /* Center items along the line */
    position: relative;
    /* Set position to relative to contain the pseudo-element */
    overflow: hidden;
    /* Hide the parts of the pseudo-element that are outside the container */
}

.first-drink {
    margin-top: 150px;
    position: absolute;
    top: 0;
    left: 0;
}

.second-drink {
    position: absolute;
    top: 20%;
    /* Adjust as needed */
    left: 50%;
    transform: translateX(-50%);
}

.second-drink .drink-image {
    width: 150px;
    /* Adjust to desired width */
}

.third-drink .drink-image {
    width: 100px; /* Adjust to desired width */
}

.fourth-drink .drink-image {
    width: 100px; /* Adjust to desired width */
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
        url('~@/assets/images/background.jpeg');
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

.drink-item {
    margin-top: 150px;
    flex: 1 0 21%;
    /* Adjust as needed */
    margin: 1%;
    /* Adjust as needed */
    display: flex;
    align-items: center;
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

.drink-description {
  position: absolute;
  background-color: #000; /* Non-transparent color */
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
  width: 200px; /* Increased width */
  height: 200px; /* Increased height */
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1.2; /* Adjust as needed */
  border: 2px solid white; /* White border */
  overflow: hidden; /* Hide text that goes outside the bubble */
  word-wrap: break-word; /* Break words to the next line */
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
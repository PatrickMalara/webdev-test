<template>
    <div class="split"> 
        <aside v-if="photographer !== undefined" class="photographer-container">
            <div class="photographer-details">
                <div class="flex justify-between align-center">
                    <h1 style="font-size: 3rem; white-space: break-space; width: 10ch;">{{ photographer.name }}</h1>
                    <img class="border" :src="'../assets/' + photographer.profile_picture" :alt="photographer.name + ' profile picture' " style="width: 128px; box-shadow: var(--black) 0px 0px 0px 2px inset,  var(--black) 10px -10px 0px -3px, var(--black) 10px -10px;"/>
  
                </div>
                <h3 class="my-1 line-height-1-75"> {{ photographer.bio }} </h3>

                <div class="my-1 flex justify-between font-regular">
                    <a :href=" 'mailto:' + photographer.email "> {{ photographer.email }} </a>
                    <a :href=" 'tel:' + photographer.phone "> {{ photographer.phone }} </a>
                </div>
            </div>
        </aside>

        <main class="album-container">
            <div v-for="(photo, index) in album" :key="photo.id" > 
                <Photo :photo="photo" :index="index"/>
            </div>
        </main>

    </div>
</template>
<script>

import Photo from "./Photo.vue";

export default {
    name: "App",
    components: {
        Photo
    },
    data: function() {
        return {
            photographer: undefined,
            album: []
        };
    },
    methods: {
        fetchPhotographer: async function() {
            let response;

            try {
                response = await axios.get("http://127.0.0.1:8000/api/photographer");

                this.photographer = response.data[0]; // Theres only 1 photographer...

            } catch (error) {
                console.error("Failed to retrieve Photographer Details: ", error);
            }

        },
        fetchAlbum: async function() {
            let response;

            try {
                response = await axios.get("http://127.0.0.1:8000/api/photos");

                this.album = response.data; 

            } catch( error ) {
                console.error("Failed to retrieve Photos: ", error);
            }

        }
    },
    mounted: function() {
       this.fetchPhotographer(); 
       this.fetchAlbum(); 
    }
}
</script>

<style scoped> 

.split {
    height: 100%;
    display: flex;
    justify-content: space-between;

    flex-wrap: wrap;
}

.photographer-container {
    width: 50%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.photographer-details {
    width: 50%;
}

.album-container {
    width: 50%;
    height: calc( 100vh - 4rem );
    overflow: auto;
    padding-top: 4rem;
}

.album-container > div:nth-child(odd) {
    text-align: left;
    margin: 2rem 2rem 6rem 0px; 
}

.album-container > div:nth-child(even) {
    text-align: left;
    margin-right: 1rem;
    position: relative;
    margin: 2rem 2rem 6rem 0px; 
}

.album-photo {
    border: 1px solid #292929;
    padding: 2rem;
    margin: 1rem 0rem;
    width: 75%;
}

.album-photo img {
    width: 100%;
}


@media only screen and (max-width: 600px) {
  .split {
      flex-direction: column;
      align-items: center;
  }

  .photographer-container { 
    width: 100%;
  }

  .photographer-details {
      width: 100%;
  }

  .album-container { 
    width: 100%;
    height: auto;
  }
}

</style>

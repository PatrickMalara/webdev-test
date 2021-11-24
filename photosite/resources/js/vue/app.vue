<template>
    <div> 
        <img />
        <h1>{{ photographer === undefined ? "" : photographer.name }}</h1>
        <h4> {{ photographer === undefined ? "" : photographer.phone }} </h4>
        <h4> {{ photographer === undefined ? "" : photographer.email }} </h4>
        <p> {{ photographer === undefined ? "" : photographer.bio }} </p>

        <main>
            <div v-for="photo in album" :key="photo.id" > 
                <img :src=" '../assets/' + photo.img" :alt="photo.title" />
                <h4> {{ photo.title }} </h4>
                <p> {{ photo.description }} </p>
            </div>
        </main>

    </div>
</template>
<script>
export default {
    name: "App",
    data: function() {
        return {
            photographer: undefined,
            album: []
        };
    },
    methods: {
        fetchPhotographer: async function() {
            const response = await axios.get("http://127.0.0.1:8000/api/photographer");

            console.log(response);
            this.photographer = response.data[0]; // Theres only 1 photographer...
        },
        fetchAlbum: async function() {
            const response = await axios.get("http://127.0.0.1:8000/api/photos");

            console.log(response);
            this.album = response.data; 
        }
    },
    mounted: function() {
       this.fetchPhotographer(); 
       this.fetchAlbum(); 
    }
}
</script>

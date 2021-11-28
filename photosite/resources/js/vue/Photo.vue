<template>
    <div class="album-photo" :style=" 'background-image: ../assets/' + photo.img ">
        <div class="photo-container">
            <img class="border photo"  :src=" '../assets/' + photo.img" :alt="photo.title" />
            <h4 v-if="photo.featured" class="featured border"> Featured!</h4>
            <h2 class="photo-container-text"> {{ photo.title }} </h2>
        </div>
        <p> {{ photo.description }} </p>
        <i> {{ photo.date }} </i>
    </div>
</template>

<script>
export default {
    name: "Photo",
    props: {
        left: {
            type: Boolean,
            default: false
        },
        photo: {
            type: Object,
            required: true
        },
    },
}
</script>

<style scoped> 

.photo-container {
    position: relative;
}

.album-photo {
  background-color: white;
  box-shadow: var(--black) 0px 0px 0px 2px inset,  var(--black) 10px -10px 0px -3px, var(--black) 10px -10px;
}

.album-photo > p {
    line-height: 1.5;
    margin-top: 1rem;
}
.album-photo > i {
    font-weight: normal;
    color: #C5C5C5;
    float: right;
}

.album-photo , img {
    transition: filter 0.2s ease-in-out;
    width: 100%;
}
.album-photo , img:hover {
    filter: brightness(1.08);
}

.photo-container-text {
    color: white;
    position: absolute;
    bottom: 1rem;
    left: 1rem;
}

.featured {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background-color: white;
    padding: 0.15rem 0.5rem;

    text-transform: uppercase;
}


</style>

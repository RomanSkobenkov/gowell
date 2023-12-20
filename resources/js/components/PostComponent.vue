<script>
import SinglePostComponent from "./SinglePostComponent.vue";

export default {
    name: "PostComponent",
    components: {
        SinglePostComponent
    }
}
</script>

<template>
    <div>
        <single-post-component></single-post-component>
        <SinglePostComponent></SinglePostComponent>
    </div>
</template>

<style scoped>

</style>

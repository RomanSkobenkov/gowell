<script>
import SinglePostComponent from "./SinglePostComponent.vue";

export default {
    name: "PostComponent",

    data() {
        return {
            name: 'Test',
            age: 20,
            arr: [
                1, 2, 55
            ],
            someObj: {
                test: 'test'
            }
        }
    },

    components: {
        SinglePostComponent
    }
}
</script>

<template>
    <div>
        <single-post-component></single-post-component>
        <p>Name: {{ name }}</p>
    </div>
</template>

<style scoped>

</style>

<script>
import SinglePostComponent from "./SinglePostComponent.vue";
import CreateComponent from "./CreateComponent.vue";

export default {
    name: "PostComponent",

    data() {
        return {
            persons: null,
        }
    },

    mounted() {
    },

    methods: {
    },

    computed: {},

    components: {
        SinglePostComponent,
        CreateComponent
    }
}
</script>

<template>
    <CreateComponent></CreateComponent>
    <template v-for="person in persons">
        <div v-if="person.age > 20">
            <div>{{ person.name }}</div>
            <div>{{ person.age }}</div>
            <div>{{ person.job }}</div>
            <hr>
        </div>
    </template>
</template>

<style scoped>

</style>

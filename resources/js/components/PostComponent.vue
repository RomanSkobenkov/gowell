<script>
import CreateComponent from "./CreateComponent.vue";
import IndexComponent from "./IndexComponent.vue";

export default {
    name: "PostComponent",

    data() {
        return {
            persons: null,
        }
    },

    mounted() {
        console.log(this.$refs.index.indexLog());
    },

    methods: {
        parentLog() {
            console.log('this is parent component');
        }
    },

    computed: {},

    components: {
        CreateComponent,
        IndexComponent
    }
}
</script>

<template>
    <CreateComponent></CreateComponent>
    <IndexComponent ref="index"></IndexComponent>
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

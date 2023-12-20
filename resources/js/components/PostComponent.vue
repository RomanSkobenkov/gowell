<script>
import SinglePostComponent from "./SinglePostComponent.vue";

export default {
    name: "PostComponent",

    data() {
        return {
            persons: null,
        }
    },

    mounted() {
        this.getPosts();
    },

    methods: {
        getPosts() {
            // '/persons' - роут, по которому прописан метод контроллера, который возвращает данные
            axios.get('/persons')
                // res - то, что вернётся с бэка
                .then(res => {
                    this.persons = res.data;
                });
        }
    },

    computed: {},

    components: {
        SinglePostComponent
    }
}
</script>

<template>
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

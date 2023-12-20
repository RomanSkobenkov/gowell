<script>
import SinglePostComponent from "./SinglePostComponent.vue";

export default {
    name: "PostComponent",

    data() {
        return {
            persons: [
                {
                    name: 'Вася',
                    age: 20,
                    job: 'coach'
                },
                {
                    name: 'Елена',
                    age: 17,
                    job: 'rest'
                },
                {
                    name: 'Пётр',
                    age: 34,
                    job: 'seller'
                },
            ]
        }
    },

    methods: {
        sayHello() {
            console.log('hello');
        },
        sayHi() {
            console.log('hi');
        }
    },

    computed: {
        vasyaJob() {
            return this.name + ' работает в булочной'
        }

    },

    components: {
        SinglePostComponent
    }
}
</script>

<template>
    <div v-for="person in persons">
        <div>{{ person.name }}</div>
        <div>{{ person.age }}</div>
        <div>{{ person.job }}</div>
    </div>
</template>

<style scoped>

</style>

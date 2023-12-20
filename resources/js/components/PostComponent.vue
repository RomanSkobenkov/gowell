<script>
import SinglePostComponent from "./SinglePostComponent.vue";

export default {
    name: "PostComponent",

    data() {
        return {
            name: 'Test',
            job: this.name + ' работает в булочной',
            age: 20,
            arr: [
                1, 2, 55
            ],
            someObj: {
                test: 'test'
            }
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
    <div>
        <single-post-component></single-post-component>
        <p>Name: {{ name }}</p>
        <p>Job: {{ vasyaJob }}</p>
        <button onclick="sayHello">Hello</button>
        <button @click="sayHi">Hi</button>
    </div>
</template>

<style scoped>

</style>

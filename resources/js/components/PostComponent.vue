<script>
import SinglePostComponent from "./SinglePostComponent.vue";

export default {
    name: "PostComponent",

    data() {
        return {
            persons: [
                {
                    id: 1,
                    name: 'Вася',
                    age: 20,
                    job: 'coach'
                },
                {
                    id: 2,
                    name: 'Елена',
                    age: 17,
                    job: 'rest'
                },
                {
                    id: 3,
                    name: 'Пётр',
                    age: 34,
                    job: 'seller'
                },
                {
                    id: 4,
                    name: 'Ксюша',
                    age: 25,
                    job: 'Путешественник'
                },
                {
                    id: 5,
                    name: 'Оля',
                    age: 21,
                    job: 'teacher'
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
        personsAgeMoreTwenty() {
            // с помощью filter пропускаем через callback типа как через foreach
            return this.persons.filter((person) => {
                // проверит значение age и вернёт только подходящие
                return person.age > 20;
            })
        }
    },

    components: {
        SinglePostComponent
    }
}
</script>

<template>
    <template v-for="person in personsAgeMoreTwenty">
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

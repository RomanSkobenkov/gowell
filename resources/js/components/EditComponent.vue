<script>
export default {
    name: "EditComponent",

    data() {
        return {
            // инициализируем значения для работы v-model
            name: null,
            age: null,
            job: null
        }
    },

    props: [
        'person'
    ],

    // чтобы сразу получить данные
    mounted() {
    },

    methods: {
        updatePerson(id) {
            this.$parent.editPersonId = null;
            // данные передаём согласно названиям в UpdateRequest
            axios.patch(`/api/people/${id}`, { name: this.name, age: this.age, job: this.job })
                .then( res => {
                    // пока примитивный способ обновить данные после успешного запроса
                    this.$parent.getPeople();
                });
        },
    }
}
</script>

<template>
    <tr :class="this.$parent.isEdit(person.id) ? '' : 'd-none'">
        <th scope="row">{{ person.id }}</th>
        <td><input type="text" v-model="name" class="form-control"></td>
        <td><input type="number" v-model="age" class="form-control"></td>
        <td><input type="text" v-model="job" class="form-control"></td>
        <!-- передаём null для скрывания текущей строки редактирования -->
        <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a></td>
    </tr>
</template>

<style scoped>
</style>

<script>
export default {
    name: "ShowComponent",

    data() {
        return {}
    },

    props: [
        'person'
    ],

    // чтобы сразу получить данные
    mounted() {
    },

    methods: {
        deletePerson(id) {
            // данные передаём согласно названиям в UpdateRequest
            axios.delete(`/api/people/${id}`)
                .then( res => {
                    // пока примитивный способ обновить данные после успешного запроса
                    this.$parent.$parent.getPeople();
                });
        },

        // переключение редактируемой персоны
        // и обновление её данных
        changePersonEditId(id, name, age, job) {
            this.$parent.editPersonId = id;
            // чтобы взять конкретный ref, его название нужно сформировать динамически
            let editName = `edit_${id}`;
            // когда ключ сформирован динамически (через переменную), указывать его нужно через []
            // [0] - потому что Vue добавляет ещё структуру
            let fullEditName = this.$parent.$refs[editName][0];
            fullEditName.name = name;
            fullEditName.age = age;
            fullEditName.job = job;
        },
    }
}
</script>

<template>
    <tr :class="this.$parent.isEdit(person.id) ? 'd-none' : ''">
        <th scope="row">{{ person.id }}</th>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.job }}</td>
        <!-- передаём данные редактируемой персоны для работы v-model -->
        <td><a href="#" @click.prevent="changePersonEditId(person.id, person.name, person.age, person.job)" class="btn btn-success">Edit</a></td>
        <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
    </tr>
</template>

<style scoped>
</style>

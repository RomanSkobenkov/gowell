<script>
export default {
    name: "IndexComponent",

    data() {
        return {
            people: null,
            // свойство для хранения текущей редактироуемой персоны
            editPersonId: null,
            // инициализируем значения для работы v-model
            name: '',
            age: null,
            job: null
        }
    },

    props: [
        'obj'
    ],

    // чтобы сразу получить данные
    mounted() {
        this.getPeople();
        this.$parent.parentLog();
        // если бы создали компонент уровнем ещё ниже, то можно было бы и так:
        // (не забыв импортировать и вызвать новый компонент)
        // this.$parent.$parent.parentLog();
    },

    methods: {
        getPeople() {
            axios.get('/api/people')
                .then( res => {
                    this.people = res.data;
                });
        },

        updatePerson(id) {
            this.editPersonId = null;
            // данные передаём согласно названиям в UpdateRequest
            axios.patch(`/api/people/${id}`, { name: this.name, age: this.age, job: this.job })
                .then( res => {
                    // пока примитивный способ обновить данные после успешного запроса
                    this.getPeople();
                });
        },

        deletePerson(id) {
            // данные передаём согласно названиям в UpdateRequest
            axios.delete(`/api/people/${id}`)
                .then( res => {
                    // пока примитивный способ обновить данные после успешного запроса
                    this.getPeople();
                });
        },

        // переключение редактируемой персоны
        // и обновление её данных
        changePersonEditId(id, name, age, job) {
            this.editPersonId = id;
            this.name = name;
            this.age = age;
            this.job = job;
        },

        // проверка, что текущий элемент - редактируемый (для отображения строки с полями редактирования)
        // в первый раз всегда вернёт false, потому что изначально в data editPersonId равен null
        isEdit(id) {
            return this.editPersonId === id;
        },

        indexLog() {
            console.log('this is IndexComponent');
        }
    }
}
</script>

<template>
    <div>Color: {{ obj.color }}</div>
    <div>Number: {{ obj.number > 20 ? 'more 10' : 'less 10' }}</div>
    <div>Is Published: {{ obj.isPublished ? 'Published' : 'Not Published' }}</div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr :class="isEdit(person.id) ? 'd-none' : ''">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <!-- передаём данные редактируемой персоны для работы v-model -->
                    <td><a href="#" @click.prevent="changePersonEditId(person.id, person.name, person.age, person.job)" class="btn btn-success">Edit</a></td>
                    <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none'">
                    <th scope="row">{{ person.id }}</th>
                    <td><input type="text" v-model="name" class="form-control"></td>
                    <td><input type="number" v-model="age" class="form-control"></td>
                    <td><input type="text" v-model="job" class="form-control"></td>
                    <!-- передаём null для скрывания текущей строки редактирования -->
                    <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
</style>

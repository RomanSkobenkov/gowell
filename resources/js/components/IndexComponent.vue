<script>
export default {
    name: "IndexComponent",

    data() {
        return {
            people: null,
            // свойство для хранения текущей редактироуемой персоны
            editPersonId: null
        }
    },

    // чтобы сразу получить данные
    mounted() {
        this.getPeople();
    },

    methods: {
        getPeople() {
            axios.get('/api/people')
                .then( res => {
                    this.people = res.data;
                });
        },

        // переключение редактируемой персоны
        changePersonEditId(id) {
            this.editPersonId = id;
        },

        // проверка, что текущий элемент - редактируемый (для отображения строки с полями редактирования)
        // в первый раз всегда вернёт false, потому что изначально в data editPersonId равен null
        isEdit(id) {
            return this.editPersonId === id;
        }
    }
}
</script>

<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr>
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a href="#" @click.prevent="changePersonEditId(person.id)" class="btn btn-success">Edit</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none'">
                    <th scope="row">{{ person.id }}</th>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <!-- передаём null для скрывания текущей строки редактирования -->
                    <td><a href="#" @click.prevent="changePersonEditId(null)" class="btn btn-success">Update</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
</style>

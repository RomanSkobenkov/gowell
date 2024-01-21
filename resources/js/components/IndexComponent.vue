<script>
import EditComponent from "./EditComponent.vue";
import ShowComponent from "./ShowComponent.vue";
export default {
    name: "IndexComponent",

    components: {
        ShowComponent,
        EditComponent
    },

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
            // чтобы взять конкретный ref, его название нужно сформировать динамически
            let editName = `edit_${id}`;
            // когда ключ сформирован динамически (через переменную), указывать его нужно через []
            // [0] - потому что Vue добавляет ещё структуру
            let fullEditName = this.$refs[editName][0];
            fullEditName.name = name;
            fullEditName.age = age;
            fullEditName.job = job;
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
                <ShowComponent :person="person"></ShowComponent>
                <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
            </template>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
</style>

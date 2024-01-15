<script>
export default {
    name: "CreateComponent",

    data() {
        return {
            name: null,
            age: null,
            job: null,
        }
    },

    methods: {
        addPerson() {
            // т.к. роут определён в api.php, нужен префикс '/api/'
            // в объекте - передаваемые данные
            axios.post('/api/people', {name: this.name, age: this.age, job: this.job})
                .then(res =>{
                    // после успешного добавления обнуляем заполненные значения
                    this.name = null;
                    this.age = null;
                    this.job = null;
                    console.log(res);
                })
        }
    }
}
</script>

<template>
    <div class="w-25">
        <div class="mb-3">
            <input class="form-control" type="text" id="name" v-model="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input class="form-control" type="number" id="age" v-model="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" id="job" v-model="job" placeholder="job">
        </div>
        <div class="mb-3">
            <button @click.prevent="addPerson" type="submit" class="btn btn-primary" value="Добавить">Добавить</button>
        </div>
    </div>
</template>

<style scoped>
</style>

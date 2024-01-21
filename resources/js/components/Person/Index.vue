<script>
import Edit from "./Edit.vue";

export default {
    name: "Index",
    components: {Edit},

    data() {
        return {
            people: null,
        }
    },

    mounted() {
        this.getPeople();
    },

    methods: {
        getPeople() {
            axios.get('/api/people')
                .then(res => {
                    this.people = res.data;
                });
        }
    },
}
</script>

<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Job</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="person in people">
            <td>{{ person.name }}</td>
            <td>{{ person.age }}</td>
            <td>{{ person.job }}</td>
            <td>
                <router-link :to="{ name: 'person.edit', params: {id: person.id} }">Edit</router-link>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<style scoped>

</style>

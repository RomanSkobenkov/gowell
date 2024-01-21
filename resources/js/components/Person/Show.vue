<script>
export default {
    name: "Show",

    data() {
        return {
            person: null,
        }
    },

    mounted() {
        this.getPerson();
    },

    methods: {
        getPerson() {
            axios.get(`/api/people/${this.$route.params.id}`)
                .then(res => {
                    this.person = res.data;
                });
        },
    },
}
</script>

<template>
    <!-- Отобразить персону только после её получения, а не сразу, когда она ещё null. v-if для этого -->
    <div class="w-25" v-if="person">
        <div class="mb-3">
            Name: {{ this.person.name }}
        </div>
        <div class="mb-3">
            Age: {{ this.person.age }}
        </div>
        <div class="mb-3">
            Job: {{ this.person.job }}
        </div>
        <router-link :to="{ name: 'person.edit', params: {id: this.person.id} }">Edit</router-link>
    </div>
</template>

<style scoped>

</style>

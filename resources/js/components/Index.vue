<script>
export default {
    name: "Index"
}
</script>

<template>
    <router-link :to="{ name: 'person.index' }">Person</router-link>
    <router-link :to="{ name: 'person.create' }">Add</router-link>
    <router-view></router-view>
</template>

<style scoped>

</style>

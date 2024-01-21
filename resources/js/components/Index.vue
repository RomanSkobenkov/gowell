<script>
export default {
    name: "Index"
}
</script>

<template>
    <router-link to="/">Главная</router-link>
    <router-link to="/posts">Посты</router-link>
    <router-link to="/tags">Теги</router-link>
    <router-view></router-view>
</template>

<style scoped>

</style>

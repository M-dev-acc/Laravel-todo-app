<template>
    <select class="shadow appearance-none border rounded w-24 py-2 px-3 mr-4 text-grey-darker">
        <option v-for="(user, index) in users" :key="index" :value="user.name"> 
            {{ user.name }}
        </option>
    </select>
</template>

<script>
export default {
    props: {
        users: Array,
    },
}
</script>
<template>
<table class="mt-4 w-full">
    <tbody v-for="(task, index) in listItems" :key="index" class="flex reverse-col">
        <task-list-item :taskdata="task" />
    </tbody>
</table>

</template>

<script>
import taskListItem from './taskListItem.vue'

export default{
    props: {
        listItems: Array,
    },
    components: {
        taskListItem
    }    
};
</script>
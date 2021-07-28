<template>
    <div class="h-screen flex items-center justify-ceneter bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
            <div class="mb-4">
                <h1 class="text-4xl font-semibold text-grey-darkest">Todo List</h1>
            </div>
            
            <div class="flex mt-4">
                <add-task-form :users="users" />
            </div>
            <tasks-list :listItems="todos" />
        </div>
    </div>
</template>
<script>
import AddTaskForm from './addTaskForm.vue';
import TasksList from './tasksList.vue'

export default{
    props: {
        users: Array,
        todos: Array
    },
    components: {
        AddTaskForm,
        TasksList
    }    
};
</script>
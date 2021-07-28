<template>
    <div >
        <form @submit.prevent="submit">
            <input 
            type="text" 
            placeholder="Add task" 
            id="title"
            class="shadow appearance-none border rounded w-96 py-2 px-3 mr-4 text-grey-darker" 
            v-model="form.title"
            />
            <authors-list :users="users" v-model="form.user" />
            <input type="text" v-model="user" />
            <button 
            type="submit"
            class="flex-no-shrink p-2 border-2 rounded w-14 bg-blue-700 text-white hover:bg-blue-800 active:bg-blue-900"            
            >&#10010;</button>
        </form>
        
    </div>
</template>
<script>
import authorsList from './authorsList.vue'

export default{
    props: {
        users: Array,
    },
    components: {
        authorsList
    },
    data() {
        return {
            form: { title: "", user: "" }
        }
    },
    methods: {
        submit(){
            this.$inertia.post("/add", this.form)
        }
    }
};
</script>
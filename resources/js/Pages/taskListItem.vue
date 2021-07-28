<template>
    <tr class="w-full items-center ">
        <td class="m-8 p-2 self-center">
            <input type="checkbox" :checked="taskdata.completed ? 'true' : '' " class="h-6 w-6 mt-2 self-center" id="complete" v-model="task.complete" @change="updateitem(taskdata.id)"/>
        </td>
        <td class="w-3/5 text-base font-medium text-grey-900">
            <p :class="taskdata.completed ? 'line-through text-green-800' : 'text-grey-900' "> {{ taskdata.title }} </p>
        </td>
        <td class="w-1/5">&#128100;<strong class="font-medium"> {{ taskdata.author }} </strong></td>
        <td class="w-1/5">
            <button class="flex-no-shrink text-white p-2 pl-3 pr-3 ml-4 self-left border-2 rounded bg-red-600 hover:bg-red-700 active:bg-red-800">&#10005;</button>
        </td>
    </tr>
</template>

<script>
export default {
    props: {
        taskdata: Object,
    },
    data() {
        return {
            task: { complete: ""}
        }
    },
    methods: {
        updatItem(itemId){
            this.$inertia.post("/update/" + itemId, this.task)
        },
        deletitem(itemId){
            this.$inertia.post("/delete/" + itemId, this.task)
        }
    }
}
</script>
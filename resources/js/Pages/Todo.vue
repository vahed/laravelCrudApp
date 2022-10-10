<template>
    <Head title="Dashboard" />

    <!-- if user is authenticated -->
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todo
            </h2>
        </template>

        <!-- component -->
        <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
            <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                <div class="mb-4">
                    <h1 class="text-grey-darkest">Todo List<span class="text-red-600" v-if="errors.subject"> -- {{ errors.subject }} --</span></h1>
                    <div class="flex mt-4">

                        <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Add Todo Subject" v-model="form.subject">
                        <button class="flex-no-shrink p-2 border-2 rounded-lg text-teal border-teal text-white bg-blue-500 hover:bg-blue-700" @click="submit">Add</button>
                    </div>
                </div>
                <div>
                    <div class="flex mb-4 items-center" v-for="todo in todoItems" :key="todo.id">

                        <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" v-model="todo.subject" name="subject" >
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" v-model="todo.description" />
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" v-model="todo.priority" >

                        <button v-if="todo.id" class="flex-no-shrink w-1/3 p-2 ml-4 mr-2 border-2 rounded-lg border-grey" @click="updateStatus(todo)">Update</button>

                        <button v-else class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded-lg border-green text-white bg-green-500 hover:bg-green-700" @click="updateStatus(todo)">Done</button>


                        <button class="flex-no-shrink p-2 ml-2 border-2 rounded-lg text-red border-red text-white bg-red-500 hover:bg-red-700"  @click="deleteTodo(todo)">Remove</button>
                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { reactive } from 'vue';

export default {
    name: "Todo.vue",
    components: {
        BreezeAuthenticatedLayout,
        Head
    },
    props: {
        todoItems: Object,
        errors: Object,
        message: Object
    },
    setup() {
        const form = reactive({
            subject: null
        });

        function submit() {
                Inertia.post('/todos', form)
        }

        function updateStatus(todo){
            Inertia.put('/todos/'+todo.id+'/update', todo);
        }
        function deleteTodo(todo){
            Inertia.delete('/todos/'+todo.id);
        }

        return {
            form,
            submit,
            updateStatus,
            deleteTodo
        }
    }
}
</script>

<style scoped>

@media (min-width: 1024px) {
    .lg\:max-w-lg {
        max-width: 100%;
    }
}

</style>

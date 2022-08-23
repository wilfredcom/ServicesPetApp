<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
</script>
<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Dashboard
            </h2>
        </template>
        <div class="py-12 ml-10 mr-10">
            <!-- table -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="table-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items"
                        />
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Correo Electronico
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo de usuario
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de Creacion
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(user, u) in users"
                            :key="u"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        >
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ user.name }}
                            </th>
                            <td class="px-6 py-4">
                                {{  user.email }}
                            </td>
                            <td class="px-6 py-4">
                                {{  user.type_user }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <input :checked="user.status? true : false" id="checkbox" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox" class="sr-only">checkbox</label>
                                 <p class="ml-5" >
                                    {{  user.status ? 'activo': 'desactivado' }}
                                </p>
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                {{  user.created_at.substr(0,10) }}
                            </td>
                         
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- modal -->
        </div>
    </AppLayout>
</template>
<script>
export default {
    data() {
        return {
            users: [],
            pusher: new Pusher("477e95c37e4ada200aac", {
                    cluster: "us2",
            })
        };
    },
    mounted() {
        this.getUsers();
    },
    methods: {
        async getUsers() {
            try {
                let { data } = await axios("/api/get-users");
                this.users = data;
                // created_at: "2022-08-03T21:57:42.000000Z"
                // current_team_id: null
                // email: "admin@admin.com"
                // email_verified_at: null
                // id: 1
                // name: "admin"
                // profile_photo_path: null
                // profile_photo_url: "https://ui-avatars.com/api/?name=a&color=7F9CF5&background=EBF4FF"
                // status: 0
                // two_factor_confirmed_at: null
                // type_user: null
                // updated_at: "2022-08-03T21:57:42.000000Z"
            } catch (e) {
                console.log(e);
            }
        },
    },
};
</script>

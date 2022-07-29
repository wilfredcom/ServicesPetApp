<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
</script>
<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
                <!-- <button type="button" class=" float-right 
                                            text-white 
                                            bg-gradient-to-r 
                                            from-purple-500 
                                            via-purple-600 
                                            to-purple-700 
                                            hover:bg-gradient-to-br 
                                            focus:ring-4 
                                            focus:outline-none 
                                            focus:ring-purple-300 
                                            dark:focus:ring-purple-800 
                                            font-medium 
                                            rounded-lg 
                                            text-sm 
                                            px-5 
                                            py-2.5 
                                            text-center 
                                            mr-2 
                                            mb-2" @click.prevent="setIsOpen(true)">
                    Agregar mascota
                </button> -->

            </h2>
        </template>
        <div class="py-12 ml-10 mr-10">

            <!-- table -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items">
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <!-- <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th> -->
                            <th scope="col" class="px-6 py-3">
                                Tipo de solicitud
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Crods. Iniciales
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cords. Finales
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Direccion Inicial
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Direccion Final
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Distancia del Servicio (km)
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Tiempo Aprox. Del viaje
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Costo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="( servicio, s ) in servicios " :key="s"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <!-- <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td> -->
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ servicio.type_solicitud }}
                            </th>
                            <td class="px-6 py-4">
                                lat:{{ JSON.parse(servicio.inicio_ruta_coords).lat  }} - <br/>
                                Lng: {{ JSON.parse(servicio.inicio_ruta_coords).lng }}
                            </td>
                            <td class="px-6 py-4">
                                lat:{{ JSON.parse(servicio.final_ruta_coords).lat  }} - <br/>
                                Lng: {{ JSON.parse(servicio.final_ruta_coords).lng }}
                            </td>
                            <td class="px-6 py-4">
                                {{ servicio.inicio_ruta_address  }} 
                            </td>
                            <td class="px-6 py-4">
                               {{ servicio.final_ruta_address  }} 
                            </td>
                            <td class="px-6 py-4">
                               {{ JSON.parse(servicio.distancia_servicio).text }}
                            </td>
                            <td class="px-6 py-4">
                               {{ JSON.parse(servicio.tiempo_aproximado_de_viaje).text }}
                            </td>
                            <td class="px-6 py-4">
                               {{ servicio.costo }}
                            </td>
                            <td class="px-6 py-4">
                               {{ servicio.estado }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
    data(){
        return {
            servicios:[],
        }
    },
    mounted() {
        this.getServicios()
    },
    methods: {

        async getServicios() {
            try {
                let { data } = await axios('/api/get-servicios')
                this.servicios = data
            } catch (e) {
                console.log(e)
            }

        }
    }
}
</script>


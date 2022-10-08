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
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items" />
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
                            <th scope="col" class="px-6 py-3 text-center">
                                Tipo de solicitud
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Crods. Iniciales
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Cords. Finales
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Direccion Inicial
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Direccion Final
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Distancia del Servicio (km)
                            </th>

                            <th scope="col" class="px-6 py-3 text-center">
                                Tiempo Aprox. Del viaje
                            </th>
                            <th scope="col" class="px-6 py-3 text-center ">Costo</th>
                            <th scope="col" class="px-6 py-3 text-center ">Estado</th>
                            <th scope="col" class="px-6 py-3 text-center ">Usuario</th>
                            <th scope="col" class="px-6 py-3 text-center ">Conductor</th>
                            <th scope="col" class="px-6 py-3 text-center ">fecha/hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(servicio, s) in servicios" :key="s"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <!-- <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td> -->
                            <th scope="row"  class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <div  :class="servicio.type_solicitud == 'taxi' ? 'bg-yellow-100' : 'bg-blue-100' " class="rounded-lg py-5 px-6 mb-3 text-base text-black inline-flex items-center w-full"
                                    role="alert">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
                                        class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                        </path>
                                    </svg>
                                    {{ servicio.type_solicitud }}
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <p class="text-center"> lat:{{
                                        JSON.parse(servicio.inicio_ruta_coords).lat
                                }}
                                    - <br />
                                    Lng:
                                    {{
                                            JSON.parse(servicio.inicio_ruta_coords).lng
                                    }} </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center"> lat:{{
                                        JSON.parse(servicio.final_ruta_coords).lat
                                }}
                                    - <br />
                                    Lng:
                                    {{ JSON.parse(servicio.final_ruta_coords).lng }} </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center"> {{ servicio.inicio_ruta_address }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center"> {{ servicio.final_ruta_address }} </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ JSON.parse(servicio.distancia_servicio).text }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ JSON.parse(servicio.tiempo_aproximado_de_viaje).text }}
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    <span
                                        class="mt-2 px-4 py-2 rounded-full border border-green-300 font-semibold text-sm flex align-center w-max cursor-pointer active:bg-gray-300 transition duration-300 ease"
                                        :class="servicio.estado == 'servicio aceptado' ? 'bg-green-500 border-green-300  text-white': servicio.estado == 'Servicio Cancelado' ? 'bg-red-500  text-white  border-red-300' : 'bg-yellow-200 border-yellow-200   text-black'  ">
                                        $ {{ new Intl.NumberFormat(['ban', 'id']).format(servicio.costo) }}
                                        <button class="bg-transparent hover focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                                class="h-6 w-6 ml-2 text-white" fill="none"
                                                :class="servicio.estado == 'servicio aceptado' ? 'text-white': servicio.estado == 'Servicio Cancelado' ? ' text-white' : 'text-black'  "
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </button>
                                    </span>

                                </p>

                            </td>
                            <td class="px-6 py-4">
                                <span :class="servicio.estado == 'servicio aceptado' ? 'bg-green-500  text-black': servicio.estado == 'Servicio Cancelado' ? 'bg-red-500 text-white ' : 'bg-yellow-200  text-black'  " class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold  rounded">
                                    {{ servicio.estado }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div v-if="servicio.belong_to_user">
                                    <span
                                        class="mx-4 rounded-full text-white bg-blue-500 font-semibold text-sm flex align-center cursor-pointer active:bg-gray-300 transition duration-300 ease w-max">
                                        <img class="rounded-full w-14 h-14 max-w-none" alt="A"
                                            src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" />
                                        <span class="flex items-center px-3 py-2">
                                            John Doe
                                        </span>
                                        <button class="bg-transparent hover focus:outline-none">
                                        </button>
                                    </span>
                                </div>
                                <div v-else>
                                    <p class="text-center">Sin Usuario</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div v-if="servicio.belong_to_driver">
                                    <span
                                        class="mx-4 rounded-full text-white bg-yellow-500 font-semibold text-sm flex align-center cursor-pointer active:bg-gray-300 transition duration-300 ease w-max">
                                        <img class="rounded-full w-14 h-14 max-w-none" alt="A"
                                            src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" />
                                        <span class="flex items-center px-3 py-2">
                                            John Doe
                                        </span>
                                        <button class="bg-transparent hover focus:outline-none">

                                        </button>
                                    </span>
                                </div>
                                <div v-else>
                                    <p class="text-center">Sin conductor</p>
                                </div>
                            </td>
                            <td>
                                <p class="text-center">
                                    {{ servicio.created_at.substr(0, 10) }}
                                    {{ servicio.created_at.substr(11, 8) }}
                                </p>
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
            servicios: [],
            pusher: new Pusher("477e95c37e4ada200aac", {
                cluster: "us2",
            })
        };
    },
    mounted() {
        this.getServicios()
        this.echoListenEvent();
    },
    methods: {
        async getServicios() {
            try {
                let { data } = await axios("/api/get-servicios");
                this.servicios = data;
            } catch (e) {
                console.log(e);
            }
        },
        async echoListenEvent() {
            try {
                var channel = this.pusher.subscribe("channel-services");
                let el = this;
                channel.bind("services-event", function (data) {
                    el.servicios.unshift(data.message)
                });
                var channel2 = this.pusher.subscribe("channel-response-resquest-drive");
                channel2.bind("services-response-request-drive-event", function (data) {
                    for (const element of el.servicios) {
                        if (element.id == data.message.id) {
                            element.belong_to_driver = data.message.belong_to_driver;
                            element.estado = data.message.estado;
                        }
                    }
                });

                var channel3 = this.pusher.subscribe("channel-response-cancel-service-user");
                channel3.bind("services-response-cancel-service-user-event", function (data) {
                    console.log({ data })
                    for (const element of el.servicios) {

                        if (element.id == data.message.id) {
                            // element.belong_to_driver = data.message.belong_to_driver;
                            element.estado = data.message.estado;
                        }
                    }
                });

            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>

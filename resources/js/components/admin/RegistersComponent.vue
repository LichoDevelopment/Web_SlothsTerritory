
<template>
    <div>
        <v-card>
            <h1 class="text--primary pt-4">Registros</h1>
            <v-card-title>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table
                :headers="headers"
                :items="records"
                :search="search"
                :items-per-page="10"
                class="elevation-1"
            ></v-data-table>
        </v-card>
    </div>
</template>
<script>
  export default {
    data () {
      return {
        search: '',
        headers: [
            { text: 'Dia del tour', value: 'dayTour', sortable: true },
            { text: 'Tipo del tour', value: 'tourType', sortable: true },
            { text: 'Hola del tour', value: 'tourHour', sortable: true },
            { text: 'Cantidad de personas', value: 'totalPeople', sortable: true },
        ],
        records: [],
      }
    },
    methods: {
        async getRecords(){
            let response = await axios.get('api/records')
            console.log(response)
            this.records = response.data.map(item =>{
                return {
                    dayTour: item.fecha_tour.fecha,
                    tourType: item.horario.tours.nombre,
                    tourHour: item.horario.hora,
                    totalPeople: item.cantidad_reservas,
                }
            })
        }
    },
    mounted() {
        this.getRecords()
    },
  }
</script>
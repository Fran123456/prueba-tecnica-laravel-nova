<template>
  <div>
    <Head title="Full Calendar" />

    <Heading class="mb-6">Full Calendar</Heading>
    <Card>
      <h1 class="dark:text-white text-4xl text-center mt-3 mb-2  mt-6 pt-6 font-light mb-6">
        <br> Calendario
      </h1>
      <FullCalendar class="mt-2 mr-2 ml-2 mb-2 pt-2 pb-2 pr-2 pl-2" :options="calendarOptions"  />     
      <br>
    </Card>
       
  </div>
</template>
<script>
//import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
export default {
components: {
  FullCalendar // make the <FullCalendar> tag available
},

data() {
  return {
    users: [],
    calendarOptions: {
      plugins: [ dayGridPlugin ],
      initialView: 'dayGridMonth',
    //  events:  this.users
    }
  }
  
},
methods: {
         getUser(){
                 Nova.request().get('/nova-vendor/full-calendar').then(data =>{
                  //console.log(data.data)
                       this.calendarOptions.events = data.data
                       return data.data;
                 })
            }
        },
         created () {
           this.getUser()
        }
}
</script>


<template>


  <div >
    <Head title="Ejemplo Onboarding" />

    <Heading class="mb-6">Ejemplo Onboarding</Heading>
    <Card class="mx-8 my-8 px-8 py-8">

      <VOnboardingWrapper ref="wrapper" :steps="steps" />
   
      <span id="foo">Este es un ejemplo con Onboarding Vue</span><br> <br>

      <span id="bar">step1</span><br> <br>
      <span id="bar2">Setp final</span><br> <br>
  
      

      <button class="bg-primary-500 text-white font-bold py-2 px-4 border border-blue-700 rounded" 
        @click="start">Step 1 Iniciar</button> <br> <br>
     
      <button class="bg-primary-500 text-white font-bold py-2 px-4 border border-blue-700 rounded"
       @click="() => goToStep(1)">Step 2</button> <br> <br>

       <button class="bg-primary-500 text-white font-bold py-2 px-4 border border-blue-700 rounded" 
       >Step 3</button> <br> <br>

     
    </Card>
       
  </div>


</template>

<script>
import { defineComponent, ref,onMounted, onBeforeMount ,watch,computed } from 'vue'
import { VOnboardingWrapper, useVOnboarding } from 'v-onboarding'

import 'v-onboarding/dist/style.css'
export default defineComponent ({
  components: {
    VOnboardingWrapper
  },
  setup() {
    const wrapper = ref(null)
    const { start, goToStep, finish } = useVOnboarding(wrapper)
    
    
    let steps = [
      {
        attachTo: { element: '#foo' },
        content: { title: "Bienvenido" }
      },
      {
        attachTo: { element: '#bar' },
        content: {
          title: "Hola",
          description: "este es un mensaje de Hola"
        }
      },
      {
        attachTo: { element: '#bar2' },
        content: {
          title: "Hasta pronto",
          description: "Este es un mensaje de hasta pronto"
        }
      }
    ]

    onMounted(() => {
      if (wrapper.value) {
        wrapper.value.start()
      }
    })


    watch(
      async () => {

        const res =await Nova.request().get('/nova-vendor/onboarding').then(data =>{
                     steps = data.data;
                     console.log(steps)
        })

        //const res = Nova.request().get('/nova-vendor/onboarding');
        //const data = await res;
        //steps.value = data.data;
      });

    return {
      wrapper,
      steps,
      start,
      finish,
      goToStep
    }


  },
   methods:{
    async getText(){
                 await Nova.request().get('/nova-vendor/onboarding').then(data =>{
                       this.steps = data.data
                       return data.data;
                 })
      }
      
   }
  
})
</script>
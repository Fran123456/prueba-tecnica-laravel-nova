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
       @click="() => goToStep(2)">Step 3</button> <br> <br>

     
    </Card>
       
  </div>


</template>

<script>
import { defineComponent, ref } from 'vue'
import { VOnboardingWrapper, useVOnboarding } from 'v-onboarding'
import 'v-onboarding/dist/style.css'
export default defineComponent ({
  components: {
    VOnboardingWrapper
  },
  setup() {
    const wrapper = ref(null)
    const { start, goToStep, finish } = useVOnboarding(wrapper)
    const steps =getText()
    //const steps = [
      /*{
        attachTo: { element: '#foo' },
        content: { title: "Welcome!" }
      },
      {
        attachTo: { element: '#bar' },
        content: {
          title: "Do it!",
          description: "This is a description field and I really don't know what to write here..."
        }
      },
      {
        attachTo: { element: '#bar2' },
        content: {
          title: "Do it! 2",
          description: "2."
        }
      }
    ]*/

    return {
      wrapper,
      steps,
      start,
      finish,
      goToStep
    }
  },
   methods:{
     getText(){
                 Nova.request().get('/nova-vendor/onboarding').then(data =>{
                  //console.log(data.data)
                       this.steps = data.data
                       return data.data;
                 })
      }
      
   },created () {
           this.getText()
        }
  
})
</script>
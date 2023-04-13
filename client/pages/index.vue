<template>
   <div>
      <h1>Home</h1>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus doloribus dignissimos ut commodi, voluptas asperiores aliquid
         nam amet pariatur ad magnam nisi illo laboriosam et, modi nobis necessitatibus quasi obcaecati!</p>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur enim quae voluptate. Molestiae quibusdam qui 
         dolore maxime cupiditate enim repellat!</p>
      <input type="file" @change="handleFileSelection($event)"/>
      <button @click="generate_report" class="mx-2 px-6 py-2 text-sm transition-colors duration-300 rounded rounded-full shadow-xl text-emerald-100 bg-emerald-500 hover:bg-emerald-600 shadow-emerald-400">Generate PDF</button>
      <button @click="downloadPDF" v-if="showDownload" class="mx-2 px-6 py-2 text-sm transition-colors duration-300 rounded rounded-full shadow-xl text-emerald-100 bg-emerald-500 hover:bg-emerald-600 shadow-emerald-400">Download PDF</button>
      
   </div>
</template>

<script setup>
   // const { data } = await useCustomFetch('api/index', { headers: { 'Accept' : 'application/json', 'Content-Type' : 'application/json' } })
   // console.log(data);

   // const uri = 'https://fakestoreapi.com/products'
   // const { data: product } = await useFetch(uri)
   // console.log(toRaw(product));

   // const { data : data }= useCustomFetch('/api/index')
   // console.log(toRaw(data));

   const config = useRuntimeConfig()

   const files = ref([]);
   
   const showDownload = ref(false)

   const handleFileSelection = ( event ) => {
      let uploadedFiles = event.target.files
      files.value.push(uploadedFiles[0])
      console.log(uploadedFiles, files)
   }

   const generate_report = () => {

      let formData = new FormData();

      formData.append('excel', files.value[0])

      // console.log(files);
      // // Display the key/value pairs
      // for (var pair of formData.entries()) {
      //    console.log(pair[0]+ ', ' + pair[1]); 
      // }

      const { data : data }= useCustomFetch('/api/generate_report', {
               'method': 'POST',
               body: formData
            })

      showDownload.value = true
   }

   const downloadPDF = () => {
      const url = config.public.baseURL + '/icbs_primax_test'
      window.location.href = url;
   }
</script>

<style scoped>
   h2{
      margin-bottom: 20px;
      font-size: 35px;
   }

   p{
      margin: 20px 0px;
   }
</style>
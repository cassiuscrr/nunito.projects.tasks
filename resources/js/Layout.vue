<template>
    <Head :title=" title ? `${title} :: Projects & Tasks` : `Projects & Tasks` " />
    <Header />
    <div class="container-fluid ">
      <div class="row">
        <div class="col bg-gray-900 p-0 m-0 col-aside">
          <Aside />
        </div>
        <div class="col">
          <slot />
        </div>
      </div>
    </div>    
    <Footer />
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Header from './Shared/Header'
import Aside from './Shared/Aside'
import Footer from './Shared/Footer'

export default {
  components:{
    Head,
    Header, 
    Aside,
    Footer,
  },
  props:{
      title: String,
  }
}
</script>

<style>
:root{
  --color-default: #1c1c1c;
  --gray-100: #ECECEC;
  --gray-300: #F5F5F5;
  --gray-900: #4B4B4B;
}
body{
  color: var(--color-default);
    background-color: var(--gray-100);
}
.bg-gray-100{
  background-color: var(--gray-100);
}
.bg-gray-300{
  background-color: var(--gray-300);
}
.bg-gray-900{
  background-color: var(--gray-900);
}
main{
    margin: 2rem;
}
section{
    margin: 60px 0px;
}
.col-aside{
  flex: 0 0 230px;
}
.bold{
  font-weight: bold;
}
.bolded{
  font-weight: bolder;
}
</style>
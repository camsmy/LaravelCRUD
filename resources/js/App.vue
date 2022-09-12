<template>
<div class="container corners p-4">
        <div class="row d-flex justify-content-center align-middle">
                <Header/>
                <router-view/>
        </div>

        <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        @yield('content') -->
    </div>
</template>

<script>
import Header from './components/Header.vue'
export default{
    name:'App',
    components:{
        Header
    }
}
</script>
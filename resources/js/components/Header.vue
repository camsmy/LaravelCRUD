<template>
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Laravel CRUD</h2>
        </div>
        <div class="pull-right mb-4">
             <router-link class="btn btn-success"
                        :to="{name:'AddCompany'}">Create a Company</router-link>
            <!-- @if(Request::is('companies'))
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> Create Company</a>
                @else
                    <a class="btn btn-success" href="{{url()->previous()}}">Back</a>
                @endif -->
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Header',
    }

</script>

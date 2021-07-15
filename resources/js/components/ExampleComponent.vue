<template>
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <div class="card-body">
                        {{ JSON.stringify(response, null, 2) }}
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <v-app>
        <v-main>
            <v-container
                >Hello world

                <v-alert type="success"></v-alert>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
export default {
    name: 'Example',

    // components: {
    //     OtherComponent
    // },

    props: {
        propName: {
            type: Number,
            default: 0
        }
    },

    data () {
        return {
            response: null
        }
    },

    mounted () {
        console.log('Component mounted.')
        window.axios.get('/api/producto').then(response => {
            console.log(response)
            this.response = response.data.data
        })
    },

    methods: {
        onClick () {
            console.log(this.response)
        }
    }
}
</script>

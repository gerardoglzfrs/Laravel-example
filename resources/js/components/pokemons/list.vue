<template>
    <div class="row">
        <spinner v-show="loading"></spinner>
        <div class="col-sm" v-for="pokemon in pokemons">
            <div class="card mt-3" style="width: 18rem;">
                <div class="card-body">
                <img class="card-img-top rounded-circle mx-auto d-block" style="width: 100px; height: 100px; background-color: #efefef;" src="images/" alt="">
                <h5 class="card-title text-center mt-3">{{ pokemon.name }}</h5>
                <p class="card-text text-justify">{{ pokemon.picture }}</p>
                </div>
                <a href="#" class="btn btn-primary">See more...</a>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../event-bus';

    export default {
        data(){
            return {
                pokemons: [],
                loading: true
            }
        },
        
        created(){
            EventBus.$on('pokemon-added', data=>{
                this.pokemons.push(data)
            })
        },

        mounted() {
            let currentRoute = window.location.pathname
            console.log(currentRoute)

            axios
                .get(`${currentRoute}/pokemons`)
                .then((res)=>{
                    console.log(res)
                    this.pokemons = res.data
                    this.loading = false
                })
        }
    }
</script>
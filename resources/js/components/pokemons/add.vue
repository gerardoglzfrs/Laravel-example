<template>
    <div class="modal fade" id="addPokemon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new Pokemon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="savePokemon">
                        <div class="form-group">
                        <label for="">Pokemon</label>
                        <input type="text" class="form-control" placeholder="Name" v-model="name">
                        </div>
                        <div class="form-group">
                        <label for="">Picture</label>
                        <input type="text" class="form-control" placeholder="Picture URL" v-model="picture">
                        </div>
                        <button type="submit" class="btn btn-primary" >Save data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../event-bus';

    export default{
        data(){
            return {
                name: null,
                picture: null
            }
        },
        methods: {
            savePokemon: function(){
                let currentRoute = window.location.pathname

                axios
                .post(`${currentRoute}/pokemons`,{
                    name: this.name,
                    picture: this.picture
                })
                .then(function(res){
                    console.log(res)
                    $("#addPokemon").modal("hide")
                    EventBus.$emit('pokemon-added', res.data.pokemon)
                })
                .catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>
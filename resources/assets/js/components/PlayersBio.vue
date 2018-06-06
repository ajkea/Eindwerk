<template>
    <div class="player-bio-card">
        <h6>vue component playerbio</h6>
        <img class="img" src="" alt="">
        <p>{{ playerJSON.firstName + ' ' + playerJSON.lastName }}</p>
        <p>{{ playerJSON.shirtNumber }}</p>
        <p>{{ position }}</p>
        <p>{{ playerJSON.description }}</p>
        <!-- <h1>7</h1>
        <p>Wereldspeler, one of a kind. Perfecte afwerking, skills en snelheid. GOAT</p> -->
        <!-- <div class="row">
            <div class="col-3">
                <i class="fal fa-futbol fa-4x"></i>
                <h4>Goals</h4>
                <p class="bold">14</p>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-4">
                        <i class="fal fa-futbol fa-4x"></i>
                    </div>
                    <div class="col-8">
                        <h4>Assists</h4>
                    </div>
                </div>
                <p class="bold">14</p>
            </div>
            <div class="col-3">
                <i class="fal fa-futbol fa-4x"></i>
                <h4>Kaarten</h4>
                <p class="bold">14</p>
            </div>
        </div> -->
    </div>
</template>
<script>
    export default {
        props: ['player', 'position', 'image'],
        mounted() {
        },
        computed: {
            playerJSON: function(){
                return JSON.parse(this.player)
            }
        } 
    }
</script>

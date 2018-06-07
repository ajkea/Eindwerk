<template>
    <div class="player-bio-card">
        <h6>vue component playerbio</h6>
        <img class="img" src="https://noink.abs-cbn.com/HTML/no-profile-pic.png" alt="stock profile">
        <p>{{ playerJSON.firstName + ' ' + playerJSON.lastName }}</p>
        <p>{{ playerJSON.shirtNumber }}</p>
        <p>{{ position }}</p>
        <p>{{ playerJSON.description }}</p>
    </div>
</template>
<script>
    export default {
        props: ['player', 'position', 'image'],
        mounted() {
            console.log(JSON.parse(this.player).id)
        },
        computed: {
            playerJSON: function(){
                return JSON.parse(this.player)
            }
        } 
    }
</script>

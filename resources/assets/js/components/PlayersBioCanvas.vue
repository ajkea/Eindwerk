<template>
    <div class="player-bio-card">
        <fieldset disabled="disabled">
        <legend align="center">{{ player.firstName + ' ' + player.lastName }}</legend>
        <div class="row">
            <div class="col-8">
                <p>{{ player.firstName + ' ' + player.lastName }}</p>
                <p>{{ player.position.positionName }}</p>
            </div>
            <div class="col-4">
                <h5 class="player-bio-card--nr">{{ player.shirtNumber }}</h5>
            </div>
            <div class="col-12">
                <p class="player-bio-card--description">{{ player.description }}</p>
            </div>
            <div class="col-12">
                <p>{{ player.position.positionName }}</p>
            </div>
        </div>
        </fieldset>
    </div>
</template>
<script>
    export default {
        props: ['player'],
        mounted() {
        },
        computed: {
        } 
    }
</script>

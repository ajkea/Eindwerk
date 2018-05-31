<template>
    <div class="player-bio-card">
        <img class="img" src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2018/05/26/22/ronaldo-transfer.jpg" alt="profile ronaldo">
        <h2>{{ player.firstName }}</h2>
        <h6>Spits</h6>
        <h1>7</h1>
        <p>Wereldspeler, one of a kind. Perfecte afwerking, skills en snelheid. GOAT</p>
        <div class="row">
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
        </div>
    </div>
</template>
<script>
    export default {
        props: ['player'],
        mounted() {
        }
    }
</script>

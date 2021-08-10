<template>
    <div class="progress">
        <div class="progress-bar" role="progressbar" :style="`width: ${value}%;`" :aria-valuenow="value" aria-valuemin="0" aria-valuemax="100">{{value}}%</div>
    </div>
</template>

<script>
export default {
    props:{
        total: Number,
        partial: Number,
    },
    data: () => ({
        value: 0
    }),
    mounted(){
        this.updateProgress()
    },
    watch: {
        partial: function( val ){
            this.updateProgress()
        }
    },
    methods:{
        updateProgress(){
            if( !this.total == 0 || !this.partial == 0 ){
                let value = ( this.partial * 100 ) / this.total
                this.value = parseInt( value )
            }
        }
    }
};
</script>
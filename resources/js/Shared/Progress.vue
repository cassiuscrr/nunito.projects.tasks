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
    watch: {
        partial: function( val ){
            if( !(this.total == 0 || this.partial == 0) ){
                let value = ( this.partial * 100 ) / this.total
                this.value = parseInt( value )
            }
        }
    },
};
</script>
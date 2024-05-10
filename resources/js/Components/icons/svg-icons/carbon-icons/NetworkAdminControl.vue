<script setup>
import { computed } from 'vue';

const props = defineProps({
    size: {
        type: String,
        required: false,
    }
})

const allowedSizes = {
    default: '7',
    sm: '5',
    md: '7',
    lg: '16',
    xl: '32',
    xxl: '64',
}

const computedSize = computed(() => {
    if (!props?.size) {
        return allowedSizes.default;
    }

    if (!isNaN(parseInt(props?.size ?? null))) {
        let numVal = parseInt(props?.size ?? null);

        if (numVal < 0 || numVal > 100) {
            return allowedSizes.default;
        }

        return numVal;
    }

    if (props?.size in allowedSizes) {
        return allowedSizes[`${props?.size}`] ?? allowedSizes.default;
    }

    return allowedSizes.default;
})
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="27 20.415 25.586 19 23 21.587 20.414 19 19 20.415 21.586 23 19 25.586 20.414 27 23 24.414 25.586 27 27 25.586 24.414 23 27 20.415"></polygon><path d="M24,4a4.0045,4.0045,0,0,0-4,4,3.951,3.951,0,0,0,.5669,2.019L10.019,20.5669A3.9521,3.9521,0,0,0,8,20a4,4,0,1,0,4,4,3.951,3.951,0,0,0-.5669-2.019L21.981,11.4331A3.9521,3.9521,0,0,0,24,12a4,4,0,0,0,0-8ZM8,26a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,8,26ZM24,10a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,24,10Z"></path><polygon points="8 11.18 5.41 8.59 4 10 8 14 15 7 13.59 5.59 8 11.18"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

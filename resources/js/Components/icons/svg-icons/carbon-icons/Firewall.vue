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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M27,20.3972v3c-1,0-2-1.5-2-4v-3c-4,5-5,7-5,9A5.0008,5.0008,0,0,0,23.0458,30,7.5281,7.5281,0,0,1,25,26.3972,7.5281,7.5281,0,0,1,26.9542,30,5.0008,5.0008,0,0,0,30,25.3972C30,23.3972,28.875,21.8258,27,20.3972Z" transform="translate(0 0)"></path><path d="M17,28H4V24H17V22H4a2.0023,2.0023,0,0,0-2,2v4a2.0023,2.0023,0,0,0,2,2H17Z" transform="translate(0 0)"></path><path d="M28,12H7a2.0023,2.0023,0,0,0-2,2v4a2.0023,2.0023,0,0,0,2,2H17V18H7V14H28l.0011,2H30V14A2.0023,2.0023,0,0,0,28,12Z" transform="translate(0 0)"></path><path d="M25,10H4A2.0021,2.0021,0,0,1,2,8V4A2.0021,2.0021,0,0,1,4,2H25a2.0021,2.0021,0,0,1,2,2V8A2.0021,2.0021,0,0,1,25,10ZM4,4V8H25V4Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

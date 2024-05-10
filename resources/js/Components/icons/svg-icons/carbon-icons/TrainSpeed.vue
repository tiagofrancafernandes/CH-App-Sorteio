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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="30 25 2 25 2 27 4 27 4 29 6 29 6 27 11 27 11 29 13 29 13 27 18 27 18 29 20 29 20 27 25 27 25 29 27 29 27 27 30 27 30 25"></polygon><path d="M29.7144,16.59,18.1494,8.64A14.9327,14.9327,0,0,0,9.6519,6H2V8H9.6519a12.9459,12.9459,0,0,1,7.3647,2.2871L18.0532,11H9v2H20.9624l7.6187,5.2378A.966.966,0,0,1,28.0342,20H2v2H28.0342a2.9661,2.9661,0,0,0,1.68-5.41Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

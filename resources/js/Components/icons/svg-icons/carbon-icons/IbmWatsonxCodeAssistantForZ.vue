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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="29.17 25 26.59 27.58 28 29 32 25 28 21 26.58 22.41 29.17 25"></polygon><polygon points="23 30 21.0851 29.4229 24 20 25.9149 20.5771 23 30"></polygon><polygon points="17.83 25 20.41 22.42 19 21 15 25 19 29 20.42 27.59 17.83 25"></polygon><path d="m18,19h-2V5c0-1.1028.8972-2,2-2h9c1.1028,0,2,.8972,2,2v11h-2V5h-9v14Z"></path><path d="m12,3H3c-1.1028,0-2,.8975-2,2v22c0,1.1025.8972,2,2,2h9c1.1028,0,2-.8975,2-2V5c0-1.1025-.8972-2-2-2Zm.0002,7.0366l-6.925-5.0366h6.9248l.0002,5.0366Zm-.7004,1.9634l-8.2998,6.0361V5.9639l8.2998,6.0361Zm.7007,1.9634l.0007,11.8169-8.2795-5.7959,8.2788-6.021Zm-9.0005,7.9575l7.2563,5.0791H3v-5.0791Zm9,5.0791l.0012-.002v.002h-.0012Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

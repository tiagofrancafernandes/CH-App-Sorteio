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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m9,21H3c-1.1028,0-2-.8972-2-2v-6c0-1.1028.8972-2,2-2h6c1.1028,0,2,.8972,2,2v6c0,1.1028-.8972,2-2,2ZM3,13v6h6v-6s-6,0-6,0Z"></path><path d="m16,30c-.3618,0-.7205-.0138-1.0757-.0406-4.3528-.3312-8.3611-2.7313-10.7229-6.4202l1.6846-1.0784c2.0247,3.1628,5.4602,5.2205,9.1899,5.5043.3047.0231.613.0349.9241.0349v2Z"></path><path d="m28,30h-8c-1.1028,0-2-.8972-2-2v-8c0-1.1028.8972-2,2-2h8c1.1028,0,2,.8972,2,2v8c0,1.1028-.8972,2-2,2Zm-8-10v8h8v-8h-8Z"></path><path d="m27.3025,12c.4539,1.2817.6975,2.6211.6975,4h2c0-1.3691-.1987-2.7085-.584-4h-2.1135Z"></path><path d="m27,10h-3c-1.1028,0-2-.8972-2-2v-3c0-1.1028.8972-2,2-2h3c1.1028,0,2,.8972,2,2v3c0,1.1028-.8972,2-2,2Zm-3-5v3h3v-3h-3Z"></path><path d="m20,2.5835c-1.2915-.3853-2.6309-.5835-4-.5835-4.7976,0-9.2083,2.415-11.7983,6.4604l1.6841,1.0786c2.2209-3.4683,6.002-5.5391,10.1143-5.5391,1.3787,0,2.7188.2437,4,.6978v-2.1143Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

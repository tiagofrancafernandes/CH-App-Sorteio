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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M32,26v-2h-2.1011c-.1299-.6372-.3843-1.2285-.7319-1.7529l1.4897-1.4897-1.4141-1.4141-1.4897,1.4897c-.5244-.3477-1.1157-.6021-1.7529-.7319v-2.1011h-2v2.1011c-.6372,.1299-1.2285,.3843-1.7529,.7319l-1.4897-1.4897-1.4141,1.4141,1.4897,1.4897c-.3477,.5244-.6021,1.1157-.7319,1.7529h-2.1011v2h2.1011c.1299,.6372,.3843,1.2285,.7319,1.7529l-1.4897,1.4897,1.4141,1.4141,1.4897-1.4897c.5244,.3477,1.1157,.6021,1.7529,.7319v2.1011h2v-2.1011c.6372-.1299,1.2285-.3843,1.7529-.7319l1.4897,1.4897,1.4141-1.4141-1.4897-1.4897c.3477-.5244,.6021-1.1157,.7319-1.7529h2.1011Zm-7,2c-1.6543,0-3-1.3457-3-3s1.3457-3,3-3,3,1.3457,3,3-1.3457,3-3,3Z"></path><path d="M20,17H12c-1.1046,0-2-.8954-2-2V4c0-1.1046,.8954-2,2-2h8c1.1046,0,2,.8954,2,2V15c0,1.1046-.8954,2-2,2Zm-8-2h8V4H12V15Z"></path><path d="M17,21H8c-1.1046,0-2-.8954-2-2V7h2v12h9v2Z"></path><path d="M13,25H4c-1.1028,0-2-.8972-2-2V11h2v12H13v2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

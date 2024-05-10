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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="29" cy="29" r="2"></circle><path d="m25,30h-8c-1.1028,0-2-.8972-2-2v-4h2v4h8v2Z"></path><path d="m30,25h-2v-8h-5v-2h5c1.1028,0,2,.8972,2,2v8Z"></path><path d="m20.4141,14.5859l-3-3c-.3774-.3779-.8799-.5859-1.4141-.5859s-1.0366.208-1.4143.5859l-2.9998,3c-.3899.3896-.5859.9019-.5859,1.4141s.196,1.0244.5859,1.4141l2.9998,3c.3777.3779.8801.5859,1.4143.5859s1.0366-.208,1.4141-.5859l3-3c.3899-.3896.5859-.9019.5859-1.4141s-.196-1.0244-.5859-1.4141Zm-4.4141,4.4141l-3-3,3-3,2.9998,3-2.9998,3Z"></path><path d="m9,17H4c-1.1028,0-2-.8972-2-2V7h2v8h5v2Z"></path><path d="m17,8h-2V4H7v-2h8c1.1028,0,2,.8972,2,2v4Z"></path><circle cx="3" cy="3" r="2"></circle><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

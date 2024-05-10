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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,20H26v2h2v6H4V22H14V20H4a2.0024,2.0024,0,0,0-2,2v6a2.0024,2.0024,0,0,0,2,2H28a2.0024,2.0024,0,0,0,2-2V22A2.0024,2.0024,0,0,0,28,20Z" transform="translate(0 0)"></path><circle cx="7" cy="25" r="1"></circle><path d="M21,14a2.981,2.981,0,0,0-2.0374.811l-4.0039-2.4023A2.9578,2.9578,0,0,0,15,12a2.9578,2.9578,0,0,0-.0413-.4087L18.9626,9.189A2.9909,2.9909,0,1,0,18,7a2.9345,2.9345,0,0,0,.0415.4092L14.0376,9.8115a3,3,0,1,0,0,4.377l4.0039,2.4023A2.9345,2.9345,0,0,0,18,17a3,3,0,1,0,3-3Zm0-8a1,1,0,1,1-1,1A1.0009,1.0009,0,0,1,21,6Zm-9,7a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,12,13Zm9,5a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,21,18Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

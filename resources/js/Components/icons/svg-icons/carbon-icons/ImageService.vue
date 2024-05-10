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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,20H26v2h2v6H4V22H6V20H4a2.0024,2.0024,0,0,0-2,2v6a2.0024,2.0024,0,0,0,2,2H28a2.0024,2.0024,0,0,0,2-2V22A2.0024,2.0024,0,0,0,28,20Z" transform="translate(0 0)"></path><circle cx="7" cy="25" r="1"></circle><rect x="13" y="4" width="2" height="8"></rect><rect x="9" y="4" width="2" height="8"></rect><path d="M21,12H19a2.0021,2.0021,0,0,1-2-2V6a2.0021,2.0021,0,0,1,2-2h2a2.0021,2.0021,0,0,1,2,2v4A2.0021,2.0021,0,0,1,21,12ZM19,6v4h2V6Z" transform="translate(0 0)"></path><rect x="21" y="14" width="2" height="8"></rect><rect x="9" y="14" width="2" height="8"></rect><path d="M17,22H15a2.0021,2.0021,0,0,1-2-2V16a2.0021,2.0021,0,0,1,2-2h2a2.0021,2.0021,0,0,1,2,2v4A2.0021,2.0021,0,0,1,17,22Zm-2-6v4h2V16Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M21,19a1.9822,1.9822,0,0,0-.5116.0743L18.707,17.293l-.0257.0257a2.8876,2.8876,0,0,0,0-2.6374l.0257.0257,1.7814-1.7813a2.0345,2.0345,0,1,0-1.4141-1.4141L17.293,13.293l.0257.0257a2.8876,2.8876,0,0,0-2.6374,0l.0257-.0257-1.7813-1.7814a2.0345,2.0345,0,1,0-1.4141,1.4141L13.293,14.707l.0258-.0258a2.8872,2.8872,0,0,0,0,2.6376l-.0258-.0258-1.7814,1.7813a2.0345,2.0345,0,1,0,1.4141,1.4141L14.707,18.707l-.0258-.0258a2.8872,2.8872,0,0,0,2.6376,0l-.0258.0258,1.7813,1.7814A1.9956,1.9956,0,1,0,21,19Zm-5-2a1,1,0,1,1,1-1A1.0006,1.0006,0,0,1,16,17Z"></path><path d="M16,31a.9988.9988,0,0,1-.5039-.1357l-12-7A1.0008,1.0008,0,0,1,3,23V9a.9994.9994,0,0,1,.4961-.8638l12-7a1,1,0,0,1,1.0078,0l12,7L27.4961,9.8638,16,3.1577,5,9.5742V22.4258l11,6.417,11-6.417V15h2v8a1.0008,1.0008,0,0,1-.4961.8643l-12,7A.9988.9988,0,0,1,16,31Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

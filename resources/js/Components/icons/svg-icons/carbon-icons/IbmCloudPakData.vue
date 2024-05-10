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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="23" cy="15" r="1"></circle><circle cx="8" cy="15" r="1"></circle><circle cx="21" cy="10" r="1"></circle><circle cx="15" cy="23" r="1"></circle><path d="M21,19a1.9822,1.9822,0,0,0-.5116.0743L18.707,17.293l-.0257.0257A2.9642,2.9642,0,0,0,19,16a3.0033,3.0033,0,0,0-3-3,2.9642,2.9642,0,0,0-1.3187.3187l.0257-.0257-1.7813-1.7814a2.0345,2.0345,0,1,0-1.4141,1.4141L13.293,14.707l.0258-.0258A2.9634,2.9634,0,0,0,13,16a3.0033,3.0033,0,0,0,3,3,2.9634,2.9634,0,0,0,1.3188-.3188l-.0258.0258,1.7813,1.7814A1.9956,1.9956,0,1,0,21,19Zm-5-2a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,16,17Z"></path><path d="M16,31a.9988.9988,0,0,1-.5039-.1357l-12-7A1.0008,1.0008,0,0,1,3,23V9a.9994.9994,0,0,1,.4961-.8638l12-7a1,1,0,0,1,1.0078,0l12,7L27.4961,9.8638,16,3.1577,5,9.5742V22.4258l11,6.417,11-6.417V15h2v8a1.0008,1.0008,0,0,1-.4961.8643l-12,7A.9988.9988,0,0,1,16,31Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

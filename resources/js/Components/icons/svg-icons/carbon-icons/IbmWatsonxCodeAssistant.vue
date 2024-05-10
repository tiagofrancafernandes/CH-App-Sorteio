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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m11,28h-2c-3.8599,0-7-3.1401-7-7v-2h2v2c0,2.7568,2.2432,5,5,5h2v2Z"></path><polygon points="28.17 26 25.59 28.58 27 30 31 26 27 22 25.58 23.41 28.17 26"></polygon><polygon points="22 31 20.085 30.4229 23 21 24.9149 21.5771 22 31"></polygon><polygon points="16.83 26 19.41 23.42 18 22 14 26 18 30 19.42 28.59 16.83 26"></polygon><path d="m30,19h-2v-7c0-2.7614-2.2386-5-5-5h-4v-2h4c3.866,0,7,3.134,7,7v7Z"></path><circle cx="3" cy="4" r="1"></circle><rect x="6" y="3" width="10" height="2"></rect><circle cx="3" cy="12" r="1"></circle><rect x="6" y="11" width="10" height="2"></rect><rect x="2" y="15" width="10" height="2"></rect><circle cx="15" cy="8" r="1"></circle><rect x="2" y="7" width="10" height="2"></rect><circle cx="15" cy="16" r="1"></circle><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

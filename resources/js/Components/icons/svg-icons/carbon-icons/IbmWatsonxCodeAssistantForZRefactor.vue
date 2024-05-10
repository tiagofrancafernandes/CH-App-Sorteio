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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="22.17 16 19.59 18.58 21 20 25 16 21 12 19.58 13.41 22.17 16"></polygon><polygon points="15.5 21 13.5851 20.4229 16.5 11 18.4149 11.5771 15.5 21"></polygon><polygon points="9.83 16 12.41 13.42 11 12 7 16 11 20 12.42 18.59 9.83 16"></polygon><circle cx="19" cy="28" r="1"></circle><path d="m22,29v-2c2.7568,0,5-2.2432,5-5v-12c0-2.7568-2.2432-5-5-5h-6v-2h6c3.8594,0,7,3.1401,7,7v12c0,3.8594-3.1406,7-7,7Z"></path><circle cx="13" cy="4" r="1"></circle><path d="m16,29h-6c-3.8594,0-7-3.1406-7-7v-12c0-3.8599,3.1406-7,7-7v2c-2.7568,0-5,2.2432-5,5v12c0,2.7568,2.2432,5,5,5h6v2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

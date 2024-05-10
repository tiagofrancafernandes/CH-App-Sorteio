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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M4,7H2V4A2.0023,2.0023,0,0,1,4,2H7V4H4Z"></path><path d="M7,22H4a2.0023,2.0023,0,0,1-2-2V17H4v3H7Z"></path><rect x="2" y="10" width="2" height="4"></rect><path d="M22,7H20V4H17V2h3a2.0023,2.0023,0,0,1,2,2Z"></path><rect x="10" y="2" width="4" height="2"></rect><path d="M28,30H12a2.0023,2.0023,0,0,1-2-2V12a2.0023,2.0023,0,0,1,2-2H28a2.0023,2.0023,0,0,1,2,2V28A2.0023,2.0023,0,0,1,28,30ZM12,12V28H28V12Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

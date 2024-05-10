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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m28.2471,11.9248h3.1748l-4.6465,13.938c-.3066.9351-.7402,1.6255-1.2998,2.0703-.5596.4443-1.3604.667-2.4033.667h-2.1162v-2.645h2.2773l.4141-1.334-4.2324-12.6963h3.3818l1.7705,5.6353.874,3.4961h.1377l.8975-3.4961,1.7705-5.6353Z"></path><polygon points="14.2178 13.4658 14.1484 13.4658 12.9756 15.812 9.8477 21.4932 6.7891 15.835 5.5693 13.3052 5.501 13.3052 5.501 24 2.2119 24 2.2119 7.9458 5.915 7.9458 9.8477 15.4668 9.8936 15.4668 13.7812 7.9458 17.5068 7.9458 17.5068 24 14.2178 24 14.2178 13.4658"></polygon><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m23.0002,31c-.0095,0-.0188-.0001-.0283-.0004-.4102-.0115-.7715-.2723-.9116-.6578l-3.1365-8.6252-2.0046,4.6774c-.1577.3677-.519.6061-.9192.6061h-4v-2h3.3406l2.7402-6.3939c.1619-.3772.5479-.6166.9473-.6057.4102.0115.7715.2723.9116.6578l3.1365,8.6252,2.0046-4.6774c.1577-.3677.519-.6061.9192-.6061h4v2h-3.3406l-2.7402,6.3939c-.158.3684-.52.6061-.9189.6061Z"></path><path d="m9,25h-5v-15h24v9h2v-9c0-1.103-.8975-2-2-2h-6V4c0-1.103-.8975-2-2-2h-8c-1.103,0-2,.897-2,2v4h-6c-1.103,0-2,.897-2,2v15c0,1.1025.897,2,2,2h5v-2ZM12,4h8v4h-8V4Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

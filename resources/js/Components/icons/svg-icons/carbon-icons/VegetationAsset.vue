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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="21.5" cy="10.5" r="1.5"></circle><path d="M28.5,1a2.4518,2.4518,0,0,0-1.2061.3105L18.9834,5.6084l.0027.0054a5.497,5.497,0,1,0,7.3257,7.5444l.0031.0015,4.4-8.5A2.5,2.5,0,0,0,28.5,1Zm-7,13A3.5,3.5,0,1,1,25,10.5,3.5042,3.5042,0,0,1,21.5,14ZM28.9414,3.7354,26.5571,8.3408A5.5279,5.5279,0,0,0,23.658,5.4424l4.5949-2.377A.5165.5165,0,0,1,29,3.5.4985.4985,0,0,1,28.9414,3.7354Z"></path><path d="M19,20h7V18H17V28a2.0027,2.0027,0,0,0,2,2h3V28H19Z"></path><path d="M12,30H9V28h3V15.5664L8.4854,13.4575l1.0292-1.7148,3.5147,2.1084A2.0115,2.0115,0,0,1,14,15.5664V28A2.0024,2.0024,0,0,1,12,30Z"></path><path d="M17.3079,2.2852A9.4882,9.4882,0,0,0,15,2,8.0275,8.0275,0,0,0,8.0786,6.001C8.0525,6,8.0264,6,8,6A6,6,0,0,0,8,18V16A4,4,0,0,1,8,8a2.7009,2.7009,0,0,1,.387.0391l.863.1142.3086-.6675A6.0192,6.0192,0,0,1,15,4a7.499,7.499,0,0,1,1.731.2148Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>

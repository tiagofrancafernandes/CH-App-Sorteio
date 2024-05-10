<script setup lang="ts">
import { computed } from "vue";
import { generateRandomString } from '@/Helpers/string/index';

type Options = {
    value: string
    label: string
    selected?: boolean
}

interface Props {
    options: Options[],
    disabled?: boolean,
    required?: boolean,
    readonly?: boolean,
    label?: string,
    labelClass?: string|object,
    defaultValue?: string,
    emptyOption?: boolean|string,
    id?: string,
}

const props = withDefaults(defineProps<Props>(), {
    disabled: false,
    required: false,
    readonly: false,
    emptyOption: 'Select an option',
});

const itemId = props.id || generateRandomString(15);
</script>

<template>
    <div
        class="p-0 w-full"
    >
        <label
            v-if="$slots.default || label"
            :for="itemId"
            :class="labelClass"
        >
            <slot v-if="$slots.default" />
            <template v-else>
                <template v-if="label">{{ label }}</template>
            </template>
        </label>
        <select
            :disabled="disabled"
            :required="required"
            :readonly="readonly"
            :id="itemId"
            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent active:border-gray-500 active:bg-white active:ring-0 text-sm dark:bg-gray-700 dark:active:bg-gray-900"
        >
            <option
                v-if="emptyOption && emptyOption != true"
                value=""
            > {{ emptyOption }}
            </option>

            <option
                v-for="(optionItem, optionItem_index) in options"
                v-bind:key="optionItem_index"
                :value="optionItem.value"
                :optionItem-index="index"
                :selected="optionItem.selected || defaultValue == optionItem.value"
            > {{ optionItem.label }}
            </option>
        </select>
    </div>
</template>

<script setup lang="js">
import { Head, Link } from '@inertiajs/vue3';
import { generateRandomString } from '@/Helpers/string/index'
import CustomSelect from '@/Components/custom-html/CustomSelect.vue'
import Card from '@/Components/laravel/Card.vue'

import UserIcon from '@/Components/icons/svg-icons/heroicons/MUser.vue'
import MPlus from '@/Components/icons/svg-icons/heroicons/MPlus.vue'
import UserGroup from '@/Components/icons/svg-icons/heroicons/MUserGroup.vue'
import CurrencyDollar from '@/Components/icons/svg-icons/carbon-icons/CurrencyDollar.vue'
import PercentageFilled from '@resources/js/Components/icons/svg-icons/carbon-icons/PercentageFilled.vue'
import UpToTop from '@resources/js/Components/icons/svg-icons/carbon-icons/UpToTop.vue'
import ArrowUpRight from '@resources/js/Components/icons/svg-icons/carbon-icons/ArrowUpRight.vue'
import ArrowUp from '@resources/js/Components/icons/svg-icons/carbon-icons/ArrowUp.vue'
import ArrowDown from '@resources/js/Components/icons/svg-icons/carbon-icons/ArrowDown.vue'
import Filter from '@resources/js/Components/icons/svg-icons/carbon-icons/Filter.vue'
import { computed, ref } from 'vue';

const props = defineProps({
    ticketGroupList: {
        type: Object,
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

let preFilter = ref(null);
let showAdvancedFilter = ref(true);

const setPreFilter = (type = null) => preFilter.value = type;
let selectedPriceItemHash = ref(null);
const setSelectedPriceItem = (priceItem = null) => {
    if (!priceItem) {
        return;
    }

    let data = JSON.parse(JSON.stringify(priceItem));
    selectedPriceItemHash.value = priceItem?.hash;

    console.log('priceItem', data, data?.hash, )
};

let probabilityOptions = {
    label: 'probability',
    emptyOption: 'No filter',
    defaultValue:  null,
    options: [
        {
            value:'0.10',
            label: '10%',
        },
        {
            value:'0.5',
            label: '5%',
        },
        {
            value:'0.25',
            label: '2.5%',
        },
    ]
};

let prizeOptions = {
    label: 'prize',
    emptyOption: 'No filter',
    defaultValue:  null,
    options: [
        {
            value: '20.00',
            label: 'R$ 20,00',
        },
        {
            value: '50.00',
            label: 'R$ 50,00',
        },
        {
            value: '50.00',
            label: 'R$ 50,00',
        },
        {
            value: '100.00',
            label: 'R$ 100,00',
        },
        {
            value: '105.00',
            label: 'R$ 150,00',
        },
    ]
};

let priceOptions = {
    label: 'price',
    emptyOption: 'No filter',
    defaultValue:  null,
    options: [
        {
            value: '2.00',
            label: 'R$ 2,00',
        },
        {
            value: '5.00',
            label: 'R$ 5,00',
        },
        {
            value: '5.00',
            label: 'R$ 5,00',
        },
        {
            value: '10.00',
            label: 'R$ 10,00',
        },
        {
            value: '15.00',
            label: 'R$ 15,00',
        },
    ]
};

let fakePriceList = ([
    {
        maximumNumberOfParticipants: 10,
        currency: 'BRL',
        prize: '25.00',
        probability: "0.100",
        probabilityInPercent: "10.00",
        probabilityAsStr: "0.100",
        probabilityAsText: "A probabilidade de ser sorteado é de 1 pra 10 (0.100) ou 10.00%",
        admFee: 5.00,
        amount: 5,
        amountStr: "5.00",
    },
    {
        maximumNumberOfParticipants: 10,
        currency: 'BRL',
        prize: '17.5',
        probability: "0.100",
        probabilityInPercent: "10.00",
        probabilityAsStr: "0.100",
        probabilityAsText: "A probabilidade de ser sorteado é de 1 pra 10 (0.100) ou 10.00%",
        admFee: 2.5,
        amount: 2,
        amountStr: "2.00",
    }
]);

let computedPriceList = computed(() => {
    if (
            !preFilter.value
            || !props?.ticketGroupList?.filtered
    ) {
        return props?.ticketGroupList['all'] ?? [];
    }

    if (!(preFilter.value in props?.ticketGroupList?.filtered)) {
        return [];
    }

    return (props?.ticketGroupList?.filtered[`${preFilter?.value}`] ?? []);
})

</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div
            v-if="canLogin"
            class="sm:fixed sm:top-0 sm:right-0 p-6 text-right"
            :class="'fixed top-0 z-10 bg-gray-200 dark:bg-gray-900 rounded-br-lg md:rounded-bl-lg'"
        >
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <div class="max-w-full mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <svg
                    viewBox="0 0 62 65"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-16 w-auto bg-gray-100 dark:bg-gray-900"
                >
                    <path
                        d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                        fill="#FF2D20"
                    />
                </svg>
            </div>

            <div class="mt-4 max-w-7xl mx-auto p-4">
                <div class="grid md:grid-cols-12 sm:grid-cols-1 gap-1 lg:gap-2">
                    <Card
                        id="advanced-filter"
                        titleIsHtml
                        class="col-span-12 p-4 mb-4"
                    >
                        <template #headerIcon>
                            <Filter
                                class="text-red-500"
                                size="8"
                            />
                        </template>

                        <template #title>
                            <div class="grid grid-cols-6">
                                <div class="col-span-4">
                                    <h2 class="mt-0 mb-2 text-md text-center font-semibold text-gray-900 dark:text-white">Advanced filter</h2>
                                </div>

                                <div class="col-span-2 text-right mr-1 mt-1">
                                    <button @click="showAdvancedFilter = !showAdvancedFilter" class="bg-blue-500 text-white px-4 py-2 rounded">
                                        {{ showAdvancedFilter ? 'Hide' : 'Show' }} advanced filter
                                    </button>
                                </div>
                            </div>
                        </template>

                        <template #body>
                            <transition name="fade">
                                <div v-show="showAdvancedFilter">
                                    <div
                                        class="flex items-center justify-between mt-4">
                                        <p class="font-medium">Filters</p>

                                        <button
                                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md dark:bg-gray-400"
                                        >
                                            Reset Filter
                                        </button>
                                    </div>

                                    <div>
                                        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
                                            <CustomSelect
                                                class="w-full"
                                                id="filter_by_price"
                                                :emptyOption="priceOptions.emptyOption"
                                                :options="priceOptions.options"
                                                :label="priceOptions.label"
                                                @change="console.log"
                                            />

                                            <CustomSelect
                                                class="w-full"
                                                id="filter_by_prize"
                                                :emptyOption="prizeOptions.emptyOption"
                                                :options="prizeOptions.options"
                                                :label="prizeOptions.label"
                                                @change="console.log"
                                            />

                                            <CustomSelect
                                                class="w-full"
                                                id="filter_by_probability"
                                                :emptyOption="probabilityOptions.emptyOption"
                                                :options="probabilityOptions.options"
                                                :label="probabilityOptions.label"
                                                @change="console.log"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </template>
                    </Card>

                    <div
                        class="col-span-12 grid grid-cols-4 gap-4 justify-center"
                    >
                        <h2 class="text-gray-100 col-span-6">Sort by: {{preFilter}}</h2>

                        <Card
                            titleClass="text-center"
                            class="cursor-pointer motion-safe:hover:scale-110 relative hover:z-40"
                            :class="{
                                'shadow shadow-red-400': preFilter == 'morePrize'
                            }"
                            @click="setPreFilter('morePrize')"
                        >
                            <template #headerIcon>
                                <ArrowUp
                                    class="text-red-500"
                                    size="md"
                                />
                                <CurrencyDollar
                                    class="text-red-500"
                                    size="lg"
                                />
                            </template>

                            <template #title>
                                Highest prizes
                            </template>

                            <template #body>
                                <div class="text-justify mt-4 p-1">
                                    <p><strong>Itens com maiores prêmios.</strong></p>
                                    <p>Normalmente esses itens com maiores pagamentos, tem grande concorrência, ou seja, tem mior quantidade de pessoas concorrendo pelo prêmio.</p>
                                    <p>Uma sugestão seria que busque itens com maiores prêmios mas que tenha também menos concorrencia assim aumentam suas chances ;-).</p>
                                </div>
                            </template>
                        </Card>

                        <Card
                            titleClass="text-center"
                            class="cursor-pointer motion-safe:hover:scale-110 relative hover:z-40"
                            :class="{
                                'shadow shadow-red-400': preFilter == 'highChance'
                            }"
                            @click="setPreFilter('highChance')"
                        >
                            <template #headerIcon>
                                <ArrowUp
                                    class="text-red-500"
                                    size="sm"
                                />
                                <PercentageFilled
                                    class="text-red-500"
                                    size="md"
                                />
                            </template>

                            <template #title>
                                High chance
                            </template>

                            <template #body>
                                <div class="text-justify mt-4 p-1">
                                    <p><strong>Maiores chances</strong></p>
                                    <p>Esses itens possuem por característica uma menor quantidade de pessoas concorrendo entre si pelo prêmio, aumentando assim suas chances de ganhar.</p>
                                    <p>Como tem menos pessoas, o prêmio tende a ser menor. Se fosse te dar uma sugestão seria que tente ver uma junção de "maior chance" e "maior prêmio".</p>
                                </div>
                            </template>
                        </Card>

                        <Card
                            titleClass="text-center"
                            class="cursor-pointer motion-safe:hover:scale-110 relative hover:z-40"
                            :class="{
                                'shadow shadow-red-400': preFilter == 'highChanceAndMorePrize'
                            }"
                            @click="setPreFilter('highChanceAndMorePrize')"
                        >
                            <template #headerIcon>
                                <CurrencyDollar
                                    class="text-red-500"
                                    size="md"
                                />

                                <MPlus
                                    class="text-red-500"
                                    size="sm"
                                />

                                <PercentageFilled
                                    class="text-red-500"
                                    size="md"
                                />
                            </template>

                            <template #title>
                                Highest prizes with high chances
                            </template>

                            <template #body>
                                <div class="text-justify mt-4 p-1">
                                    <p><strong>Maiores prêmios com maiores chances de ganhar</strong>.</p>
                                    <p>Aqui ordenaremos de forma a te apresentar primeiro os itens com maiores prêmios porém com menos participantes.</p>
                                    <p>Menos participantes siginica <strong>mais chances de ganhar</strong>.</p>
                                </div>
                            </template>
                        </Card>

                        <Card
                            titleClass="text-center"
                            class="cursor-pointer motion-safe:hover:scale-110 relative hover:z-40"
                            :class="{
                                'shadow shadow-red-400': preFilter == 'lessCompetition'
                            }"
                            @click="setPreFilter('lessCompetition')"
                        >
                            <template #headerIcon>
                                <ArrowDown
                                    class="text-red-500"
                                    size="md"
                                />
                                <UserGroup
                                    class="text-red-500"
                                    size="lg"
                                />
                            </template>

                            <template #title>
                                Less competition
                            </template>

                            <template #body>
                                <div class="text-justify mt-4 p-1">
                                    <p><strong>Menos concorrência</strong>.</p>
                                    <p>Aqui ordenaremos de forma a te apresentar primeiro os itens com menor número de participantes.</p>
                                    <p>Menos participantes siginifica <strong>mais chances de ganhar</strong>.</p>
                                </div>
                            </template>
                        </Card>
                    </div>

                </div>

                <div class="grid grid-cols-12 md:grid-cols-12 sm:grid-cols-12 gap-1 lg:gap-4">
                    <div class="col-span-12 mt-4 pt-4 mb-2">
                        <h2 class="text-lg text-gray-100 w-full">
                            Opções de valores
                        </h2>
                    </div>

                    <template
                        v-for="(priceItem, priceItem_index) in computedPriceList"
                        :key="priceItem_index"
                    >
                        <Card
                            colSpan="1"
                            titleClass="text-center"
                            class="cursor-pointer motion-safe:hover:scale-110 relative hover:z-40"
                            :class="{
                                'shadow shadow-red-400': selectedPriceItemHash && selectedPriceItemHash == priceItem?.hash
                            }"
                            @click="setSelectedPriceItem(priceItem)"
                        >
                            <template #title>
                                R$ {{ priceItem.amountStr }}
                            </template>

                            <template #body>
                                <table
                                    class="w-full"
                                >
                                    <tbody>
                                        <tr class="pl-2">
                                            <th class="text-left">
                                                <CurrencyDollar
                                                    class="text-red-500"
                                                    size="md"
                                                />
                                            </th>
                                            <td class="text-right">
                                                {{ priceItem.prize }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1">
                                                <PercentageFilled
                                                    class="text-red-500"
                                                    size="5"
                                                />
                                            </th>
                                            <td class="text-right" >
                                                {{ Number(priceItem.probabilityInPercent*100).toFixed(2).replace(/\.?0+$/, '') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1">
                                                <UserGroup
                                                    class="text-red-500"
                                                    size="sm"
                                                />
                                            </th>
                                            <td class="text-right" >
                                                {{ priceItem.maximumNumberOfParticipants }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </template>
                        </Card>
                    </template>

                </div>
            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a
                            href="https://github.com/sponsors/taylorotwell"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                                />
                            </svg>
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GreenButton from "@/Components/GreenButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Order from "@/Components/Order.vue";

defineProps({
  canResetPassword: {
    tpye: Boolean,
  },
  status: {
    type: String,
  },
  orders: {
    tpye: Array,
  },
});
const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <AuthenticatedLayout v-if="$page.props.auth.user">
  <Head title="Dashboard" />
      <!-- <div class="p-6 text-gray-900">
        <a
         href="/orders"
         class="inline-flex items-center px-4 py-2 green-button border mustopha border-transparent rounded-md  text-white uppercase tracking-widest focus:ring-offset-2 transition ease-in-out duration-150"
         >طلب دفع معلق</a>
      </div>
      <div
        class="mt-6 bg-white shadow-sm rounded-lg divide-y"
        v-if="$page.props.orders"
      >
        <Order
          v-for="order in $page.props.orders"
          :key="order.id"
          :order="order"
        />
      </div> -->
  </AuthenticatedLayout>

  <GuestLayout v-else>
    <div
      class="flex w-full flex-col-reverse sm:justify-between sm:max-w-5xl sm:flex-row md:justify-between"
    >
      <div class="sm:w-1/2">
        <div class=" sm:ml-20 ">
          <Head title="Log in" />

          <div class="m-10 flex justify-center">
            <h1 class="font-semibold text-gray-500 text-lg">تسجيل الدخول</h1>
          </div>

          <div class="my-logo flex justify-center">
            <img src="/images/siteImages/coverlogo.png" alt="" />
          </div>

          <form @submit.prevent="submit" class="mt-10">
            <div>
              <InputLabel for="email" value="البريد الالكتروني" />

              <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autofocus
                autocomplete="username"
              />

              <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
              <InputLabel for="password" value="كلمة السر" />

              <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
                autocomplete="current-password"
              />

              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex items-center mt-4">
              <PrimaryButton
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                دخول
              </PrimaryButton>
              <Link
                :href="route('register')"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                تسجيل مستخدم جديد
              </Link>
            </div>
          </form>
        </div>
      </div>
    <div class="w-10">

    </div>
      <div class="flex sm:flex-1  sm:justify-between sm:flex-col ">
        <div class="flex  sm:items-end items-center justify-center sm:flex-1 mb-10 w-full">
          <p class=" items-center pr-4 text-lg">نقوم بدور الوساطة بين البائع والمشتري فيتم خصم قيمة الخدمة من المشتري ولا يتم تسليم المبلغ للبائع إلا بعد الإنتهاء من العمل، بالإضافة لوجود فريق دعم من الموقع لحل كافة الشكاوى </p>
        </div>
        <div class="flex sm:max-w-xs sm:h-1/2 justify-center">
          <img class="" src="/images/siteImages/safe.webp" alt="" />
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

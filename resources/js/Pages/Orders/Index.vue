<template>
  <Head title="Orders" />
  <AuthenticatedLayout>
    <template #header>
      <Container>
        <h2 class=" mr-1 font-semibold text-sm text-gray-100">طلباتي</h2>
        <LButton title="+ طلب جديد" url="orders/create" />
      </Container>
    </template>
    <Container>
      <div class="flex-1 sm:max-w-md" v-if="$page.props.orders">
        <Order
          v-for="order in $page.props.orders"
          :key="order.id"
          :order="order"
        />
      </div>
    </Container>
  </AuthenticatedLayout>
  <!-- <NewOrder /> -->
</template>
<script>
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout.vue";
import Container from "../../Layouts/pageContainer.vue";
import Order from "@/Components/Order.vue";
import LButton from "@/Components/LinkButton.vue";
import NewOrder from "@/Pages/Orders/Create.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";

export default {
  components: {
    LButton,
    AuthenticatedLayout,
    Order,
    InputError,
    PrimaryButton,
    Head,
    NewOrder,
    Container,
  },
  props: ["orders"],
  data() {
    return {
      amount: null,
      service: 0.5,
      seller_name: null,
      seller_phone: null,
      form: useForm({
        seller_name: "",
        seller_acount: "",
        seller_phone: "",
        seller_address: "",
        duration: "",
        amount: "",
        total: "",
        user_message: "",
      }),
    };
  },
  methods: {
    keyAllowd(event) {
      let keyAllowd = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
      if (!keyAllowd.includes(event.key)) {
        event.preventDefault();
      }
    },
    submit() {
      this.form.post(route("orders"), {
        onFinish: () => form.reset("password"),
      });
    },
  },
  computed: {
    total() {
      return this.amount + this.service;
    },
  },
};
</script>



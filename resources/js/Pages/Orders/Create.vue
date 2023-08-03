<template>
  <Head title="Orders" />
  <AuthenticatedLayout>
    <template #header>
      <Container >
        <h2 class="font-semibold text-sm text-gray-100">إنشاء طلب جديد</h2>
      <LButton title="رجوع " url="/orders" />
      </Container>
    </template>
      <Container class="bg-white ">

        <form @submit.prevent="submit" class="sm:max-w-xs mx-auto">
          <div class="space-y-6 p-2">
            <div class="border-b border-gray-900/10 pb-1 d-flex">
              <div class="order-img">
                <img
                  class="mt-1 w-full"
                  src="/images/siteImages/coverlogo.png"
                  alt=""
                />
              </div>
              <div class="flex flex-col items-center mt-1 order-title">
                <p class="font-semibold leading-7 pb-6 text-gray-700 text-sm">
                  انشاء طلب دفع محمي لحين الاستلام
                </p>
                <span class="warn-note">
                  يتحمل المستخدم صحة جميع المعلومات المقدمة على مسؤوليتة الشخصية
                  .
                </span>
              </div>
            </div>

            <div class="border-b border-gray-900/10 pb-1">
              <div class="p-2">
                <p class="text-xs leading-7 text-gray-700">
                  معلومات البائع أو مقدم الخدمة
                </p>
                <span class="warn-note">
                  يرجى تقديم معلومات دقيقة حتى نتمكن من حماية أموالك بأكبر قدر
                  ممكن .
                </span>
              </div>

              <div class="sm:col-span-3">
                <label
                  for="seller_name"
                  class="block text-xs leading-6 text-gray-500"
                  >الاسم الكامل</label
                >
                <div class="">
                  <input
                    type="text"
                    v-model="form.seller_name"
                    id="seller_name"
                    placeholder="اسم البائع أو مقدم الخدمة"
                    autocomplete="given-name"
                    class="block border-0 focus:ring-2 focus:ring-green-500 focus:ring-inset h-6 ring-g ring-inset shadow-sm sm:leading-6 text-xs w-full"
                  />
                </div>
              </div>

              <div class="sm:col-span-3 mt-2">
                <label
                  for="seller_phone"
                  class="block text-xs leading-6 text-gray-500"
                  >رقم هاتف البائع او مقدم الخدمة</label
                >
                <input
                  type="text"
                  v-model="form.seller_phone"
                  @keypress="keyAllowd"
                  id="seller_phone"
                  autocomplete="family-name"
                  placeholder="07XXXXXXXX"
                  class="block border-0 focus:ring-2 focus:ring-green-500 focus:ring-inset h-6 ring-g ring-inset shadow-sm sm:leading-6 text-xs w-full"
                />
              </div>

              <div class="sm:col-span-4 mt-2">
                <label
                  for="seller_acount"
                  class="block text-xs leading-6 text-gray-500"
                  >الحساب المراد التحويل له بعد الاستلام</label
                >

                <input
                  placeholder="يمكنك الارسال الي حساب كليك او محافظ او حساب بنكي"
                  id="seller_acount"
                  v-model="form.seller_acount"
                  type="text"
                  autocomplete="seller_acount"
                  class="block border-0 focus:ring-2 focus:ring-green-500 focus:ring-inset h-6 ring-g ring-inset shadow-sm sm:leading-6 text-xs w-full"
                />
              </div>
              <div class="sm:col-span-4 mt-2">
                <label
                  for="seller_address"
                  class="block text-xs leading-6 text-gray-500"
                  >عنوان البائع او مقدم الخدمة</label
                >
                <input
                  placeholder="موقع مقدم الخدمة ساعدنا في خدمتك بشكل افضل ."
                  type="text"
                  v-model="form.seller_address"
                  id="seller_address"
                  autocomplete="seller_address"
                  class="block border-0 focus:ring-2 focus:ring-green-500 focus:ring-inset h-6 ring-g ring-inset shadow-sm sm:leading-6 text-xs w-full"
                />
              </div>
            </div>

            <div class="border-b border-gray-900/10 pb-1">
              <p class="text-xs leading-7 text-gray-700">معلومات طلبك</p>
              <span class="warn-note">
                نعتمد اسمك ورقم هاتفك المسجل لهذا الحساب يمكنك تعديل معلوماتك في
                اي وقت من
                <a class="text-blue-400" href="/profile">اعدادات حسابي</a>
              </span>
              <div class="sm:col-span-3">
                <label
                  for="used_acount"
                  class="block text-xs leading-6 text-gray-500"
                >
                  الحساب المحوَل منه</label
                >

                <input
                  type="text"
                  v-model="form.used_acount"
                  id="used_acount"
                  placeholder="  كليك, حساب بنكي, حوالة"
                  autocomplete="given-name"
                  class="block border-0 focus:ring-2 focus:ring-green-500 focus:ring-inset h-6 ring-g ring-inset shadow-sm sm:leading-6 text-xs w-full"
                />
              </div>
              <div class="sm:col-span-3 mt-2">
                <label
                  for="country"
                  class="block text-xs leading-6 text-gray-500"
                  >المدة المتوقعة لاستلام الطلب او انجاز الخدمة :</label
                >
                <select
                  id="duration"
                  v-model="form.duration"
                  autocomplete="duration-name"
                  class="block border-0 focus:ring-green-500 focus:ring-inset h-7 py-1.5 ring-g ring-inset shadow-sm sm:leading-6 sm:max-w-xs text-gray-500 text-sm text-xs w-full"
                >
                  <option selected>اختر المدة</option>
                  <option value="1"><p>1 يوم</p></option>
                  <option value="2">2 يوم</option>
                  <option value="3">3 يوم</option>
                  <option value="4">4 يوم</option>
                  <option value="5">5 يوم</option>
                  <option value="6">6 يوم</option>
                  <option value="7">1 اسبوع</option>
                  <option value="14">2 اسبوع</option>
                  <option value="21">3 اسبوع</option>
                  <option value="30">1 شهر</option>
                </select>
              </div>
              <div class="sm:col-span-3 mt-4">
                <label
                  for="user_message"
                  class="block text-xs leading-6 text-gray-500"
                  >ملاحظات اخرى</label
                >
                <textarea
                  id="user_message"
                  placeholder="ملاحظات تخص شروط الاستلام وا الدفع او اي شكاوى او اقتراحات"
                  v-model="form.user_message"
                  class="block border-0 focus:ring-green-500 focus:ring-inset ring-g ring-inset shadow-sm sm:leading-6 text-xs w-full"
                ></textarea>
              </div>
            </div>

            <div
              class="border ring-g focus:ring-inset flex flex-col items-center mt-30"
            >
              <label for="amount" class="block text-xs leading-6 text-gray-500"
                >قيمة الطلب
              </label>

              <div class="">
                <input
                  v-model.number="form.amount"
                  @keypress="keyAllowd"
                  type="text"
                  id="amount"
                  placeholder="ادخل قيمة التحويل هنا"
                  autocomplete="given-name"
                  class="block border-0 focus:ring-green-500 focus:ring-inset h-7 ring-g ring-inset shadow-sm sm:leading-6 text-xs w-full"
                />
              </div>
              <div class="sm:col-span-3">
                <label for="service" class="block text-xs mt-1 text-gray-500"
                  >خدمة : &nbsp{{ service }} &nbsp JD
                </label>
              </div>
              <div class="sm:col-span-3">
                <label
                  for="service"
                  class="block leading-6 warn-note item-center"
                >
                  المجموع : {{ total > 0.5 ? total : "ادخل قيمة الطلب" }}
                </label>
              </div>
            </div>
          </div>
          <div class="flex gap-x-6 justify-center mt-2">
            <button
              type="submit"
              class="border border-transparent duration-150 ease-in-out focus:ring-offset-2 font-semibold green-button p-2 text-white text-xs transition"
            >
              <strong class="text-yellow-500"> + </strong>إنشاء
            </button>
            <a
              href="/"
              class="border border-transparent duration-150 ease-in-out focus:ring-offset-2 font-semibold red-button p-2 text-white text-xs transition"
            >
              الغاء
            </a>
          </div>
        </form>
      </Container>

  </AuthenticatedLayout>
</template>
<script>
import { useForm, Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout.vue";
import Container from "../../Layouts/pageContainer.vue";
import LButton from "@/Components/LinkButton.vue";



export default {
  components: { Head, AuthenticatedLayout,Container, LButton,  },
  props: ["orders"],
  data() {
    return {
      amount: null,
      service: 0.5,
      seller_name: null,
      seller_phone: null,
      form: useForm({
        used_acount: "",
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
      this.form.amount = this.total;
      this.form.post(route("orders.store"), {
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



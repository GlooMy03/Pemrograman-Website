<script setup>
// Import ref dan useRouter
import { ref } from "vue";
import { useRouter } from "vue-router";

// Import API
import api from "../../api";

// Initialize router
const router = useRouter();

// Define state
const full_name = ref("");
const email = ref("");
const room_type = ref("");
const check_in = ref("");
const check_out = ref("");
const phone_number = ref("");
const total_rooms = ref("");
const payment_method = ref("");
const errors = ref({});

// Method untuk menyimpan booking
const storeBooking = async () => {
    // Reset errors
    errors.value = {};

    // Validasi sederhana (opsional)
    if (!full_name.value || !email.value || !room_type.value || !check_in.value || !check_out.value) {
        alert("Please fill out all required fields!");
        return;
    }

    // Prepare payload
    const payload = {
        full_name: full_name.value,
        email: email.value,
        room_type: room_type.value,
        check_in: check_in.value,
        check_out: check_out.value,
        phone_number: phone_number.value,
        total_rooms: total_rooms.value,
        payment_method: payment_method.value,
    };

    try {
        // Kirim data ke API
        await api.post("/api/booking", payload);

        // Reset form input
        full_name.value = "";
        email.value = "";
        room_type.value = "";
        check_in.value = "";
        check_out.value = "";
        phone_number.value = "";
        total_rooms.value = "";
        payment_method.value = "";

        // Redirect ke halaman index
        router.push({ name: "booking.index" });
    } catch (error) {
        // Tangani error
        errors.value = error.response?.data?.errors || {};
    }
};
</script>


<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4 class="mb-3">Add New Booking</h4>
                        <form @submit.prevent="storeBooking">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Full Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="full_name"
                                    placeholder="Enter full name"
                                />
                                <div v-if="errors.full_name" class="alert alert-danger mt-2">
                                    <span>{{ errors.full_name[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    v-model="email"
                                    placeholder="Enter email"
                                />
                                <div v-if="errors.email" class="alert alert-danger mt-2">
                                    <span>{{ errors.email[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Room Type</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="room_type"
                                    placeholder="Enter room type"
                                />
                                <div v-if="errors.room_type" class="alert alert-danger mt-2">
                                    <span>{{ errors.room_type[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Check-in</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="check_in"
                                />
                                <div v-if="errors.check_in" class="alert alert-danger mt-2">
                                    <span>{{ errors.check_in[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Check-out</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="check_out"
                                />
                                <div v-if="errors.check_out" class="alert alert-danger mt-2">
                                    <span>{{ errors.check_out[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Phone Number</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="phone_number"
                                    placeholder="Enter phone number"
                                />
                                <div v-if="errors.phone_number" class="alert alert-danger mt-2">
                                    <span>{{ errors.phone_number[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Total Rooms</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    v-model="total_rooms"
                                    placeholder="Enter total rooms"
                                />
                                <div v-if="errors.total_rooms" class="alert alert-danger mt-2">
                                    <span>{{ errors.total_rooms[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Payment Method</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="payment_method"
                                    placeholder="Enter payment method"
                                />
                                <div v-if="errors.payment_method" class="alert alert-danger mt-2">
                                    <span>{{ errors.payment_method[0] }}</span>
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="btn btn-md btn-primary rounded-sm shadow border-0"
                            >
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

